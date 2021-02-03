<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_ujian extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT ujian.id_ujian, ujian.id_guru, ujian.jenis, mapel.nama FROM ujian LEFT JOIN mapel ON ujian.id_mapel = mapel.id_mapel")->result();
        return $result;
    }

    public function getUjianKelas($kelas)
    {
        $result = $this->db->query("SELECT penugasan_guru.id_guru, ujian.id_mapel, guru.nama AS guru, mapel.nama AS mapel FROM penugasan_guru LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru RIGHT JOIN ujian ON penugasan_guru.id_guru = ujian.id_guru LEFT JOIN mapel ON ujian.id_mapel = mapel.id_mapel WHERE penugasan_guru.id_kelas = '$kelas' GROUP BY penugasan_guru.id_guru, ujian.id_mapel, mapel.nama")->result();
        return $result;
    }

    public function getDetailUjianKelasEssay($id_guru, $id_mapel, $id_kelas)
    {
        $result = $this->db->query("SELECT ujian.id_ujian, ujian.id_guru, ujian.id_mapel, ujian.jenis, ujian_essay.id_ujian_essay, ujian_essay.soal, ujian_essay.gambar FROM ujian LEFT JOIN ujian_essay ON ujian.id_ujian = ujian_essay.id_ujian WHERE ujian.id_guru = '$id_guru' AND ujian.id_mapel = '$id_mapel' AND ujian.jenis = 'essay'")->result();
        return $result;
    }

    public function getDetailUjianKelasPilihanGanda($id_guru, $id_mapel, $id_kelas)
    {
        $result = $this->db->query("SELECT ujian.id_ujian, ujian.id_guru, ujian.id_mapel, ujian.jenis, ujian_pilihan_ganda.id_ujian_pilihan_ganda, ujian_pilihan_ganda.soal, ujian_pilihan_ganda.gambar, ujian_pilihan_ganda.pil_a, ujian_pilihan_ganda.pil_b, ujian_pilihan_ganda.pil_c, ujian_pilihan_ganda.pil_d, ujian_pilihan_ganda.pil_e FROM ujian LEFT JOIN ujian_pilihan_ganda ON ujian.id_ujian = ujian_pilihan_ganda.id_ujian WHERE ujian.id_guru = '$id_guru' AND ujian.id_mapel = '$id_mapel' AND ujian.jenis = 'pilihan_ganda'")->result();
        return $result;
    }
}
