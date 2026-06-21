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
     public function total_hari_ini() {
        $this->db->where('DATE(tgl_transaksi)', date('Y-m-d'));
        return $this->db->count_all_results('transaksi');
    }
    public function omzet_hari_ini() {
        $this->db->select_sum('total_harga');
        $this->db->where('DATE(tgl_transaksi)', date('Y-m-d'));
        $row = $this->db->get('transaksi')->row();
        return $row->total_harga ?? 0;
    }
    public function generate_kode() {
        $prefix = 'TRX-' . date('Ymd') . '-';
        $this->db->like('kode_transaksi', $prefix, 'after');
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->limit(1);
        $row = $this->db->get('transaksi')->row();
        if ($row) {
            $last = (int) substr($row->kode_transaksi, -4);
            return $prefix . str_pad($last + 1, 4, '0', STR_PAD_LEFT);
        }
        return $prefix . '0001';
    }
    public function insert_transaksi($data) {
        $this->db->insert('transaksi', $data);
        return $this->db->insert_id();
    }
    public function insert_detail($data) {
        return $this->db->insert_batch('detail_transaksi', $data);
    }
    public function count_all() {
        return $this->db->count_all('transaksi');
    }
}