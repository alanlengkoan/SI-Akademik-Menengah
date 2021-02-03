<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis_ujian extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM ujian_jenis")->result();
        return $result;
    }
}
