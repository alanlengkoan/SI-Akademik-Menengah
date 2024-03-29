<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT siswa.id_siswa, siswa.nis, siswa.nama AS siswa, siswa.tmp_lahir, siswa.tgl_lahir, siswa.ortu_wali, siswa.alamat, siswa.jen_kel, siswa.thn_masuk, kelas.nama AS kelas FROM siswa LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas")->result();
        return $result;
    }

    public function getDetailSiswa($id)
    {
        $result = $this->db->query("SELECT siswa.id_siswa, siswa.nis, siswa.nama AS siswa, siswa.tmp_lahir, siswa.tgl_lahir, siswa.ortu_wali, siswa.alamat, siswa.jen_kel, siswa.thn_masuk, siswa.id_kelas, kelas.nama AS kelas FROM siswa LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_siswa = '$id'")->row();
        return $result;
    }

    public function getWhereWali($kelas)
    {
        $result = $this->db->query("SELECT siswa.id_siswa, siswa.nis, siswa.nama AS siswa, siswa.tmp_lahir, siswa.tgl_lahir, siswa.ortu_wali, siswa.alamat, siswa.jen_kel, siswa.thn_masuk, kelas.nama AS kelas FROM siswa LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas = '$kelas'")->result();
        return $result;
    }


    public function getWhereStudent($kelas)
    {
        $result = $this->db->query("SELECT siswa.id_siswa, siswa.nis, siswa.nama AS siswa, siswa.tmp_lahir, siswa.tgl_lahir, siswa.ortu_wali, siswa.alamat, siswa.jen_kel, siswa.thn_masuk, kelas.nama AS kelas FROM siswa LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas = '$kelas'")->result();
        return $result;
    }

    public function getWherePenugasan($kelas)
    {
        $result = $this->db->query("SELECT siswa.id_siswa, siswa.nis, siswa.nama AS siswa, siswa.tmp_lahir, siswa.tgl_lahir, siswa.ortu_wali, siswa.alamat, siswa.jen_kel, siswa.thn_masuk, kelas.nama AS kelas FROM siswa LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas IN ('$kelas');")->result();
        return $result;
    }

    public function getUseUsers()
    {
        $result = $this->db->query("SELECT siswa.id_siswa, siswa.nama FROM siswa LEFT JOIN users ON siswa.id_siswa = users.id_users WHERE users.id_users IS NULL")->result();
        return $result;
    }

    public function getLaporanSiswaELearning()
    {
        $result = $this->db->query("SELECT siswa.nis, siswa.nama, kelas.nama AS kelas, mapel.nama AS mapel, (SELECT COUNT(*) FROM jadwal LEFT JOIN penugasan_guru ON jadwal.id_penugasan_guru = penugasan_guru.id_penugasan_guru WHERE penugasan_guru.id_kelas = kelas.id_kelas AND penugasan_guru.id_mapel = mapel.id_mapel ) AS berapa_kali FROM siswa LEFT JOIN penugasan_guru ON siswa.id_kelas = penugasan_guru.id_kelas LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel ORDER BY siswa.nama")->result();
        return $result;
    }
}
