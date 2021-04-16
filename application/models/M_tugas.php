<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_tugas extends CI_Model
{
    public function getAll($id)
    {
        $result = $this->db->query("SELECT tugas.id_tugas, tugas.judul, tugas.tipe, DATEDIFF( tugas.finish, tugas.`start` ) AS waktu, mapel.nama AS mapel, kelas.nama AS kelas FROM tugas LEFT JOIN penugasan_guru ON penugasan_guru.id_penugasan_guru = tugas.id_penugasan_guru LEFT JOIN mapel ON penugasan_guru.id_mapel = mapel.id_mapel LEFT JOIN kelas ON penugasan_guru.id_kelas = kelas.id_kelas WHERE penugasan_guru.id_guru = '$id'")->result();
        return $result;
    }

    public function getTugasKelas($id_kelas, $id_siswa)
    {
        $result = $this->db->query("SELECT penugasan_guru.id_guru, tugas.id_tugas, tugas.id_mapel, guru.nama AS guru, mapel.nama AS mapel, tugas.judul, tugas.tipe, DATEDIFF(tugas.finish, tugas.`start`) AS waktu, DATEDIFF(tugas.finish, CURRENT_DATE()) AS sisah, CASE WHEN ( SELECT id_tugas FROM hasil_tugas WHERE id_tugas = tugas.id_tugas AND id_siswa = '$id_siswa' ) IS NOT NULL THEN 1 ELSE 0 END AS status FROM penugasan_guru LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru RIGHT JOIN tugas ON penugasan_guru.id_guru = tugas.id_guru LEFT JOIN mapel ON tugas.id_mapel = mapel.id_mapel WHERE penugasan_guru.id_kelas = '$id_kelas' GROUP BY penugasan_guru.id_guru, tugas.id_tugas, tugas.id_mapel, tugas.judul, tugas.tipe, mapel.nama")->result();
        return $result;
    }

    public function getDetailTugasKelas($id_tugas, $id_siswa)
    {
        $result = $this->db->query("SELECT tugas.id_tugas, tugas.id_guru, tugas.judul, tugas.tipe, tugas.file, mapel.nama, CASE WHEN ( SELECT id_tugas FROM hasil_tugas WHERE id_tugas = tugas.id_tugas AND id_siswa = '$id_siswa' ) IS NOT NULL THEN 1 ELSE 0 END AS status FROM tugas LEFT JOIN mapel ON tugas.id_mapel = mapel.id_mapel WHERE tugas.id_tugas = '$id_tugas'")->row();
        return $result;
    }

    // untuk hasil tugas

    public function getAllHasilTugas($id)
    {
        $result = $this->db->query("SELECT hasil_tugas.id_hasil_tugas, hasil_tugas.id_tugas, siswa.id_siswa, mapel.nama AS mapel, siswa.nama AS siswa, tugas.judul, tugas.tipe, kelas.nama AS kelas FROM hasil_tugas LEFT JOIN tugas ON hasil_tugas.id_tugas = tugas.id_tugas LEFT JOIN siswa ON hasil_tugas.id_siswa = siswa.id_siswa LEFT JOIN mapel ON tugas.id_mapel = mapel.id_mapel LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE tugas.id_guru = '$id'")->result();
        return $result;
    }

    public function getHasilTugas($id)
    {
        $result = $this->db->query("SELECT * FROM hasil_tugas WHERE id_tugas = '$id'")->row();
        return $result;
    }

    public function getHasilDetailTugas($id_tugas, $id_siswa)
    {
        $result = $this->db->query("SELECT * FROM hasil_tugas WHERE id_tugas = '$id_tugas' AND id_siswa = '$id_siswa'")->row();
        return $result;
    }
}
