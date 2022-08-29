<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi_model extends CI_Model
{
    public function getDisposisi($sm_id)
    {
        return $this->db->select('disposisi.*, jabatan.jabatan, sifat.sifat')
            ->from('jabatan')
            ->join('disposisi', 'disposisi.jabatan_id = jabatan.id')
            ->join('sifat', 'disposisi.sifat_id = sifat.id')
            ->where('sm_id', $sm_id)
            ->order_by('disposisi.id')
            ->get()->result_array();
    }

    public function checkDispos($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('disposisi');
    }

    public function getRowDispos($id)
    {
        return $this->db->select('disposisi.*, jabatan.jabatan, sifat.sifat, surat_masuk.pengirim')
            ->from('jabatan')
            ->join('disposisi', 'disposisi.jabatan_id = jabatan.id')
            ->join('sifat', 'disposisi.sifat_id = sifat.id')
            ->join('surat_masuk', 'disposisi.sm_id = surat_masuk.id')
            ->where('disposisi.id', $id)
            ->get()->row_array();
    }

    public function checkSm($sm_id)
    {
        $this->db->where('id', $sm_id);
        return $query = $this->db->get('surat_masuk');
    }


    public function insert()
    {
        $data = [
            'sm_id' => $this->input->post('sm_id'),
            'jabatan_id' => $this->input->post('jabatan_id'),
            'isi' => $this->input->post('isi', true),
            'batas_waktu' => $this->input->post('batas_waktu'),
            'sifat_id' => $this->input->post('sifat_id'),
            'catatan' => $this->input->post('catatan')
        ];

        $this->db->insert('disposisi', $data);
        $this->session->set_flashdata('msg', 'ditambahkan.');
        redirect('disposisi/' . $this->input->post('sm_id'));
    }

    public function update()
    {
        $id = $this->input->post('id');
        $sm_id = $this->input->post('sm_id');
        $jabatan_id = $this->input->post('jabatan_id');
        $isi = $this->input->post('isi', true);
        $batas_waktu = $this->input->post('batas_waktu');
        $sifat_id = $this->input->post('sifat_id');
        $catatan = $this->input->post('catatan', true);

        $this->db->set('sm_id', $sm_id);
        $this->db->set('jabatan_id', $jabatan_id);
        $this->db->set('isi', $isi);
        $this->db->set('batas_waktu', $batas_waktu);
        $this->db->set('sifat_id', $sifat_id);
        $this->db->set('catatan', $catatan);
        $this->db->where('id', $id);
        $this->db->update('disposisi');

        $this->session->set_flashdata('msg', 'diubah.');
        redirect('disposisi/' . $sm_id);
    }
}
