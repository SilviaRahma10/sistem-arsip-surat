<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_model extends CI_Model
{
    public function getPengguna()
    {
        return $this->db->select('user.*, user_role.role')
            ->from('user_role')
            ->join('user', 'user.role_id = user_role.id')
            // menyembunyikan akun developer dari table
            ->where('user.role_id !=1')
            ->get()->result_array();
    }

    public function getRole()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function insertRole()
    {
        $data = [
            'role' => $this->input->post('role', true)
        ];

        $this->db->insert('user_role', $data);
        $this->session->set_flashdata('msg', 'ditambahkan.');
        redirect('pengaturan/role');
    }

    public function updateRole()
    {
        $id = $this->input->post('id');
        $role = $this->input->post('role', true);

        $this->db->set('role', $role);
        $this->db->where('id', $id);
        $this->db->update('user_role');

        $this->session->set_flashdata('msg', 'diubah.');
        redirect('pengaturan/role');
    }

    public function getJabatan()
    {
        return $this->db->get('jabatan')->result_array();
    }

    public function insertJabatan()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'jabatan' => $this->input->post('jabatan', true)
        ];

        $this->db->insert('jabatan', $data);
        $this->session->set_flashdata('msg', 'ditambahkan.');
        redirect('pengaturan/jabatan');
    }

    public function updateJabatan()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama', true);
        $jabatan = $this->input->post('jabatan', true);

        $this->db->set('nama', $nama);
        $this->db->set('jabatan', $jabatan);
        $this->db->where('id', $id);
        $this->db->update('jabatan');

        $this->session->set_flashdata('msg', 'diubah.');
        redirect('pengaturan/jabatan');
    }

    public function getSifat()
    {
        return $this->db->get('sifat')->result_array();
    }

    public function insertSifat()
    {
        $data = [
            'sifat' => $this->input->post('sifat', true)
        ];

        $this->db->insert('sifat', $data);
        $this->session->set_flashdata('msg', 'ditambahkan.');
        redirect('pengaturan/sifat');
    }

    public function updateSifat()
    {
        $id = $this->input->post('id');
        $sifat = $this->input->post('sifat', true);

        $this->db->set('sifat', $sifat);
        $this->db->where('id', $id);
        $this->db->update('sifat');

        $this->session->set_flashdata('msg', 'diubah.');
        redirect('pengaturan/sifat');
    }

    public function getDbTables() // fiturnya tidak jadi diterapkan
    {
        return $this->db->query("SHOW TABLES FROM `" . $this->db->database . "` ")->result_array();
    }
}
