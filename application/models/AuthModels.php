<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModels extends CI_Model{
    public function login($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('users');
        return $query->row();
    }
}