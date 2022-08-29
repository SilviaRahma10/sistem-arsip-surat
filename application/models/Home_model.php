<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    public function countSm()
    {
        return count($this->db->get('surat_masuk')->result());
    }
    public function countSk()
    {
        return count($this->db->get('surat_keluar')->result());
    }
    public function countJabatan()
    {
        return count($this->db->get('jabatan')->result());
    }
    public function countFile()
    {
        $fileSm = $this->db->query('SELECT file FROM surat_masuk WHERE file IS NOT null')->result_array();
        $fileSk = $this->db->query('SELECT file FROM `surat_keluar` WHERE file IS NOT NULL')->result_array();

        $fileSm = count($fileSm);
        $fileSk = count($fileSk);

        return $fileSm + $fileSk;
    }

    public function getSmBulan()
    {
        // ambil data yang bulan created_at(ditambahkan) sama dengan bulan saat ini
        $sm =  $this->db->get_where('surat_masuk', 'MONTH(created_at) = MONTH(CURRENT_DATE)')->result();
        return count($sm); // kembalikan jumlah data
    }
    public function getSkBulan()
    {
        $sm =  $this->db->get_where('surat_keluar', 'MONTH(created_at) = MONTH(CURRENT_DATE)')->result();
        return count($sm); // kembalikan jumlah data
    }

    public function getSmTahun()
    {
        // ambil data perbulan januari saja, dari januari 2019 ke januari 2020
        $query = $this->db->query("SELECT created_at FROM surat_masuk WHERE DATE(created_at) BETWEEN CONCAT(YEAR(CURDATE())-1, " . '\'-\'' . ", MONTH(CURDATE())-1, " . '\'-\'' . ", DAY(CURDATE())) AND CONCAT(YEAR(CURDATE()), " . '\'-\'' . ", MONTH(CURDATE()), " . '\'-\'' . ", DAY(CURDATE()))")->result_array();

        return $query;
    }
    public function getSkTahun()
    {
        // ambil data perbulan januari saja, dari januari 2019 ke januari 2020
        $query = $this->db->query("SELECT created_at FROM surat_keluar WHERE DATE(created_at) BETWEEN CONCAT(YEAR(CURDATE())-1, " . '\'-\'' . ", MONTH(CURDATE())-1, " . '\'-\'' . ", DAY(CURDATE())) AND CONCAT(YEAR(CURDATE()), " . '\'-\'' . ", MONTH(CURDATE()), " . '\'-\'' . ", DAY(CURDATE()))")->result_array();

        return $query;
    }
    public function countMk()
    {
        return count($this->db->get('memo_keluar')->result());
    }
    public function countMm()
    {
        return count($this->db->get('memo_masuk')->result());
    }

    public function getMmBulan()
    {
        // ambil data yang bulan created_at(ditambahkan) sama dengan bulan saat ini
        $mm =  $this->db->get_where('memo_masuk', 'MONTH(created_at) = MONTH(CURRENT_DATE)')->result();
        return count($mm); // kembalikan jumlah data
    }
    public function getMkBulan()
    {
        $mk =  $this->db->get_where('memo_keluar', 'MONTH(created_at) = MONTH(CURRENT_DATE)')->result();
        return count($mk); // kembalikan jumlah data
    }

    public function getMmTahun()
    {
        // ambil data perbulan januari saja, dari januari 2019 ke januari 2020
        $query = $this->db->query("SELECT created_at FROM memo_masuk WHERE DATE(created_at) BETWEEN CONCAT(YEAR(CURDATE())-1, " . '\'-\'' . ", MONTH(CURDATE())-1, " . '\'-\'' . ", DAY(CURDATE())) AND CONCAT(YEAR(CURDATE()), " . '\'-\'' . ", MONTH(CURDATE()), " . '\'-\'' . ", DAY(CURDATE()))")->result_array();

        return $query;
    }  
    public function getMkTahun()
    {
        // ambil data perbulan januari saja, dari januari 2019 ke januari 2020
        $query = $this->db->query("SELECT created_at FROM memo_keluar WHERE DATE(created_at) BETWEEN CONCAT(YEAR(CURDATE())-1, " . '\'-\'' . ", MONTH(CURDATE())-1, " . '\'-\'' . ", DAY(CURDATE())) AND CONCAT(YEAR(CURDATE()), " . '\'-\'' . ", MONTH(CURDATE()), " . '\'-\'' . ", DAY(CURDATE()))")->result_array();

        return $query;
    }
}
