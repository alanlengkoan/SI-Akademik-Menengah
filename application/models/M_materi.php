<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_materi extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT materi.id_materi, materi.id_guru, materi.judul, materi.tipe, mapel.nama FROM materi LEFT JOIN mapel ON materi.id_mapel = mapel.id_mapel")->result();
        return $result;
    }

    public function getMateriKelas($kelas)
    {
        $result = $this->db->query("SELECT penugasan_guru.id_guru, materi.id_materi, materi.id_mapel, guru.nama AS guru, mapel.nama AS mapel, materi.judul, materi.tipe FROM penugasan_guru LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru RIGHT JOIN materi ON penugasan_guru.id_guru = materi.id_guru LEFT JOIN mapel ON materi.id_mapel = mapel.id_mapel WHERE penugasan_guru.id_kelas = '$kelas' GROUP BY penugasan_guru.id_guru, materi.id_materi, materi.id_mapel, materi.judul, materi.tipe, mapel.nama")->result();
        return $result;
    }

    public function getDetailMateriKelas($id)
    {
        $result = $this->db->query("SELECT materi.id_materi, materi.id_guru, materi.judul, materi.tipe, materi.file, mapel.nama FROM materi LEFT JOIN mapel ON materi.id_mapel = mapel.id_mapel WHERE materi.id_materi = '$id'")->row();
        return $result;
    }
}
