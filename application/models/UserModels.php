<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UserModels extends CI_Model {

    public function get_all() {
        return $this->db->order_by('created_at', 'DESC')->get('users')->result();
    }
    public function get_by_id($id) {
        return $this->db->get_where('users', ['id_user' => $id])->row();
    }
}