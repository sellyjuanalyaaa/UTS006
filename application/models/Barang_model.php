<?php
class Barang_model extends CI_Model {
    public function get_barang($id=null) {
        $this->db->select('barang.*, kategori.nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        
        if($id != null) {
            $this->db->where('id_barang', $id);
        }
        return $this->db->get();
    }
    
    public function add_barang($data) {
        $this->db->insert('barang', $data);
        return $this->db->affected_rows();
    }
    
    public function update_barang($id, $data) {
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
        return $this->db->affected_rows();
    }
    
    public function delete_barang($id) {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
        return $this->db->affected_rows();
    }
    
    public function update_stok($id_barang, $jumlah) {
        $this->db->set('stok', 'stok-'.$jumlah, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang');
    }
}