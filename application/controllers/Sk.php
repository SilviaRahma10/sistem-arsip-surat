<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        $this->load->model('Sk_model', 'sk');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'Surat Keluar'
        ];

        $this->template->render_page('surat-keluar/index', $data);
    }

    public function ambilData()
    {
        // jika ada request ajax yang dikirimkan
        if ($this->input->is_ajax_request() == true) {
            // ambil data dari table
            $list = $this->sk->get_datatables();
            $data = [];
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = [];

                // tombol aksi
                $btnAction = "<div class=\"dropdown\">
                <button class=\"btn btn-sm btn-info dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    <i class=\"fa fa-fw fa-list\"></i>
                </button>
                <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                    <a href='surat-keluar/$field->id' class='dropdown-item'>Detail</a>
                    <a href='surat-keluar/ubah/$field->id' class='dropdown-item'>Ubah</a>
                    <a href=\"\" data-toggle=\"modal\" data-target=\"#modalHapus\" class='dropdown-item' id='hapus-sk' data-id='$field->id'>Hapus</a>
                </div>
            </div>";

                // Memanggil data dari tabel surat_masuk
                $row[] = $field->no_agenda;
                $row[] = $field->pengirim;
                $row[] = $field->no_surat;
                $row[] = date('d/m/Y', strtotime($field->tgl_surat));
                $row[] = $btnAction;
                $data[] = $row;
            }

            $output = [
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->sk->count_all(),
                "recordsFiltered" => $this->sk->count_filtered(),
                "data" => $data,
            ];
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function detail($id)
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'Detail Surat Keluar',
            'surat' => $this->sk->getSuratKeluar($id),
        ];

        $this->template->render_page('surat-keluar/detail', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('no_agenda', 'No. Agenda', 'required|numeric|is_unique[surat_keluar.no_agenda]');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('no_surat', 'No. Surat', 'required');
        $this->form_validation->set_rules('isi', 'Isi Ringkas', 'required|max_length[300]');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('tgl_diterima', 'Tanggal Diterima', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'judul' => 'Tambah Surat Keluar'
            ];

            $this->template->render_page('surat-keluar/tambah', $data);
        } else {
            // jika validasi lolos, insert data
            $this->sk->insert();
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $data['surat'] = $this->sk->getSuratKeluar($id);

        $this->db->where('id', $id);
        $this->db->delete('surat_keluar');
        $this->session->set_flashdata('msg', 'dihapus.');

        // Hapus file di folder uploads
        unlink(FCPATH . './uploads/' . $data['surat']['file']);
        redirect('surat-keluar');
    }

    public function Ubah($id)
    {
        $noAgenda = $this->input->post('no_agenda');
        $sk = $this->sk->getSuratKeluar($id);
        if ($sk['no_agenda'] == $noAgenda) {
            $ruleAgenda = 'required|numeric';
        } else {
            $ruleAgenda = 'required|numeric|is_unique[surat_keluar.no_agenda]';
        }
        $this->form_validation->set_rules('no_agenda', 'No. Agenda', $ruleAgenda);
        $this->form_validation->set_rules('no_surat', 'No. Surat', 'required');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('isi', 'Isi Ringkas', 'required|max_length[300]');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('tgl_diterima', 'Tanggal Diterima', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'judul' => 'Ubah Surat Keluar',
                'surat' => $this->sk->getSuratKeluar($id)
            ];

            $this->template->render_page('surat-keluar/ubah', $data);
        } else {
            // jika validasi lolos, insert data
            $this->sk->ubah();
        }
    }
}
