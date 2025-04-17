<?php
class Kategori_model extends CI_Model {
    public function get_kategori($id = null) {
        if($id != null) {
            $this->db->where('id_kategori', $id);
        }
        return $this->db->get('kategori');
    }
    
    public function add_kategori($data) {
        $this->db->insert('kategori', $data);
        return $this->db->affected_rows();
    }
    
    public function update_kategori($id, $data) {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
        return $this->db->affected_rows();
    }
    
    public function delete_kategori($id) {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
        return $this->db->affected_rows();
    }
}