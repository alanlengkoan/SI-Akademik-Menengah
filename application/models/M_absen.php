<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_absen extends CI_Model
{
    public function getDetailAbsen($id)
    {
        $result = $this->db->query("SELECT siswa.nama, absen.waktu FROM absen LEFT JOIN siswa ON absen.id_siswa = siswa.id_siswa WHERE id_materi = '$id'")->result();
        return $result;
    }

    public function checkAbsenSiswa($id_materi, $id_siswa)
    {
        $result = $this->db->query("SELECT COUNT(*) AS status FROM absen WHERE id_materi = '$id_materi' AND id_siswa = '$id_siswa'")->row('status');
        return $result;
    }
}