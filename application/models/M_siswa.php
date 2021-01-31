<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT siswa.id_siswa, siswa.nis, siswa.nama AS siswa, siswa.tempat_lahir, siswa.tgl_lahir, siswa.ortu_wali, siswa.alamat, siswa.jenis_kelamin, siswa.thn_masuk, kelas.nama AS kelas FROM siswa LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas")->result();
        return $result;
    }

    public function getWhere($id)
    {
        $result = $this->db->query("SELECT * FROM siswa WHERE id = '$id'")->row();
        return $result;
    }
}
