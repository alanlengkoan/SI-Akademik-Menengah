<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends MY_Controller
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
        $this->load->model('m_mapel');
        $this->load->model('m_tugas');
    }

    // untuk default
    public function index()
    {
        $siswaKelas = $this->m_siswa->getDetailSiswa($this->users->id_users);
        $data = [
            'halaman' => 'Tugas ' . $siswaKelas->kelas,
            'content' => 'siswa/tugas/view',
            'data'    => $this->m_tugas->getTugasKelas($siswaKelas->id_kelas),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }

    // untuk default
    public function detail($id)
    {
        $data = [
            'halaman' => 'Detail Tugas',
            'content' => 'siswa/tugas/detail',
            'data'    => $this->m_tugas->getDetailTugasKelas($id),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }
}
