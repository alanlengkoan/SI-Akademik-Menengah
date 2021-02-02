<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_tugas extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT tugas.id_tugas, tugas.id_guru, tugas.judul, tugas.tipe, mapel.nama FROM tugas LEFT JOIN mapel ON tugas.id_mapel = mapel.id_mapel")->result();
        return $result;
    }

    public function getTugasKelas($kelas)
    {
        $result = $this->db->query("SELECT penugasan_guru.id_guru, tugas.id_tugas, tugas.id_mapel, guru.nama AS guru, mapel.nama AS mapel, tugas.judul, tugas.tipe FROM penugasan_guru LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru RIGHT JOIN tugas ON penugasan_guru.id_guru = tugas.id_guru LEFT JOIN mapel ON tugas.id_mapel = mapel.id_mapel WHERE penugasan_guru.id_kelas = '$kelas' GROUP BY penugasan_guru.id_guru, tugas.id_tugas, tugas.id_mapel, tugas.judul, tugas.tipe, mapel.nama")->result();
        return $result;
    }

    public function getDetailTugasKelas($id)
    {
        $result = $this->db->query("SELECT tugas.id_tugas, tugas.id_guru, tugas.judul, tugas.tipe, tugas.file, mapel.nama FROM tugas LEFT JOIN mapel ON tugas.id_mapel = mapel.id_mapel WHERE tugas.id_tugas = '$id'")->row();
        return $result;
    }
}
