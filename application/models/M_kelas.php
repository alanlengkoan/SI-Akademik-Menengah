<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_kelas extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT kelas.id_kelas, kelas.nama AS kelas, guru.nama AS guru FROM kelas LEFT JOIN guru ON kelas.id_guru = guru.id_guru")->result();
        return $result;
    }

    public function getWhere($id)
    {
        $result = $this->db->query("SELECT * FROM kelas WHERE id = '$id'")->row();
        return $result;
    }
}
