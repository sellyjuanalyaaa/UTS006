<?php
class Peminjaman extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
    }
    
    public function index() {
        $data['peminjaman'] = $this->Peminjaman_model->get_peminjaman()->result();

            // Membuat filter array berdasarkan input GET
            $filter = [
                'barang' => $this->input->get('barang'),
                'kategori' => $this->input->get('kategori'),
                'tanggal_mulai' => $this->input->get('tanggal_mulai'),
                'tanggal_selesai' => $this->input->get('tanggal_selesai'),
                'status' => $this->input->get('status')
            ];
        
            // Membersihkan filter dari nilai kosong
            $filter = array_filter($filter, function($value) {
                return $value !== null && $value !== '';
            });
        
            // Mengambil data dengan filter
            $data['peminjaman'] = $this->Peminjaman_model->get_peminjaman_with_filter($filter)->result();
            $data['kategori_list'] = $this->Kategori_model->get_kategori()->result();
            $data['filter'] = $this->input->get(); // Untuk mengembalikan nilai filter ke view
        
            $this->load->view('peminjaman/list', $data);

    }
    
    public function add() {
        $data['barang'] = $this->Barang_model->get_barang()->result();
        $this->load->view('peminjaman/add', $data);
    }
    
    public function save() {
        $id_barang = $this->input->post('barang');
        $jumlah = $this->input->post('jumlah');
        
        // Cek stok tersedia
        $barang = $this->Barang_model->get_barang($id_barang)->row();
        if($barang->stok < $jumlah) {
            $this->session->set_flashdata('error', 'Stok tidak mencukupi');
            redirect('peminjaman/add');
        }
        
        $data = [
            'id_barang' => $id_barang,
            'jumlah' => $jumlah,
            'peminjam' => $this->input->post('peminjam'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'status' => 'Dipinjam'
        ];
        
        $this->Peminjaman_model->add_peminjaman($data);
        $this->Barang_model->update_stok($id_barang, $jumlah);
        redirect('peminjaman');
    }
    
    public function kembalikan($id) {
        $this->Peminjaman_model->kembalikan_barang($id);
        redirect('peminjaman');
    }
    
    public function laporan() {
        $data['peminjaman'] = $this->Peminjaman_model->get_peminjaman('Dipinjam')->result();
        $this->load->view('peminjaman/laporan', $data);
    }

    public function cetak() {
        $data['peminjaman'] = $this->Peminjaman_model->get_peminjaman_with_filter(['status' => 'Dipinjam'])->result();
        $this->load->view('barang/laporan_cetak', $data);
    }

    public function pdf() {
        $this->load->library('dompdf_lib');
        $data['peminjaman'] = $this->Peminjaman_model->get_peminjaman_with_filter(['status' => 'Dipinjam'])->result();
    
        $html = $this->load->view('barang/laporan_pdf', $data, true);
        $this->dompdf_lib->loadHtml($html);
        $this->dompdf_lib->setPaper('A4', 'landscape');
        $this->dompdf_lib->render();
        $this->dompdf_lib->stream("laporan_peminjaman.pdf", array("Attachment" => 1));
    }
    
    
    
}