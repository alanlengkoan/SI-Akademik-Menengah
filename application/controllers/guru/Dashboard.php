<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
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
        $this->load->model('m_pengumuman');
        $this->load->model('m_jadwal');
    }

    public function index()
    {
        $data = [
            'halaman' => 'Dashboard Guru',
            'content' => 'guru/dashboard/view',
            'data'    => $this->m_pengumuman->getWhereRole('guru'),
            'css'     => 'guru/dashboard/css/view',
            'js'      => 'guru/dashboard/js/view'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    public function calender()
    {
        $hari  = [2 => 'Monday', 3 => 'Tuesday', 4 => 'Wednesday', 5 => 'Thursday', 6 => 'Friday', 7 => 'Saturday'];
        $tahun = date('Y');
        $bulan = date('m');
        $get   = $this->m_jadwal->getJadwalGuru($this->users->id_users);

        $data = [];
        foreach ($get as $row) {
            $data[] = getAllDaysInAMonth($tahun, $bulan, $hari[$row->hari]);
        }

        $calender = [];
        foreach ($data as $key => $value) {
            foreach ($value as $day) {
                $calender[] = [
                    'title' => "Mata Pelajaran: {$get[$key]->mapel} Kelas: {$get[$key]->kelas} Jam: {$get[$key]->jam}",
                    'start' => $day->format('Y-m-d'),
                ];
            }
        }
        // untuk response
        $this->_response($calender);
    }
}
