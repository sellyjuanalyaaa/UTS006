<?php
class Barang extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
    }
    
    public function index() {
        $data['barang'] = $this->Barang_model->get_barang()->result();
        $this->load->view('barang/list', $data);
    }
    
    public function add() {
        $data['kategori'] = $this->Kategori_model->get_kategori()->result();
        $this->load->view('barang/add', $data);
    }
    
    public function save() {
        $data = [
            'id_kategori' => $this->input->post('kategori'),
            'nama_barang' => $this->input->post('nama'),
            'stok' => $this->input->post('stok'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        
        $this->Barang_model->add_barang($data);
        redirect('barang');
    }
    
    public function edit($id) {
        $data['barang'] = $this->Barang_model->get_barang($id)->row();
        $data['kategori'] = $this->Kategori_model->get_kategori()->result();
        $this->load->view('barang/edit', $data);
    }
    
    public function update($id) {
        $data = [
            'id_kategori' => $this->input->post('kategori'),
            'nama_barang' => $this->input->post('nama'),
            'stok' => $this->input->post('stok'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        
        $this->Barang_model->update_barang($id, $data);
        redirect('barang');
    }
    
    public function delete($id) {
        $this->Barang_model->delete_barang($id);
        redirect('barang');
    }
}