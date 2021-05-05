<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_soal extends CI_Model
{
    public function getAll($id)
    {
        $result = $this->db->query("SELECT soal.id_soal, soal.tgl_ujian, soal.time, soal.nilai, soal.status_soal, mapel.nama AS mapel, kelas.nama AS kelas, ujian_jenis.jenis AS jenis_ujian FROM soal LEFT JOIN ujian_jenis ON soal.id_ujian_jenis = ujian_jenis.id_ujian_jenis LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = soal.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas WHERE penugasan_guru.id_guru = '$id'")->result();
        return $result;
    }

    public function getAllSoal()
    {
        $result = $this->db->query("SELECT soal.id_soal, soal.tgl_ujian, soal.time, soal.nilai, soal.status_soal, mapel.nama AS mapel, kelas.nama AS kelas, ujian_jenis.jenis AS jenis_ujian FROM soal LEFT JOIN ujian_jenis ON soal.id_ujian_jenis = ujian_jenis.id_ujian_jenis LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = soal.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas")->result();
        return $result;
    }

    public function getDetailSoal($id)
    {
        $result = $this->db->query("SELECT soal.id_soal, soal.id_penugasan_guru, soal.tgl_ujian, soal.time, soal.nilai, mapel.nama AS mapel, kelas.nama AS kelas, ujian_jenis.jenis AS jenis_ujian FROM soal LEFT JOIN ujian_jenis ON soal.id_ujian_jenis = ujian_jenis.id_ujian_jenis LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = soal.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas WHERE soal.id_soal = '$id'")->row();
        return $result;
    }

    public function getDetailSoalGuru($id_guru, $id_kelas, $id_mapel)
    {
        $result = $this->db->query("SELECT soal.id_soal, soal.id_penugasan_guru, soal.tgl_ujian, soal.time, soal.nilai, mapel.nama AS mapel, kelas.nama AS kelas, ujian_jenis.jenis AS jenis_ujian FROM soal LEFT JOIN ujian_jenis ON soal.id_ujian_jenis = ujian_jenis.id_ujian_jenis LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = soal.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas WHERE penugasan_guru.id_guru = '$id_guru' AND penugasan_guru.id_kelas = '$id_kelas' AND penugasan_guru.id_mapel = '$id_mapel'")->result();
        return $result;
    }
}
