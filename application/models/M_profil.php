<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_profil extends CI_Model
{
    public function getWhere($id)
    {
        $result = $this->db->query("SELECT * FROM users WHERE id_users = '$id'")->row();
        return $result;
    }

    // untuk detail profil guru
    public function getWhereGuru($id)
    {
        $result = $this->db->query("SELECT users.*, guru.* FROM users LEFT JOIN guru ON users.id_users = guru.id_guru WHERE id_users = '$id'")->row();
        return $result;
    }

    // untuk detail profil siswa
    public function getWhereSiswa($id)
    {
        $result = $this->db->query("SELECT users.*, siswa.* FROM users LEFT JOIN siswa ON users.id_users = siswa.id_siswa WHERE id_users = '$id'")->row();
        return $result;
    }
}
