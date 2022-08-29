<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        $this->load->model('Mk_model', 'mk');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'Memo Keluar'
        ];

        $this->template->render_page('memo-keluar/index', $data);
    }
    
    public function ambilData()
    {
        // jika ada request ajax yang dikirimkan
        if ($this->input->is_ajax_request() == true) {
            // ambil data dari table
            $list = $this->mk->get_datatables();
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
                    <a href='memo-keluar/$field->id' class='dropdown-item'>Detail</a>
                    <a href='memo-keluar/ubah/$field->id' class='dropdown-item'>Ubah</a>
                    <a href=\"\" data-toggle=\"modal\" data-target=\"#modalHapus\" class='dropdown-item' id='hapus-mk' data-id='$field->id'>Hapus</a>
                </div>
            </div>";

                // Memanggil data dari tabel memo_masuk
                $row[] = $field->penerima;
                $row[] = date('d/m/Y', strtotime($field->tgl));
                $row[] = $btnAction;
                $data[] = $row;
            }

            $output = [
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->mk->count_all(),
                "recordsFiltered" => $this->mk->count_filtered(),
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
            'judul' => 'Detail Memo Keluar',
            'memo' => $this->mk->getMemoKeluar($id),
        ];

        $this->template->render_page('memo-keluar/detail', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('penerima', 'Penerima', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'judul' => 'Tambah Memo Keluar'
            ];

            $this->template->render_page('Memo-keluar/tambah', $data);
        } else {
            // jika validasi lolos, insert data
            $this->mk->insert();
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $data['memo'] = $this->mk->getMemoKeluar($id);

        $this->db->where('id', $id);
        $this->db->delete('memo_keluar');
        $this->session->set_flashdata('msg', 'dihapus.');

        // Hapus file di folder uploads
        unlink(FCPATH . './uploads/' . $data['memo']['file']);
        redirect('memo-keluar');
    }

    public function Ubah($id)
    {
        $mk = $this->mk->getMemoKeluar($id);

        $this->form_validation->set_rules('penerima', 'Penerima', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'judul' => 'Ubah Memo Keluar',
                'memo' => $this->mk->getMemoKeluar($id)
            ];

            $this->template->render_page('memo-keluar/ubah', $data);
        } else {
            // jika validasi lolos, insert data
            $this->mk->ubah();
        }
    }
}
