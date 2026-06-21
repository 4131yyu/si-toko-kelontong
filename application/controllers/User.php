<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('Auth');
        if ($this->session->userdata('role') !== 'admin') redirect('Dashboard');
        $this->load->model('User');
    }

    public function index() {
        $data = [
            'title' => 'Manajemen User',
            'users' => $this->User->get_all(),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data = ['title' => 'Tambah User', 'user' => null];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/form', $data);
        $this->load->view('templates/footer');
    }

    public function simpan() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('User/tambah');
        }

        if ($this->User->is_username_exist($this->input->post('username'))) {
            $this->session->set_flashdata('error', 'Username sudah digunakan!');
            redirect('User/tambah');
        }

        $this->User->insert([
            'username'     => $this->input->post('username'),
            'password'     => $this->input->post('password'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'role'         => $this->input->post('role'),
        ]);
        $this->session->set_flashdata('success', 'User berhasil ditambahkan!');
        redirect('User');
    }

    public function edit($id) {
        $data = [
            'title' => 'Edit User',
            'user'  => $this->User->get_by_id($id),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/form', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('User/edit/' . $id);
        }

        if ($this->User->is_username_exist($this->input->post('username'), $id)) {
            $this->session->set_flashdata('error', 'Username sudah digunakan!');
            redirect('User/edit/' . $id);
        }

        $this->User->update($id, [
            'username'     => $this->input->post('username'),
            'password'     => $this->input->post('password'), // kosong = tidak diubah (handled di model)
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'role'         => $this->input->post('role'),
        ]);
        $this->session->set_flashdata('success', 'User berhasil diperbarui!');
        redirect('User');
    }

    public function hapus($id) {
        if ($id == $this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Tidak bisa menghapus akun sendiri!');
            redirect('User');
        }
        $this->User->delete($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus!');
        redirect('User');
    }
}
