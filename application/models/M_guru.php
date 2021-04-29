<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM guru ORDER BY nama")->result();
        return $result;
    }
   
    public function getDetailGuruWali($id)
    {
        $result = $this->db->query("SELECT id_kelas FROM wali_kelas WHERE id_guru = '$id'")->row();
        return $result;
    }

    public function getDetailGuruPengajar($id)
    {
        $result = $this->db->query("SELECT id_kelas FROM penugasan_guru WHERE id_guru = '$id'")->result();
        return $result;
    }

    public function getUse()
    {
        $result = $this->db->query("SELECT guru.id_guru, guru.nama FROM guru LEFT JOIN wali_kelas ON guru.id_guru = wali_kelas.id_guru WHERE wali_kelas.id_guru IS NULL")->result();
        return $result;
    }

    public function getUseUsers()
    {
        $result = $this->db->query("SELECT guru.id_guru, guru.nama FROM guru LEFT JOIN users ON guru.id_guru = users.id_users WHERE users.id_users IS NULL")->result();
        return $result;
    }

    public function getLaporanGuruELearning()
    {
        $result = $this->db->query("SELECT guru.nip, guru.nama, kelas.nama AS kelas, mapel.nama AS mapel, TIMEDIFF(jadwal.jam_selesai, jadwal.jam_mulai) AS jumlah_jam FROM guru LEFT JOIN penugasan_guru ON guru.id_guru = penugasan_guru.id_guru LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN jadwal ON penugasan_guru.id_penugasan_guru = jadwal.id_penugasan_guru WHERE kelas.nama IS NOT NULL AND mapel.nama IS NOT NULL ORDER BY guru.nama")->result();
        return $result;
    }
}
