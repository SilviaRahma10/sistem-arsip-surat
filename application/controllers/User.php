<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'My Profile'
        ];

        $username = $this->input->post('username');

        // cek jika username baru sama dengan username dari user yang login, maka tak perlu validasi unique dengan username di database
        if ($username == $data['user']['username']) {
            $rules = 'required|trim';
        } else {
            $rules = 'required|trim|is_unique[user.username]';
        }

        $this->form_validation->set_rules('username', 'Username', $rules);

        if ($this->form_validation->run() == false) {
            $this->template->render_page('user/index', $data);
        } else {
            $this->user->ubahprofile();
        }
    }

    public function ubahPass()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'Ubah Password'
        ];

        $this->form_validation->set_rules('password', 'Password Lama', 'required');
        $this->form_validation->set_rules('newpass', 'Password Baru', 'required|min_length[8]|matches[newpass2]', [
            'matches' => 'Konfirmasi password tidak sesuai'
        ]);
        $this->form_validation->set_rules('newpass2', 'Konfirmasi Password', 'required|matches[newpass]', [
            'matches' => 'Konfirmasi password tidak sesuai'
        ]);

        if ($this->form_validation->run() == false) {
            $this->template->render_page('user/ubah-pass', $data);
        } else {
            $this->user->ubahpassword();
        }
    }
}
