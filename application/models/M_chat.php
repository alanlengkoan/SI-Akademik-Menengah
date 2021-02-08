<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_chat extends CI_Model
{
    public function getDetailChat($id)
    {
        $result = $this->db->query("SELECT forum.id_forum, forum.id_materi, forum.id_users, CASE WHEN ( SELECT nama FROM guru WHERE id_guru = forum.id_users ) IS NOT NULL THEN ( SELECT nama FROM guru WHERE id_guru = forum.id_users ) ELSE ( SELECT nama FROM siswa WHERE id_siswa = forum.id_users ) END AS nama, forum.`level`, forum.pesan, forum.date_send FROM forum WHERE forum.id_materi = '$id' ORDER BY date_send ASC")->result();
        return $result;
    }
}