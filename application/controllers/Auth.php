<?php
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }

    public function index() {
        // If user is already logged in, redirect to dashboard
        $this->load->view('auth/login');
    }

    // Register Form
    public function register() {
        // If user is already logged in, redirect to dashboard
        $this->load->view('auth/register');
    }

    // Process Registration
    public function process_register() {

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
            ];

            if ($this->User_model->register($data)) {
                // Automatically log in user after registration
                $user = $this->User_model->login($data['username'], $this->input->post('password'));
                
                if ($user) {
                    // Set user session data
                    $user_data = [
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'nama_lengkap' => $user->nama_lengkap,
                        // 'role' => $user->role,
                        'logged_in' => true
                    ];

                    $this->session->set_userdata($user_data);
                    
                    // Redirect to appropriate dashboard
                    $this->load->view('auth/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Pendaftaran gagal. Silakan coba lagi.');
                redirect('auth/register');
            }
        }
    }
    // Login Form
    public function login() {
        

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->login($username, $password);

            if ($user) {
                // Set user session data
                $user_data = [
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'nama_lengkap' => $user->nama_lengkap,
                    // 'role' => $user->role,
                    'logged_in' => true
                ];

                $this->session->set_userdata($user_data);
                $this->load->model('Barang_model');
                $data['barang'] = $this->Barang_model->get_barang($id=null)->result();
                // Redirect to appropriate dashboard
                $this->load->view('barang/list', $data);
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah');
                redirect('auth');
            }
        }
    }

    // Logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

    // Helper function to redirect to appropriate dashboard

}
