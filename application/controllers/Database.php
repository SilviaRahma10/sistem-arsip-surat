<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        is_admin();
        $this->load->model('Pengaturan_model', 'pengaturan');
    }

    public function index()
    {
        $data = [
            'judul' => 'Back Up dan Restore Database',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'tables' => $this->pengaturan->getDbTables()
        ];

        $this->db->query('SET GLOBAL FOREIGN_KEY_CHECKS=0;');
        $this->template->render_page('settings/database', $data);
    }

    public function backup()
    {
        if (isset($_POST['backup'])) {
            // load db util class
            $this->load->dbutil();

            // menangkap filter yang dikirim
            $filter = $this->input->post('filterby');

            $arr = ['jabatan', 'disposisi', 'sifat', 'surat_masuk', 'surat_keluar', 'user', 'user_role', 'user_token'];

            $ignores = '';

            // Cek apakah di array ada elemen $filter
            if (in_array($filter, $arr)) {
                // Kalau ada, buat array baru isinya elemen selain $filter
                $ignores = array_filter($arr, function ($val) use ($filter) {
                    return $val !== $filter;
                });
            }

            // menambahkan beberapa konfigurasi
            $prefs = [
                'table' => $filter,
                'ignore'     => $ignores,
                'format' => 'txt',
                'filename' => $filter . '.sql', // contoh disposisi.sql
                'add_drop' => true,
                'add_insert' => true,
            ];

            // backup variable
            $backup = $this->dbutil->backup($prefs);

            // write ke server untuk keperluan restore
            write_file('./backup/database/' . $prefs['filename'], $backup);

            $this->session->set_flashdata('msg', 'Back Up');
            redirect('database');

            // jika mau auto download
            // force_download($prefs['filename'], $backup);

            exit(0);
        }

        return redirect('database');
    }

    public function restore()
    {
        if (isset($_POST['restore'])) {

            $filter = $this->input->post('filterby');

            $isi_file = file_get_contents('./backup/database/' . $filter . '.sql');
            if (empty($isi_file)) {
                $this->session->set_flashdata('err', 'Restore');
                redirect('database');
            } else {

                $query = rtrim($isi_file, "\n;");
                $array_query = explode(";", $query);

                foreach ($array_query as $query) {
                    $this->db->query($query);
                }

                $this->session->set_flashdata('msg', 'Restore');
                redirect('database');
            }
        }

        return redirect('database');
    }
}
