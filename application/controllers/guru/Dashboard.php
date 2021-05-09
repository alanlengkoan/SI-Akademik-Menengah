<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
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
        $this->load->model('m_pengumuman');
        $this->load->model('m_jadwal');
        $this->load->model('m_materi');
        $this->load->model('m_tugas');
        $this->load->model('m_soal');
        $this->load->model('m_siswa');
        $this->load->model('m_penugasan_guru');
    }

    public function index()
    {
        $data = [
            'halaman' => 'Dashboard Guru',
            'menu'    => 'dashboard',
            'content' => 'guru/dashboard/view',
            'data'    => $this->m_pengumuman->getWhereRole('guru'),
            'kelas'   => $this->m_penugasan_guru->getWhere($this->users->id_users),
            'css'     => 'guru/dashboard/css/view',
            'js'      => 'guru/dashboard/js/view'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    public function detail()
    {
        $result = $this->m_penugasan_guru->getDetail($this->uri->segment('4'));

        $data = [
            'halaman' => 'Detail Guru',
            'menu'    => 'dashboard',
            'content' => 'guru/dashboard/detail',
            'materi'  => $this->m_materi->getDetailMateriGuru($result->id_guru,  $result->id_kelas, $result->id_mapel),
            'tugas'   => $this->m_tugas->getDetailTugasGuru($result->id_guru,  $result->id_kelas, $result->id_mapel),
            'soal'    => $this->m_soal->getDetailSoalGuru($result->id_guru,  $result->id_kelas, $result->id_mapel),
            'h_tugas' => $this->m_tugas->getHasilTugasKelasSiswa($result->id_guru,  $result->id_kelas),
            'h_ujian' => $this->m_soal->getHasilUjianKelasSiswa($result->id_guru,  $result->id_kelas),
            'siswa'   => $this->m_siswa->getWhereStudent($result->id_kelas),
            'css'     => '',
            'js'      => 'guru/dashboard/js/detail'
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
                    'title' => "Mata Pelajaran: {$get[$key]->mapel} Kelas: {$get[$key]->kelas} Jam Mulai: {$get[$key]->jam_mulai} Jam Selesai: {$get[$key]->jam_selesai}",
                    'start' => $day->format('Y-m-d'),
                ];
            }
        }
        // untuk response
        $this->_response($calender);
    }
}
