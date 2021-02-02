<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_materi extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT materi.id_materi, materi.id_guru, materi.judul, materi.tipe, mapel.nama FROM materi LEFT JOIN mapel ON materi.id_mapel = mapel.id_mapel")->result();
        return $result;
    }
}
