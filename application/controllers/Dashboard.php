<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('Auth');
        $this->load->model(['ProdukModels', 'TransaksiModels', 'KategoriModels', 'UserModels']);
    }

    public function index(){
        $data = [
        'title'             =>'Dashboard',
        'total_transaksi'   =>$this->Transaksi->total_hari_ini(),
        'omzet_hari_ini'    =>$this->Transaksi->omzet_hari_ini(),
        'total_produk'      =>$this->Produk->count_all(),
        'total_kategori'    =>$this->Kategori->count_all(),
        'stok_menipis'      =>$this->Produk->stok_menipis(10),
        'produk_terlaris'   =>$this->Produk->terlaris(5),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}
