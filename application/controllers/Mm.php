<?php


class Mm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        $this->load->model('Mm_model', 'mm');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'Memo Masuk'
        ];

        $this->template->render_page('memo-masuk/index', $data);
    }
    
    public function ambilData()
    {
        // jika ada request ajax yang dikirimkan
        if ($this->input->is_ajax_request() == true) {
            // ambil data dari table
            $list = $this->mm->get_datatables();
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
                        <a href='memo-masuk/$field->id' class='dropdown-item'>Detail</a>
                        <a href=\"\" data-toggle=\"modal\" data-target=\"#modalHapus\" class='dropdown-item' id='hapus-sm' data-id='$field->id'>Hapus</a>
                    </div>
                </div>";

                // Memanggil data dari tabel memo_masuk
                $row[] = $field->pengirim;
                $row[] = date('d/m/Y', strtotime($field->tgl));
                $row[] = $btnAction;
                $data[] = $row;
            }

            $output = [
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->mm->count_all(),
                "recordsFiltered" => $this->mm->count_filtered(),
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
            'judul' => 'Detail Memo Masuk',
            'memo' => $this->mm->getMemoMasuk($id),
        ];

        $this->template->render_page('memo-masuk/detail', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'judul' => 'Tambah Memo Masuk'
            ];

            $this->template->render_page('memo-masuk/tambah', $data);
        } else {
            // jika validasi lolos, insert data
            $this->mm->insert();
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $data['memo'] = $this->mm->getMemoMasuk($id);


        $this->db->delete('memo_masuk', ['id' => $id]);
        $this->session->set_flashdata('msg', 'dihapus.');

        // Hapus file di folder uploads
        unlink(FCPATH . './uploads/' . $data['memo']['file']);
        redirect('memo-masuk');
    }

    public function Ubah($id)
    {
        $mm = $this->mm->getMemoMasuk($id);
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'judul' => 'Ubah Memo Masuk',
                'memo' => $this->mm->getMemoMasuk($id)
            ];

            $this->template->render_page('memo-masuk/ubah', $data);
        } else {
            // jika validasi lolos, insert data
            $this->mm->ubah();
        }
    }
}
