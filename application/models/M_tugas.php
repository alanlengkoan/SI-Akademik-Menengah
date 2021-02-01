<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_tugas extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM tugas")->result();
        return $result;
    }
}
