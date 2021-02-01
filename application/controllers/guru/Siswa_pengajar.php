<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_pengajar extends MY_Controller
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
        $guruPengajar = $this->m_guru->getDetailGuruPengajar($this->users->id_users);
        foreach ($guruPengajar as $key => $value) {
            $id_kelas[] = $value->id_kelas;
        }
        $kelas = implode("' , '", $id_kelas);
        $data = [
            'halaman' => 'Pengajar Siswa',
            'content' => 'guru/siswa_pengajar/view',
            'data'    => $this->m_siswa->getWherePenugasan($kelas),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }
}
