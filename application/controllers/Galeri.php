<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        $this->load->model('Sm_model', 'sm');
        $this->load->model('Sk_model', 'sk');
        $this->load->model('Mm_model', 'mm');
        $this->load->model('Mk_model', 'mk');
    }
    
    public function sm()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'Galeri File - Surat Masuk',
            'file' => $this->sm->getSmByFile()
        ];

        $this->template->render_page('galeri/sm', $data);
    }

    public function sk()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'Galeri File - Surat Keluar',
            'file' => $this->sk->getSkByFile()
        ];

        $this->template->render_page('galeri/sk', $data);
    }

    public function mm()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'Galeri File - Memo Masuk',
            'file' => $this->mm->getMmByFile()
        ];

        $this->template->render_page('galeri/mm', $data);
    }

    public function mk()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'Galeri File - Memo Keluar',
            'file' => $this->mk->getMkByFile()
        ];

        $this->template->render_page('galeri/mk', $data);
    }
}
