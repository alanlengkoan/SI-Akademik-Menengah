<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_pengajar extends MY_Controller
{
    public $users;

    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'), $this->session->userdata('role'), ['guru']);

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
        $sum = count($guruPengajar); 
        $kelas = [];
        if ($sum !== 0) {
            foreach ($guruPengajar as $key => $value) {
                $kelas[] = $value->id_kelas;
            }
        }
        $id_kelas = implode("' , '", $kelas);
      
        $data = [
            'halaman' => 'Pengajar Siswa',
            'menu'    => 'siswa_pengajar',
            'content' => 'guru/siswa_pengajar/view',
            'data'    => $this->m_siswa->getWherePenugasan($id_kelas),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }
}
