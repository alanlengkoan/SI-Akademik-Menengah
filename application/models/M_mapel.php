<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_mapel extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM mapel ORDER BY pelajaran")->result();
        return $result;
    }

    public function getWhere($id)
    {
        $result = $this->db->query("SELECT * FROM mapel WHERE id = '$id'")->row();
        return $result;
    }
}
