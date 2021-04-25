<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_users extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT users.id, users.id_users, CASE WHEN ( SELECT nama FROM guru WHERE id_guru = users.id_users ) IS NOT NULL THEN ( SELECT nama FROM guru WHERE id_guru = users.id_users ) ELSE ( SELECT nama FROM siswa WHERE id_siswa = users.id_users ) END AS nama, users.username, users.role FROM users WHERE users.role = 'guru' OR users.role = 'siswa'")->result();
        return $result;
    }
}
