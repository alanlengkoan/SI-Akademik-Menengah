<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends MY_Controller
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
        $this->load->model('m_siswa');
        $this->load->model('m_penugasan_guru');
    }

    // untuk default
    public function index()
    {
        $guruKelas = $this->m_siswa->getDetailSiswa($this->users->id_users);
        
        $data = [
            'halaman' => 'Daftar Guru '. $guruKelas->kelas,
            'content' => 'siswa/guru/view',
            'data'    => $this->m_penugasan_guru->getGuruKelas($guruKelas->id_kelas),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }
}
