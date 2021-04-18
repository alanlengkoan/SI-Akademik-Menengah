<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT jadwal.id_jadwal, guru.nama AS guru, kelas.nama AS kelas, mapel.nama AS mapel, jadwal.hari, jadwal.jam FROM jadwal LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = jadwal.id_penugasan_guru LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas")->result();
        return $result;
    }
}
