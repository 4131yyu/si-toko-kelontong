<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('Auth');
        if ($this->session->userdata('role') !== 'admin') redirect('Dashboard');
        $this->load->model(['ProdukModels', 'KategoriModels']);
    }

    public function index() {
        $data = [
            'title'   => 'Manajemen Produk',
            'produk'  => $this->ProdukModels->get_all(),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data = [
            'title'    => 'Tambah Produk',
            'kategori' => $this->KategoriModels->get_all(),
            'produk'   => null,
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('produk/form', $data);
        $this->load->view('templates/footer');
    }

    public function simpan() {
        $this->form_validation->set_rules('nama_produk',  'Nama Produk',  'required|trim');
        $this->form_validation->set_rules('id_kategori',  'Kategori',     'required');
        $this->form_validation->set_rules('stok',         'Stok',         'required|integer');
        $this->form_validation->set_rules('harga_beli',   'Harga Beli',   'required|numeric');
        $this->form_validation->set_rules('harga_jual',   'Harga Jual',   'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Produk/tambah');
        }
        $this->ProdukModels->insert([
            'id_kategori'  => $this->input->post('id_kategori'),
            'nama_produk'  => $this->input->post('nama_produk'),
            'stok'         => $this->input->post('stok'),
            'harga_beli'   => $this->input->post('harga_beli'),
            'harga_jual'   => $this->input->post('harga_jual'),
        ]);
        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
        redirect('Produk');
    }

    public function edit($id) {
        $data = [
            'title'    => 'Edit Produk',
            'produk'   => $this->ProdukModels->get_by_id($id),
            'kategori' => $this->KategoriModels->get_all(),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('produk/form', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('id_kategori', 'Kategori',    'required');
        $this->form_validation->set_rules('stok',        'Stok',        'required|integer');
        $this->form_validation->set_rules('harga_beli',  'Harga Beli',  'required|numeric');
        $this->form_validation->set_rules('harga_jual',  'Harga Jual',  'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Produk/edit/' . $id);
        }
        $this->ProdukModels->update($id, [
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_produk' => $this->input->post('nama_produk'),
            'stok'        => $this->input->post('stok'),
            'harga_beli'  => $this->input->post('harga_beli'),
            'harga_jual'  => $this->input->post('harga_jual'),
        ]);
        $this->session->set_flashdata('success', 'Produk berhasil diperbarui!');
        redirect('Produk');
    }

    public function hapus($id) {
        $this->ProdukModels->delete($id);
        $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
        redirect('Produk');
    }
}
