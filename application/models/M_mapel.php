<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_mapel extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM mapel ORDER BY nama")->result();
        return $result;
    }

    public function getWhereMapelGuru($id)
    {
        $result = $this->db->query("SELECT penugasan_guru.id_penugasan_guru, penugasan_guru.id_mapel, mapel.nama AS mapel, kelas.nama AS kelas FROM penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas WHERE penugasan_guru.id_guru = '$id'")->result();
        return $result;
    }
}
