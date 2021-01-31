<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_wakel extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT wali_kelas.id_wali_kelas, guru.nama AS guru, kelas.nama AS kelas FROM wali_kelas LEFT JOIN guru ON wali_kelas.id_guru = guru.id_guru LEFT JOIN kelas ON wali_kelas.id_kelas = kelas.id_kelas")->result();
        return $result;
    }
}
