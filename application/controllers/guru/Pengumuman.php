<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends MY_Controller
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
        $this->load->model('m_pengumuman');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Pengumuman',
            'menu'    => 'pengumuman',
            'content' => 'guru/pengumuman/view',
            'data'    => $this->m_pengumuman->getWhereRole('guru'),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }
}
