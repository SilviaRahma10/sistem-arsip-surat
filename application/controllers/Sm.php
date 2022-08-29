<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        $this->load->model('Sm_model', 'sm');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'Surat Masuk'
        ];

        $this->template->render_page('surat-masuk/index', $data);
    }

    public function ambilData()
    {
        // jika ada request ajax yang dikirimkan
        if ($this->input->is_ajax_request() == true) {
            // ambil data dari table
            $list = $this->sm->get_datatables();
            $data = [];
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = [];

                // tombol aksi
                $btnAction = "<div class=\"dropdown\">
                    <button class=\"btn btn-sm btn-success dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <i class=\"fa fa-fw fa-list\"></i>
                    </button>
                    <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                        <a href='disposisi/$field->id' class='dropdown-item'>Disposisi</a>
                        <a href='surat-masuk/$field->id' class='dropdown-item'>Detail</a>
                        <a href=\"\" data-toggle=\"modal\" data-target=\"#modalHapus\" class='dropdown-item' id='hapus-sm' data-id='$field->id'>Hapus</a>
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
                "recordsTotal" => $this->sm->count_all(),
                "recordsFiltered" => $this->sm->count_filtered(),
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
            'judul' => 'Detail Surat Masuk',
            'surat' => $this->sm->getSuratMasuk($id),
        ];

        $this->template->render_page('surat-masuk/detail', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('no_agenda', 'No. Agenda', 'required|numeric|is_unique[surat_masuk.no_agenda]');
        $this->form_validation->set_rules('no_surat', 'No. Surat', 'required');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('isi', 'Isi Ringkas', 'required|max_length[300]');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('tgl_diterima', 'Tanggal Diterima', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'judul' => 'Tambah Surat Masuk'
            ];

            $this->template->render_page('surat-masuk/tambah', $data);
        } else {
            // jika validasi lolos, insert data
            $this->sm->insert();
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $data['surat'] = $this->sm->getSuratMasuk($id);


        $this->db->delete('disposisi', ['sm_id' => $id]);
        $this->db->delete('surat_masuk', ['id' => $id]);
        $this->session->set_flashdata('msg', 'dihapus.');

        // Hapus file di folder uploads
        unlink(FCPATH . './uploads/' . $data['surat']['file']);
        redirect('surat-masuk');
    }

    public function Ubah($id)
    {
        $noAgenda = $this->input->post('no_agenda');
        $sm = $this->sm->getSuratMasuk($id);
        if ($sm['no_agenda'] == $noAgenda) {
            $ruleAgenda = 'required|numeric';
        } else {
            $ruleAgenda = 'required|numeric|is_unique[surat_masuk.no_agenda]';
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
                'judul' => 'Ubah Surat Masuk',
                'surat' => $this->sm->getSuratMasuk($id)
            ];

            $this->template->render_page('surat-masuk/ubah', $data);
        } else {
            // jika validasi lolos, insert data
            $this->sm->ubah();
        }
    }
}
