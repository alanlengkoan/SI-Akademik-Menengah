<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_ujian extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT soal.id_soal, ujian.id_ujian, ujian.jenis, mapel.nama, ujian_jenis.jenis AS jenis_ujian, CASE WHEN ( SELECT soal FROM ujian_essay WHERE id_ujian = ujian.id_ujian ) IS NOT NULL THEN ( SELECT soal FROM ujian_essay WHERE id_ujian = ujian.id_ujian ) ELSE ( SELECT soal FROM ujian_pilihan_ganda WHERE id_ujian = ujian.id_ujian ) END AS soal FROM ujian LEFT JOIN soal ON ujian.id_soal = soal.id_soal LEFT JOIN mapel ON soal.id_mapel = mapel.id_mapel LEFT JOIN ujian_jenis ON soal.id_ujian_jenis = ujian_jenis.id_ujian_jenis")->result();
        return $result;
    }

    public function getUjianKelas($id_kelas, $id_ujian, $id_siswa)
    {
        $result = $this->db->query("SELECT penugasan_guru.id_guru, soal.id_soal, soal.id_mapel, CASE WHEN ( SELECT SUM(id_ujian) FROM hasil_ujian WHERE id_ujian IN ('$id_ujian') AND id_siswa = '$id_siswa' ) IS NOT NULL THEN 1 ELSE 0 END AS status, guru.nama AS guru, mapel.nama AS mapel FROM penugasan_guru LEFT JOIN guru ON penugasan_guru.id_guru = guru.id_guru RIGHT JOIN soal ON penugasan_guru.id_guru = soal.id_guru LEFT JOIN mapel ON soal.id_mapel = mapel.id_mapel WHERE penugasan_guru.id_kelas = '$id_kelas' GROUP BY penugasan_guru.id_guru, soal.id_soal, soal.id_mapel, mapel.nama")->result();
        return $result;
    }

    public function getDetailUjianKelasEssay($id)
    {
        $result = $this->db->query("SELECT soal.id_soal, soal.id_guru, soal.id_mapel, ujian.id_ujian, ujian_essay.id_ujian_essay, ujian_essay.soal, ujian_essay.gambar FROM soal LEFT JOIN ujian ON soal.id_soal = ujian.id_soal LEFT JOIN ujian_essay ON ujian.id_ujian = ujian_essay.id_ujian  WHERE soal.id_soal = '$id' AND ujian.jenis = 'essay'")->result();
        return $result;
    }

    public function getDetailUjianKelasPilihanGanda($id)
    {
        $result = $this->db->query("SELECT soal.id_soal, soal.id_guru, soal.id_mapel, ujian.id_ujian, ujian_pilihan_ganda.id_ujian_pilihan_ganda, ujian_pilihan_ganda.soal, ujian_pilihan_ganda.gambar, ujian_pilihan_ganda.pil_a, ujian_pilihan_ganda.pil_b, ujian_pilihan_ganda.pil_c, ujian_pilihan_ganda.pil_d, ujian_pilihan_ganda.pil_e FROM soal LEFT JOIN ujian ON soal.id_soal = ujian.id_soal LEFT JOIN ujian_pilihan_ganda ON ujian.id_ujian = ujian_pilihan_ganda.id_ujian WHERE soal.id_soal = '$id' AND ujian.jenis = 'pilihan_ganda'")->result();
        return $result;
    }

    public function getAllHasilUjian($id_soal)
    {
        $result = $this->db->query("SELECT soal.id_soal, hasil_ujian.id_siswa, mapel.nama AS mapel, siswa.nama AS siswa FROM hasil_ujian LEFT JOIN ujian ON hasil_ujian.id_ujian = ujian.id_ujian LEFT JOIN soal ON ujian.id_soal = soal.id_soal LEFT JOIN siswa ON hasil_ujian.id_siswa = siswa.id_siswa LEFT JOIN mapel ON soal.id_mapel = mapel.id_mapel WHERE soal.id_soal = '$id_soal' GROUP BY soal.id_soal, hasil_ujian.id_siswa, mapel.nama")->result();
        return $result;
    }

    public function getHasilUjianSiswa($id_siswa)
    {
        $result = $this->db->query("SELECT id_ujian FROM hasil_ujian WHERE id_siswa = '$id_siswa'")->result();
        return $result;
    }

    public function getDetailHasilUjianKelasEssay($id_soal, $id_siswa)
    {
        $result = $this->db->query("SELECT soal.id_soal, soal.id_guru, soal.id_mapel, ujian.id_ujian, ujian_essay.id_ujian_essay, ujian_essay.soal, ujian_essay.gambar, ujian_essay.jawaban_benar, hasil_ujian.jawaban, hasil_ujian.nilai FROM soal LEFT JOIN ujian ON soal.id_soal = ujian.id_soal LEFT JOIN ujian_essay ON ujian.id_ujian = ujian_essay.id_ujian LEFT JOIN hasil_ujian ON ujian_essay.id_ujian = hasil_ujian.id_ujian WHERE soal.id_soal = '$id_soal' AND hasil_ujian.id_siswa = '$id_siswa' AND ujian.jenis = 'essay'")->result();
        return $result;
    }

    public function getDetailHasilUjianKelasPilihanGanda($id_soal, $id_siswa)
    {
        $result = $this->db->query("SELECT soal.id_soal, soal.id_guru, soal.id_mapel, ujian.id_ujian, ujian_pilihan_ganda.id_ujian_pilihan_ganda, ujian_pilihan_ganda.soal, ujian_pilihan_ganda.gambar, ujian_pilihan_ganda.jawaban_benar, hasil_ujian.jawaban FROM soal LEFT JOIN ujian ON soal.id_soal = ujian.id_soal LEFT JOIN ujian_pilihan_ganda ON ujian.id_ujian = ujian_pilihan_ganda.id_ujian LEFT JOIN hasil_ujian ON ujian_pilihan_ganda.id_ujian = hasil_ujian.id_ujian WHERE soal.id_soal = '$id_soal' AND hasil_ujian.id_siswa = '$id_siswa' AND ujian.jenis = 'pilihan_ganda'")->result();
        return $result;
    }
}
