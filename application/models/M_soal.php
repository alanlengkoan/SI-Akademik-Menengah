<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_soal extends CI_Model
{
    public function getAll($id)
    {
        $result = $this->db->query("SELECT soal.id_soal, soal.id_guru, soal.time, soal.nilai, mapel.nama, ujian_jenis.jenis AS jenis_ujian FROM soal LEFT JOIN mapel ON soal.id_mapel = mapel.id_mapel LEFT JOIN ujian_jenis ON soal.id_ujian_jenis = ujian_jenis.id_ujian_jenis WHERE soal.id_guru = '$id'")->result();
        return $result;
    }

    public function getDetailSoal($id)
    {
        $result = $this->db->query("SELECT soal.id_soal, soal.id_guru, soal.time, soal.nilai, mapel.nama, ujian_jenis.jenis AS jenis_ujian FROM soal LEFT JOIN mapel ON soal.id_mapel = mapel.id_mapel LEFT JOIN ujian_jenis ON soal.id_ujian_jenis = ujian_jenis.id_ujian_jenis WHERE soal.id_soal = '$id'")->row();
        return $result;
    }
}
