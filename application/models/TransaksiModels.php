<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModels extends CI_Model {

    public function get_all() {
        $this->db->select('transaksi.*, users.nama_lengkap');
        $this->db->from('transaksi');
        $this->db->join('users', 'users.id_user = transaksi.id_user');
        $this->db->order_by('transaksi.tgl_transaksi', 'DESC');
        return $this->db->get()->result();
    }
    public function get_by_id($id) {
        $this->db->select('transaksi.*, users.nama_lengkap');
        $this->db->from('transaksi');
        $this->db->join('users', 'users.id_user = transaksi.id_user');
        $this->db->where('transaksi.id_transaksi', $id);
        return $this->db->get()->row();
    }
    public function get_detail($id_transaksi) {
        $this->db->select('detail_transaksi.*, produk.nama_produk');
        $this->db->from('detail_transaksi');
        $this->db->join('produk', 'produk.id_produk = detail_transaksi.id_produk');
        $this->db->where('detail_transaksi.id_transaksi', $id_transaksi);
        return $this->db->get()->result();
    }
    public function get_by_tanggal($tgl_awal, $tgl_akhir) {
        $this->db->select('transaksi.*, users.nama_lengkap');
        $this->db->from('transaksi');
        $this->db->join('users', 'users.id_user = transaksi.id_user');
        $this->db->where('DATE(transaksi.tgl_transaksi) >=', $tgl_awal);
        $this->db->where('DATE(transaksi.tgl_transaksi) <=', $tgl_akhir);
        $this->db->order_by('transaksi.tgl_transaksi', 'DESC');
        return $this->db->get()->result();
    }
}