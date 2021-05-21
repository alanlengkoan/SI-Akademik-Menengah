<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends MY_Controller
{
    public $users;

    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'), $this->session->userdata('role'), ['siswa']);

        // untuk mengambil detail user
        $this->users = get_users_detail($this->session->userdata('id'));

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_jadwal');
        $this->load->model('m_siswa');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman'   => 'Jadwal',
            'menu'      => 'jadwal',
            'content'   => 'siswa/jadwal/view',
            'css'       => 'siswa/jadwal/css/view',
            'js'        => 'siswa/jadwal/js/view'
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }

    // untuk ambil jadwal
    public function calender()
    {
        $siswaKelas = $this->m_siswa->getDetailSiswa($this->users->id_users);

        $hari  = [2 => 'Monday', 3 => 'Tuesday', 4 => 'Wednesday', 5 => 'Thursday', 6 => 'Friday', 7 => 'Saturday'];
        $tahun = date('Y');
        $bulan = date('m');
        $get   = $this->m_jadwal->getJadwalSiswa($siswaKelas->id_kelas);

        $data = [];
        foreach ($get as $row) {
            $data[] = getAllDaysInAMonth($tahun, $bulan, $hari[$row->hari]);
        }

        $calender = [];
        foreach ($data as $key => $value) {
            foreach ($value as $day) {
                $calender[] = [
                    'title' => "Mata Pelajaran: {$get[$key]->mapel} Kelas: {$get[$key]->kelas} Jam Mulai: {$get[$key]->jam_mulai} Jam Selesai: {$get[$key]->jam_selesai}",
                    'start' => $day->format('Y-m-d'),
                ];
            }
        }
        // untuk response
        $this->_response($calender);
    }
}
