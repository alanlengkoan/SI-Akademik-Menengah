<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_penugasan_guru extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT penugasan_guru.id, kelas.nama AS kelas, guru.nama AS guru, mapel.pelajaran FROM penugasan_guru LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id LEFT JOIN guru ON penugasan_guru.id_guru = guru.id LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id")->result();
        return $result;
    }

    public function getWhere($id)
    {
        $result = $this->db->query("SELECT penugasan_guru.id, kelas.nama AS kelas, guru.nama AS guru, mapel.pelajaran FROM penugasan_guru LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id LEFT JOIN guru ON penugasan_guru.id_guru = guru.id LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id WHERE penugasan_guru.id = '$id'")->row();
        return $result;
    }
}
