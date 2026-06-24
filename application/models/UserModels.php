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
        } else {
            unset($data['password']);
        }
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
    
    }
    public function delete($id) {
        $this->db->where('id_user', $id);
        return $this->db->delete('users');
    }
    public function is_username_exist($username, $exclude_id = null) {
        $this->db->where('username', $username);
        if ($exclude_id) $this->db->where('id_user !=', $exclude_id);
        return $this->db->count_all_results('users') > 0;
    }
}