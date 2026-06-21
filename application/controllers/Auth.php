<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('AuthModels');
    }
    public function index(){
        if ($this->session->userdata('logged_in')){
            redirect('Dashboard');
        }
        $this->load->view('auth/login');

    }
    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->AuthModels->login($username, $password);

        if ($user){
            $sess = [
                'logged_in'     => TRUE,
                'id_user'       => $user->id_user,
                'username'      => $user->$username,
                'nama_lengkap'  => $user->nama_lengkap,
                'role'          => $user->role,
            ];
            $this->session->set_userdata($sess);
            redirect('Dashboard');
        }else{
            $this->session->set_userdata('error', 'Username atau password salah!');
            redirect('Auth');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Auth');
    }
}