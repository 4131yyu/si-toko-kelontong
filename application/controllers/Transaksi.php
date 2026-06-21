<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('Auth');
        $this->load->model(['ProdukModels', 'TransaksiModels']);
    }

    public function index() {
        $data = [
            'title'  => 'Transaksi Penjualan',
            'produk' => $this->ProdukModels->get_for_select(),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/kasir', $data);
        $this->load->view('templates/footer');
    }

    public function get_harga($id_produk) {
        // dipanggil via AJAX untuk ambil harga & stok produk
        $produk = $this->ProdukModels->get_by_id($id_produk);
        if ($produk) {
            echo json_encode([
                'status'     => TRUE,
                'harga_jual' => $produk->harga_jual,
                'stok'       => $produk->stok,
                'nama'       => $produk->nama_produk,
            ]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }

    public function proses() {
        $id_produk = $this->input->post('id_produk');
        $jumlah    = $this->input->post('jumlah');
        $bayar     = (float) $this->input->post('bayar');

        if (empty($id_produk) || empty($jumlah)) {
            $this->session->set_flashdata('error', 'Keranjang transaksi kosong!');
            redirect('Transaksi');
        }

        // Hitung total & validasi stok
        $total = 0;
        $items = [];
        foreach ($id_produk as $i => $pid) {
            $produk = $this->ProdukModels->get_by_id($pid);
            $jml    = (int) $jumlah[$i];

            if (!$produk || $jml <= 0) continue;

            if ($jml > $produk->stok) {
                $this->session->set_flashdata('error', 'Stok ' . $produk->nama_produk . ' tidak mencukupi!');
                redirect('Transaksi');
            }

            $subtotal = $produk->harga_jual * $jml;
            $total   += $subtotal;
            $items[]  = [
                'id_produk'    => $pid,
                'jumlah'       => $jml,
                'harga_satuan' => $produk->harga_jual,
                'subtotal'     => $subtotal,
            ];
        }

        if (empty($items)) {
            $this->session->set_flashdata('error', 'Tidak ada produk valid pada transaksi!');
            redirect('Transaksi');
        }

        if ($bayar < $total) {
            $this->session->set_flashdata('error', 'Nominal bayar kurang dari total belanja!');
            redirect('Transaksi');
        }

        // Simpan transaksi
        $kembalian = $bayar - $total;
        $id_transaksi = $this->Transaksi->insert_transaksi([
            'id_user'        => $this->session->userdata('id_user'),
            'kode_transaksi' => $this->TransaksiModels->generate_kode(),
            'total_harga'    => $total,
            'bayar'          => $bayar,
            'kembalian'      => $kembalian,
        ]);

        // Simpan detail & kurangi stok
        $detail_data = [];
        foreach ($items as $item) {
            $detail_data[] = [
                'id_transaksi' => $id_transaksi,
                'id_produk'    => $item['id_produk'],
                'jumlah'       => $item['jumlah'],
                'harga_satuan' => $item['harga_satuan'],
                'subtotal'     => $item['subtotal'],
            ];
            $this->ProdukModels->kurangi_stok($item['id_produk'], $item['jumlah']);
        }
        $this->TransaksiModels->insert_detail($detail_data);

        redirect('Transaksi/struk/' . $id_transaksi);
    }

    public function struk($id) {
        $data = [
            'title'     => 'Struk Transaksi',
            'transaksi' => $this->TransaksiModels->get_by_id($id),
            'detail'    => $this->TransaksiModels->get_detail($id),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/struk', $data);
        $this->load->view('templates/footer');
    }

    public function riwayat() {
        $data = [
            'title'     => 'Riwayat Transaksi',
            'transaksi' => $this->TransaksiModels->get_all(),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/riwayat', $data);
        $this->load->view('templates/footer');
    }
}
