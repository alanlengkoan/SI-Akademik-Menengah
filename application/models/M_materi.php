<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_materi extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM materi")->result();
        return $result;
    }
}
