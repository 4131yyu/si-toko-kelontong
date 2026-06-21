<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('Auth');
        if (!$this->session->userdata('role') !== 'admin') redirect('Dashbord');
        $this->load->,model('KategoriModels');
    }
    public function index(){
        $data = [
            'title'     => 'Manajemen Kategori',
            'kategori'  => $this->KategoriModels->get_all(),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah() {
        $data = ['title' => 'Tambah Kategori'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kategori/form', $data);
        $this->load->view('templates/footer');
    }
     public function simpan() {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Kategori/tambah');
        }
        $this->KategoriModels->insert([
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi'     => $this->input->post('deskripsi'),
        ]);
        $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan!');
        redirect('Kategori');
    }

    public function edit($id) {
        $data = [
            'title'    => 'Edit Kategori',
            'kategori' => $this->KategoriModels->get_by_id($id),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kategori/form', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Kategori/edit/' . $id);
        }
        $this->KategoriModels->update($id, [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi'     => $this->input->post('deskripsi'),
        ]);
        $this->session->set_flashdata('success', 'Kategori berhasil diperbarui!');
        redirect('Kategori');
    }

    public function hapus($id) {
        $this->KategoriModels->delete($id);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus!');
        redirect('Kategori');
    }
}
