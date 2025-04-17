<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
    }

    public function index() {
        $data['kategori'] = $this->Kategori_model->get_kategori()->result();
        $this->load->view('kategori/list', $data);
    }

    public function add() {
        $this->load->view('kategori/add');
    }

    public function save() {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $this->Kategori_model->add_kategori($data);
        redirect('kategori');
    }

    public function edit($id) {
        $data['kategori'] = $this->Kategori_model->get_kategori($id)->row();
        $this->load->view('kategori/edit', $data);
    }

    public function update($id) {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $this->Kategori_model->update_kategori($id, $data);
        redirect('kategori');
    }

    public function delete($id) {
        $this->Kategori_model->delete_kategori($id);
        redirect('kategori');
    }
}
