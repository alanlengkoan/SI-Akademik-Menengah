<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('m_guru');
        $this->load->model('m_siswa');
	}

    public function index()
    {
        $data = [
            'halaman' => 'Dashboard Admin',
            'guru'    => $this->m_guru->getAll(),
            'siswa'   => $this->m_siswa->getAll(),
            'css'     => '',
            'content' => 'admin/dashboard/view',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }
}
