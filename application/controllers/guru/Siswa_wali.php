<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_wali extends MY_Controller
{
    public $users;

    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk mengambil detail user
        $this->users = get_users_detail($this->session->userdata('id'));

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_guru');
        $this->load->model('m_siswa');
    }

    // untuk default
    public function index()
    {
        $guruWali = $this->m_guru->getDetailGuruWali($this->users->id_users);
        $id_kelas = ($guruWali !== null ? $guruWali->id_kelas : '');
        $data = [
            'halaman' => 'Wali Siswa',
            'content' => 'guru/siswa_wali/view',
            'data'    => $this->m_siswa->getWhereWali($id_kelas),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }
}
