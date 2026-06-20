<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('Auth');
        if ($this->session->userdata('role') !== 'admin') redirect('Dashboard');
        $this->load->model('M_Transaksi');
    }

    public function index() {
        $tgl_awal  = $this->input->get('tgl_awal') ?: date('Y-m-01');
        $tgl_akhir = $this->input->get('tgl_akhir') ?: date('Y-m-d');

        $data = [
            'title'     => 'Laporan Penjualan',
            'tgl_awal'  => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'transaksi' => $this->M_Transaksi->get_by_tanggal($tgl_awal, $tgl_akhir),
        ];

        $total = 0;
        foreach ($data['transaksi'] as $t) $total += $t->total_harga;
        $data['total_keseluruhan'] = $total;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function pdf() {
        // Membutuhkan library TCPDF: composer require tecnickcom/tcpdf
        // atau taruh folder TCPDF di application/third_party/tcpdf
        $tgl_awal  = $this->input->get('tgl_awal') ?: date('Y-m-01');
        $tgl_akhir = $this->input->get('tgl_akhir') ?: date('Y-m-d');

        $transaksi = $this->M_Transaksi->get_by_tanggal($tgl_awal, $tgl_akhir);
        $total = 0;
        foreach ($transaksi as $t) $total += $t->total_harga;

        require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator('Toko Kelontong');
        $pdf->SetTitle('Laporan Penjualan');
        $pdf->SetMargins(15, 15, 15);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->AddPage();

        $html = '<h2>Laporan Penjualan</h2>';
        $html .= '<p>Periode: ' . date('d-m-Y', strtotime($tgl_awal)) . ' s/d ' . date('d-m-Y', strtotime($tgl_akhir)) . '</p>';
        $html .= '<table border="1" cellpadding="5">
                    <tr style="background-color:#2E75B6;color:#fff;">
                        <th>Kode Transaksi</th><th>Tanggal</th><th>Kasir</th><th>Total</th>
                    </tr>';
        foreach ($transaksi as $t) {
            $html .= '<tr>
                        <td>' . $t->kode_transaksi . '</td>
                        <td>' . date('d-m-Y H:i', strtotime($t->tgl_transaksi)) . '</td>
                        <td>' . $t->nama_lengkap . '</td>
                        <td align="right">Rp ' . number_format($t->total_harga, 0, ',', '.') . '</td>
                      </tr>';
        }
        $html .= '<tr style="font-weight:bold;">
                    <td colspan="3" align="right">Total Keseluruhan</td>
                    <td align="right">Rp ' . number_format($total, 0, ',', '.') . '</td>
                  </tr>';
        $html .= '</table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('Laporan_Penjualan_' . $tgl_awal . '_sd_' . $tgl_akhir . '.pdf', 'I');
    }
}
