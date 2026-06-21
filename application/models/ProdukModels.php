<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModels extends CI_Model {

    public function get_all() {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
        $this->db->order_by('produk.nama_produk', 'ASC');
        return $this->db->get()->result();
    }

    public function get_by_id($id) {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
        $this->db->where('produk.id_produk', $id);
        return $this->db->get()->row();
    }

    public function get_for_select() {
        // untuk dropdown di form transaksi
        return $this->db->select('id_produk, nama_produk, harga_jual, stok')
                        ->where('stok >', 0)
                        ->order_by('nama_produk', 'ASC')
                        ->get('produk')->result();
    }

    public function stok_menipis($batas = 10) {
        return $this->db->where('stok <=', $batas)
                        ->order_by('stok', 'ASC')
                        ->get('produk')->result();
    }

    public function insert($data) {
        return $this->db->insert('produk', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_produk', $id);
        return $this->db->update('produk', $data);
    }

    public function delete($id) {
        $this->db->where('id_produk', $id);
        return $this->db->delete('produk');
    }

    public function kurangi_stok($id_produk, $jumlah) {
        $this->db->set('stok', 'stok - ' . (int)$jumlah, FALSE);
        $this->db->where('id_produk', $id_produk);
        return $this->db->update('produk');
    }

    public function count_all() {
        return $this->db->count_all('produk');
    }

    public function terlaris($limit = 5) {
        $this->db->select('produk.nama_produk, SUM(detail_transaksi.jumlah) as total_terjual');
        $this->db->from('detail_transaksi');
        $this->db->join('produk', 'produk.id_produk = detail_transaksi.id_produk');
        $this->db->group_by('detail_transaksi.id_produk');
        $this->db->order_by('total_terjual', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
}
