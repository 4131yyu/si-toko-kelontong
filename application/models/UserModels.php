<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UserModels extends CI_Model {

    public function get_all() {
        return $this->db->order_by('created_at', 'DESC')->get('users')->result();
    }
    public function get_by_id($id) {
        return $this->db->get_where('users', ['id_user' => $id])->row();
    }
     public function insert($data) {
        $data['password'] = md5($data['password']);
        return $this->db->insert('users', $data);
    }
     public function update($id, $data) {
        if (!empty($data['password'])) {
            $data['password'] = md5($data['password']);
        }
    }
}