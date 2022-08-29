<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk_model extends CI_Model
{
    var $column_order = ['no_agenda', 'pengirim', null, 'tgl_surat', null]; // Field yang bisa orderable
    var $column_search = ['no_agenda', 'pengirim', 'no_surat', 'isi', 'keterangan']; // field yang diizin utk pencarian 
    var $order = ['no_agenda' => 'asc']; // default order 

    private function _get_datatables_query()
    {
        $this->db->from('surat_keluar'); // surat_keluar adalah table

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('surat_keluar');
        return $this->db->count_all_results();
    }

    public function getSuratKeluar($id = false)
    {
        if ($id == false) {
            $this->db->order_by('no_agenda', 'ASC');
            return $this->db->get('surat_keluar')->result_array();
        } else {
            $this->db->where('id', $id);
            return $this->db->get('surat_keluar')->row_array();
        }
    }

    public function fetch_data()
    {
        $startdate = $this->input->post('startdate');
        $enddate = $this->input->post('enddate');
        $filterby = $this->input->post('filterby');

        return $this->db->query("SELECT * FROM `surat_keluar` WHERE " . $filterby . " BETWEEN '" . $startdate . "' AND '" . $enddate . "' ORDER BY no_agenda")->result();
    }

    public function getSkByDate($daterange)
    {
        $filterby = $this->input->post('filterby');
        if ($filterby == 'created_at') {
            $this->db->where('created_at >=', $daterange[0]);
            $this->db->where('created_at <=', $daterange[1]);
        } else if ($filterby == 'tgl_surat') {
            $this->db->where('tgl_surat >=', $daterange[0]);
            $this->db->where('tgl_surat <=', $daterange[1]);
        } else if ($filterby == 'tgl_diterima') {
            $this->db->where('tgl_diterima >=', $daterange[0]);
            $this->db->where('tgl_diterima <=', $daterange[1]);
        }

        $this->db->order_by('no_agenda', 'ASC');
        return $this->db->get('surat_keluar')->result_array();
    }

    public function getSkByFile()
    {
        $this->db->select('*');
        $where = "file is  NOT NULL";
        $this->db->where($where);
        return $this->db->get('surat_keluar')->result_array();
    }

    public function insert()
    {
        // cek jika ada gambar yang akan diupload
        $upload_file = $_FILES['file']['name'];

        // jika ada file yang diupload
        if ($upload_file) {
            // konfigurasi
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'pdf|jpg|png';
            $config['max_size']             = 2000;

            // load library upload
            $this->load->library('upload', $config);

            // jika yang diupload sesuai dengan config
            if ($this->upload->do_upload('file')) {
                // ambil file_name nya
                $file = $this->upload->data('file_name');
                $file = str_replace('', '_', $file);
            } else {
                // jika tidak sesuai (error)
                $this->session->set_flashdata('err', '<div class="text-danger">' . $this->upload->display_errors() . '</div>');
                redirect('surat-keluar/tambah');
            }
        } else {
            $file = null;
        }

        $data = [
            'no_agenda' => $this->input->post('no_agenda', true),
            'pengirim' => $this->input->post('pengirim', true),
            'no_surat' => $this->input->post('no_surat', true),
            'isi' => $this->input->post('isi', true),
            'tgl_surat' => $this->input->post('tgl_surat', true),
            'tgl_diterima' => $this->input->post('tgl_diterima', true),
            'keterangan' => $this->input->post('keterangan', true),
            'file' => $file,
            'user_id' => $this->input->post('user_id'),
            'created_at' => date('Y-m-d')
        ];

        $this->db->insert('surat_keluar', $data);
        $this->session->set_flashdata('msg', 'ditambahkan.');
        redirect('surat-keluar');
    }

    public function insert1()
    {
        $data = [
            'no_agenda' => $this->input->post('no_agenda', true),
            'pengirim' => $this->input->post('pengirim', true),
            'no_surat' => $this->input->post('no_surat', true),
            'tgl_surat' => $this->input->post('tgl_surat', true),
            'tgl_diterima' => $this->input->post('tgl_diterima', true),
            'keterangan' => $this->input->post('keterangan', true),
            'user_id' => $this->input->post('user_id'),
            'created_at' => date('Y-m-d'),
            'isi_surat' => $this->input->post('isi_surat')
        ];

        $this->db->insert('surat_keluar', $data);
        $this->session->set_flashdata('msg', 'ditambahkan.');
        redirect('buat_surat');
    }

    public function ubah()
    {

        $id = $this->input->post('id');
        $no_agenda = $this->input->post('no_agenda', true);
        $pengirim = $this->input->post('pengirim', true);
        $no_surat = $this->input->post('no_surat', true);
        $isi = $this->input->post('isi', true);
        $tgl_surat = $this->input->post('tgl_surat', true);
        $tgl_diterima = $this->input->post('tgl_diterima', true);
        $keterangan = $this->input->post('keterangan', true);
        $user_id = $this->input->post('user_id');

        $data['surat'] = $this->db->get_where('surat_keluar', ['id' => $id])->row_array();

        // cek jika ada gambar yang akan diupload
        $upload_file = $_FILES['file']['name'];

        // jika ada file yang diupload
        if ($upload_file) {
            // konfigurasi
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'pdf|doc|docx|jpg|png';
            $config['max_size']             = 2000;

            // load library upload
            $this->load->library('upload', $config);

            // jika yang diupload sesuai dengan config
            if ($this->upload->do_upload('file')) {
                // ambil file_name nya
                $file = $this->upload->data('file_name');
                $file = str_replace('', '_', $file);

                $this->db->set('file', $file);

                unlink(FCPATH . './uploads/' . $data['surat']['file']);
            } else {
                // jika tidak sesuai (error)
                $this->session->set_flashdata('err', '<div class="text-danger">' . $this->upload->display_errors() . '</div>');
                redirect('surat-keluar/ubah/' . $id);
            }
        }
        $this->db->set('no_agenda', $no_agenda);
        $this->db->set('pengirim', $pengirim);
        $this->db->set('no_surat', $no_surat);
        $this->db->set('isi', $isi);
        $this->db->set('tgl_surat', $tgl_surat);
        $this->db->set('tgl_diterima', $tgl_diterima);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('user_id', $user_id);

        $this->db->where('id', $id);
        $this->db->update('surat_keluar');

        $this->session->set_flashdata('msg', 'diubah.');
        redirect('surat-keluar');
    }
}
