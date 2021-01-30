<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM guru ORDER BY nama")->result();
        return $result;
    }

    public function getWhere($id)
    {
        $result = $this->db->query("SELECT * FROM guru WHERE id = '$id'")->row();
        return $result;
    }
}
