<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_tugas extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT tugas.id_tugas, tugas.id_guru, tugas.judul, tugas.tipe, mapel.nama FROM tugas LEFT JOIN mapel ON tugas.id_mapel = mapel.id_mapel")->result();
        return $result;
    }
}
