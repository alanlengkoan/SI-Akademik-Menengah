<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_users extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT users.id, users.username, users.role, CASE WHEN ( SELECT nama FROM guru WHERE id_user = users.id ) IS NOT NULL THEN ( SELECT nama FROM guru WHERE id_user = users.id ) ELSE ( SELECT nama FROM siswa WHERE id_user = users.id ) END AS nama FROM users")->result();
        return $result;
    }

    public function getUsers($role)
    {
        $result = $this->db->query("SELECT users.id, users.username, users.role, CASE WHEN ( SELECT nama FROM guru WHERE id_user = users.id ) IS NOT NULL THEN ( SELECT nama FROM guru WHERE id_user = users.id ) ELSE ( SELECT nama FROM siswa WHERE id_user = users.id ) END AS nama FROM users WHERE role = '$role' AND CASE WHEN ( SELECT nama FROM guru WHERE id_user = users.id ) IS NOT NULL THEN ( SELECT nama FROM guru WHERE id_user = users.id ) ELSE ( SELECT nama FROM siswa WHERE id_user = users.id ) END IS NULL")->result();
        return $result;
    }

    public function getWhere($id)
    {
        $result = $this->db->query("SELECT * FROM users WHERE id = '$id'")->row();
        return $result;
    }
}
