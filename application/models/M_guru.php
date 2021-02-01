<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM guru ORDER BY nama")->result();
        return $result;
    }
   
    public function getDetailGuruWali($id)
    {
        $result = $this->db->query("SELECT id_kelas FROM wali_kelas WHERE id_guru = '$id'")->row();
        return $result;
    }

    public function getDetailGuruPengajar($id)
    {
        $result = $this->db->query("SELECT id_kelas FROM penugasan_guru WHERE id_guru = '$id'")->result();
        return $result;
    }

    public function getUse()
    {
        $result = $this->db->query("SELECT guru.id_guru, guru.nama FROM guru LEFT JOIN wali_kelas ON guru.id_guru = wali_kelas.id_guru WHERE wali_kelas.id_guru IS NULL")->result();
        return $result;
    }

    public function getUseUsers()
    {
        $result = $this->db->query("SELECT guru.id_guru, guru.nama FROM guru LEFT JOIN users ON guru.id_guru = users.id_users WHERE users.id_users IS NULL")->result();
        return $result;
    }
}
