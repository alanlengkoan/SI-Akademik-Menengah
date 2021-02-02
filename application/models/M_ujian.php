<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_ujian extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT ujian.id_ujian, ujian.id_guru, ujian.jenis, mapel.nama FROM ujian LEFT JOIN mapel ON ujian.id_mapel = mapel.id_mapel")->result();
        return $result;
    }
}
