<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT jadwal.id_jadwal, guru.nama AS guru, kelas.nama AS kelas, mapel.nama AS mapel, jadwal.hari, jadwal.jam FROM jadwal LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = jadwal.id_penugasan_guru LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas")->result();
        return $result;
    }

    public function getJadwalGuru($id)
    {
        $result = $this->db->query("SELECT jadwal.id_jadwal, jadwal.hari, jadwal.jam, mapel.nama AS mapel, kelas.nama AS kelas FROM jadwal LEFT JOIN penugasan_guru ON jadwal.id_penugasan_guru = penugasan_guru.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas WHERE penugasan_guru.id_guru = '$id'")->result();
        return $result;
    }

    public function getJadwalSiswa($id)
    {
        $result = $this->db->query("SELECT jadwal.id_jadwal, jadwal.hari, jadwal.jam, mapel.nama AS mapel, kelas.nama AS kelas FROM jadwal LEFT JOIN penugasan_guru ON jadwal.id_penugasan_guru = penugasan_guru.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas WHERE penugasan_guru.id_kelas = '$id'")->result();
        return $result;
    }
}
