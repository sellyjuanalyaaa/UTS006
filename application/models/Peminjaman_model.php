<?php
class Peminjaman_model extends CI_Model {
    // ... fungsi lainnya
    
    public function get_peminjaman($status = null, $filter =[], $limit = 8, $offset = 0){
        $this->db->from('peminjaman');
        $this->db->join('barang', 'barang.id_barang = peminjaman.id_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        
        if($status !== null) {
            $this->db->where('peminjaman.status', $status);
        }
        
        // Implementasi filter
        if(!empty($filter['barang'])) {
            $this->db->like('barang.nama_barang', $filter['barang']);
        }
        
        if(!empty($filter['kategori'])) {
            $this->db->where('barang.id_kategori', $filter['kategori']);
        }
        
        if(!empty($filter['tanggal_mulai'])) {
            $this->db->where('peminjaman.tanggal_pinjam >=', $filter['tanggal_mulai']);
        }
        
        if(!empty($filter['tanggal_selesai'])) {
            $this->db->where('peminjaman.tanggal_pinjam <=', $filter['tanggal_selesai']);
        }
        if (!empty($filter['barang']) && empty($filter['status'])) {
            $this->db->where('peminjaman.status', 'Dipinjam');
        } elseif (!empty($filter['status'])) {
            $this->db->where('peminjaman.status', $filter['status']);
        }
    
        $this->db->order_by('peminjaman.tanggal_pinjam', 'DESC');
        $this->db->limit($limit, $offset); // Tambahan limitasi data per halaman
        return $this->db->get();
    }
    
    public function add_peminjaman($data) {
        // Tambahkan waktu pinjam otomatis
        $data['waktu_pinjam'] = date('H:i:s');
        $this->db->insert('peminjaman', $data);
        return $this->db->affected_rows();
    }
    
    public function kembalikan_barang($id_peminjaman) {
        $this->db->set('status', 'Dikembalikan');
        $this->db->set('tanggal_kembali', date('Y-m-d'));
        $this->db->set('waktu_kembali', date('H:i:s'));
        $this->db->where('id_peminjaman', $id_peminjaman);
        $this->db->update('peminjaman');
        
        // Update stok barang
        $peminjaman = $this->db->get_where('peminjaman', ['id_peminjaman' => $id_peminjaman])->row();
        $this->db->set('stok', 'stok+'.$peminjaman->jumlah, FALSE);
        $this->db->where('id_barang', $peminjaman->id_barang);
        $this->db->update('barang');
        
        return $this->db->affected_rows();
    }

    public function get_peminjaman_with_filter($filter = []) {
        $this->db->select('peminjaman.*, barang.nama_barang, kategori.nama_kategori');
        $this->db->from('peminjaman');
        $this->db->join('barang', 'barang.id_barang = peminjaman.id_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
    
        // Filter berdasarkan nama barang (mencari yang mengandung kata kunci)
        if (!empty($filter['barang'])) {
            $this->db->like('barang.nama_barang', $filter['barang']);
        }
    
        // Filter berdasarkan kategori
        if (!empty($filter['kategori'])) {
            $this->db->where('barang.id_kategori', $filter['kategori']);
        }
    
        // Filter berdasarkan tanggal
        if (!empty($filter['tanggal_mulai'])) {
            $this->db->where('peminjaman.tanggal_pinjam >=', $filter['tanggal_mulai']);
        }
        if (!empty($filter['tanggal_selesai'])) {
            $this->db->where('peminjaman.tanggal_pinjam <=', $filter['tanggal_selesai']);
        }
    
        // Default filter status Dipinjam jika pencarian barang dilakukan
        if (!empty($filter['barang']) && empty($filter['status'])) {
            $this->db->where('peminjaman.status', 'Dipinjam');
        } 
        // Filter berdasarkan status jika dipilih
        elseif (!empty($filter['status'])) {
            $this->db->where('peminjaman.status', $filter['status']);
        }
    
        $this->db->order_by('peminjaman.tanggal_pinjam', 'DESC');
        return $this->db->get();
    }
}