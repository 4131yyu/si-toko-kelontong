<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModels extends CI_Model {

    public function get_all() {
        $this->db->select('transaksi.*, users.nama_lengkap');
        $this->db->from('transaksi');
        $this->db->join('users', 'users.id_user = transaksi.id_user');
        $this->db->order_by('transaksi.tgl_transaksi', 'DESC');
        return $this->db->get()->result();
    }
}