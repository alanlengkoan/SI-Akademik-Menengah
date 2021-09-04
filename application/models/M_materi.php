<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_materi extends CI_Model
{
    public function getWhereDetail($id_materi)
    {
        $result = $this->db->query("SELECT m.id_materi, m.id_penugasan_guru, m.judul FROM materi AS m WHERE m.id_materi = '$id_materi'")->row();
        return $result;
    }

    public function getWhereMateriDetail($id_materi)
    {
        $result = $this->db->query("SELECT md.id_materi_detail, md.id_materi, md.tipe, md.file, m.judul FROM materi_detail AS md LEFT JOIN materi AS m ON md.id_materi = m.id_materi WHERE md.id_materi = '$id_materi'")->result();
        return $result;
    }

    public function getAll($id)
    {
        $result = $this->db->query("SELECT materi.id_materi, materi.id_penugasan_guru, materi.judul, materi.tipe, materi.status, materi.status_materi, mapel.nama AS mapel, kelas.nama AS kelas FROM materi LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = materi.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas WHERE penugasan_guru.id_guru = '$id'")->result();
        return $result;
    }

    public function getWhereMateri($id_user, $id_penugasan)
    {
        $result = $this->db->query("SELECT materi.id_materi, materi.id_penugasan_guru, materi.judul, materi.tipe, materi.status, materi.status_materi, mapel.nama AS mapel, kelas.nama AS kelas FROM materi LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = materi.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas WHERE penugasan_guru.id_guru = '$id_user' AND penugasan_guru.id_penugasan_guru = '$id_penugasan'");
        return $result;
    }

    public function getAllMateriSiswa($id_guru, $id_kelas, $id_mapel)
    {
        $result = $this->db->query("SELECT materi.id_materi, materi.id_penugasan_guru, materi.judul, materi.tipe, materi.status, materi.status_materi, mapel.nama AS mapel, kelas.nama AS kelas FROM materi LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = materi.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas WHERE penugasan_guru.id_kelas = '$id_kelas' AND penugasan_guru.id_guru = '$id_guru' AND penugasan_guru.id_mapel = '$id_mapel'")->result();
        return $result;
    }

    public function getKelasSiswa($id)
    {
        $result = $this->db->query("SELECT penugasan_guru.id_guru, penugasan_guru.id_kelas, penugasan_guru.id_mapel, kelas.nama AS kelas, mapel.nama AS mapel, (SELECT COUNT(*) FROM materi LEFT JOIN penugasan_guru AS pg ON materi.id_penugasan_guru = pg.id_penugasan_guru WHERE pg.id_kelas = penugasan_guru.id_kelas AND pg.id_guru = '$id' AND pg.id_mapel = mapel.id_mapel) AS jumlah_materi FROM penugasan_guru LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN materi ON penugasan_guru.id_penugasan_guru = materi.id_penugasan_guru WHERE penugasan_guru.id_guru = '$id' GROUP BY penugasan_guru.id_guru, penugasan_guru.id_kelas, kelas.nama, mapel.nama")->result();
        return $result;
    }

    public function getMateriKelas($kelas)
    {
        $result = $this->db->query("SELECT penugasan_guru.id_penugasan_guru, penugasan_guru.id_guru, penugasan_guru.id_mapel, penugasan_guru.id_kelas, guru.nama AS guru, mapel.nama AS mapel, materi.id_materi, materi.judul, materi.tipe FROM penugasan_guru RIGHT JOIN materi ON penugasan_guru.id_penugasan_guru = materi.id_penugasan_guru LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel WHERE penugasan_guru.id_kelas = '$kelas' AND materi.status_materi = '1' GROUP BY penugasan_guru.id_guru, penugasan_guru.id_mapel, materi.id_materi, materi.judul, materi.tipe, mapel.nama")->result();
        return $result;
    }

    public function getDetailMateriKelas($id)
    {
        $result = $this->db->query("SELECT materi.id_materi, materi.judul, materi.tipe, materi.file, materi.status, mapel.nama AS mapel, kelas.nama AS kelas, tugas.id_tugas, tugas.judul AS tugas, tugas.jenis_tugas, jadwal.hari, jadwal.jam_mulai, jadwal.jam_selesai FROM materi LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = materi.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas LEFT JOIN tugas ON tugas.id_materi = materi.id_materi LEFT JOIN jadwal ON jadwal.id_penugasan_guru = materi.id_penugasan_guru WHERE materi.id_materi = '$id'")->row();
        return $result;
    }

    public function getDetailMateriGuru($id_guru, $id_kelas, $id_mapel)
    {
        $result = $this->db->query("SELECT materi.id_materi, materi.id_penugasan_guru, materi.judul, materi.tipe, materi.status, materi.status_materi, mapel.nama AS mapel, kelas.nama AS kelas, guru.nama AS guru FROM materi LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = materi.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru WHERE penugasan_guru.id_guru = '$id_guru' AND penugasan_guru.id_kelas = '$id_kelas' AND penugasan_guru.id_mapel = '$id_mapel' AND materi.status_materi = '1'")->result();
        return $result;
    }

    public function getDetailGuru($id)
    {
        $result = $this->db->query("SELECT materi.id_materi, materi.id_penugasan_guru, materi.judul, materi.tipe, materi.status, materi.status_materi, guru.nama AS guru FROM materi LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = materi.id_penugasan_guru LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru WHERE id_materi = '$id'")->row();
        return $result;
    }
}
