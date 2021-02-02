<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_penugasan_guru extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT penugasan_guru.id_penugasan_guru, kelas.nama AS kelas, guru.nama AS guru, mapel.nama AS mapel FROM penugasan_guru LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel")->result();
        return $result;
    }

    public function getWhere($id)
    {
        $result = $this->db->query("SELECT penugasan_guru.id_penugasan_guru, kelas.nama AS kelas, guru.nama AS guru, mapel.pelajaran FROM penugasan_guru LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel WHERE penugasan_guru.id = '$id'")->row();
        return $result;
    }

    public function getGuruKelas($kelas)
    {
        $result = $this->db->query("SELECT penugasan_guru.id_guru, guru.nama AS guru, guru.jen_kel, mapel.nama AS mapel FROM penugasan_guru LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel WHERE penugasan_guru.id_kelas = '$kelas' ORDER BY guru.nama")->result();
        return $result;
    }

    public function getGuruMapel($kelas)
    {
        $result = $this->db->query("SELECT penugasan_guru.id_guru, mapel.nama FROM penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel WHERE penugasan_guru.id_kelas = '$kelas' ORDER BY nama")->result();
        return $result;
    }
}
