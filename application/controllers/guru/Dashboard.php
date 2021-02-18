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
        $this->load->model('m_pengumuman');
	}

    public function index()
    {
        $data = [
            'halaman' => 'Dashboard Guru',
            'content' => 'guru/dashboard/view',
            'data'    => $this->m_pengumuman->getWhereRole('guru'),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }
}
