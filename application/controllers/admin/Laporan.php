<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('m_siswa');
        $this->load->model('m_guru');
    }

    // untuk laporan guru
    public function guru()
    {
        $data = [
            'halaman' => 'Laporan Guru',
            'content' => 'admin/laporan/guru',
            'data'    => $this->m_guru->getAll(),
            'css'     => '',
            'js'      => 'admin/laporan/js/guru'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk laporan siswa
    public function siswa()
    {
        $data = [
            'halaman' => 'Laporan Siswa',
            'content' => 'admin/laporan/siswa',
            'data'    => $this->m_siswa->getAll(),
            'css'     => '',
            'js'      => 'admin/laporan/js/siswa'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }
}
