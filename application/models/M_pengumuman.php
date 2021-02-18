<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_pengumuman extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM pengumuman ORDER BY judul")->result();
        return $result;
    }

    public function getWhereRole($role)
    {
        $result = $this->db->query("SELECT * FROM pengumuman WHERE STATUS = '1' AND role LIKE '%$role%'")->result();
        return $result;
    }
}
