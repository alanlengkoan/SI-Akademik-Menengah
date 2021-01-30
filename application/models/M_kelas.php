<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_kelas extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT kelas.id, kelas.nama AS kelas, guru.nama AS guru FROM kelas LEFT JOIN guru ON kelas.walikelas = guru.id")->result();
        return $result;
    }

    public function getWhere($id)
    {
        $result = $this->db->query("SELECT * FROM kelas WHERE id = '$id'")->row();
        return $result;
    }
}
