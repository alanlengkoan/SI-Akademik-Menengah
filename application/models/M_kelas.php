<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_kelas extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM kelas ORDER BY nama")->result();
        return $result;
    }

    public function getUse()
    {
        $result = $this->db->query("SELECT kelas.id_kelas, kelas.nama FROM kelas LEFT JOIN wali_kelas ON kelas.id_kelas = wali_kelas.id_kelas WHERE wali_kelas.id_kelas IS NULL")->result();
        return $result;
    }

    public function getKelasJumlahSiswa()
    {
        $result = $this->db->query("SELECT kelas.*, ( SELECT COUNT(*) FROM siswa WHERE siswa.id_kelas = kelas.id_kelas ) AS jumlah_siswa FROM kelas ORDER BY nama")->result();
        return $result;
    }
}
