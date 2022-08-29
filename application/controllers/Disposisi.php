<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        $this->load->model('Disposisi_model', 'dispos');
        $this->load->model('Pengaturan_model', 'pengaturan');
    }

    public function index($sm_id)
    {
        $query = $this->dispos->checkSm($sm_id);
        if ($query->row_array()) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'judul' => 'Disposisi Surat',
                'disposisi' => $this->dispos->getDisposisi($sm_id),
                'sm_id' => $sm_id,
            ];
            $this->template->render_page('disposisi/index', $data);
        } else {
            $this->session->set_flashdata('err', 'tidak ditemukan.');
            redirect('sm');
        }
    }
    
    public function detail($id)
    {
        $query = $this->dispos->checkDispos($id);
        if ($query->row_array()) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'judul' => 'Detail Disposisi',
                'dispos' => $this->dispos->getRowDispos($id),
            ];

            // view
            $this->template->render_page('disposisi/detail', $data);
        } else {
            $this->session->set_flashdata('err', 'tidak ditemukan.');
            redirect('surat-masuk');
        }
    }

    public function tambah($sm_id)
    {
        $query = $this->dispos->checkSm($sm_id);
        if ($query->row_array()) {
            $this->form_validation->set_rules('jabatan_id', 'Jabatan', 'required');
            $this->form_validation->set_rules('sifat_id', 'Sifat Surat', 'required');

            if ($this->form_validation->run() == false) {
                $data = [
                    'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                    'judul' => 'Tambah Disposisi - Surat Masuk',
                    'sm_id' => $sm_id,
                    'jabatan' => $this->pengaturan->getJabatan(),
                    'sifat' => $this->pengaturan->getSifat(),
                ];

                $this->template->render_page('disposisi/tambah', $data);
            } else {
                // jika validasi lolos, insert data
                $this->dispos->insert();
            }
        } else {
            $this->session->set_flashdata('err', 'tidak ditemukan.');
            redirect('surat-masuk');
        }
    }

    public function ubah($id)
    {
        $query = $this->dispos->checkDispos($id);
        if ($query->row_array()) {
            $this->form_validation->set_rules('jabatan_id', 'Jabatan', 'required');
            $this->form_validation->set_rules('sifat_id', 'Sifat Surat', 'required');

            if ($this->form_validation->run() == false) {
                $data = [
                    'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                    'judul' => 'Ubah Disposisi - Surat Masuk',
                    'dispos' => $this->dispos->getRowDispos($id),
                    'jabatan' => $this->pengaturan->getJabatan(),
                    'sifat' => $this->pengaturan->getSifat(),
                ];

                $this->template->render_page('disposisi/ubah', $data);
            } else {
                $this->dispos->update();
            }
        } else {
            $this->session->set_flashdata('err', 'tidak ditemukan.');
            redirect('surat-masuk');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->db->delete('disposisi', ['id' => $id]);
        $this->session->set_flashdata('msg', 'dihapus.');
        redirect('surat-masuk');
    }
}
