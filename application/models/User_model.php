<?php
class User_model extends CI_Model {
    public function register($data) {
        // Hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        return $this->db->insert('users', $data);
    }

    public function login($username, $password) {
        $this->db->where('username', $username);
        $user = $this->db->get('users')->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    public function check_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }

    public function check_email($email) {
        return $this->db->get_where('users', ['email' => $email])->row();
    }
}