<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'), $this->session->userdata('role'), ['siswa']);

        // untuk mengambil detail user
        $this->users = get_users_detail($this->session->userdata('id'));

        // untuk load model
        $this->load->model('m_pengumuman');
        $this->load->model('m_jadwal');
        $this->load->model('m_siswa');
        $this->load->model('m_materi');
        $this->load->model('m_tugas');
        $this->load->model('m_soal');
        $this->load->model('m_penugasan_guru');
	}

    public function index()
    {
        $siswaKelas = $this->m_siswa->getDetailSiswa($this->users->id_users);
        $data = [
            'halaman' => 'Dashboard Siswa',
            'menu'    => 'dashboard',
            'content' => 'siswa/dashboard/view',
            'data'    => $this->m_pengumuman->getWhereRole('siswa'),
            'mapel'   => $this->m_penugasan_guru->getGuruMapel($siswaKelas->id_kelas),
            'css'     => 'siswa/dashboard/css/view',
            'js'      => 'siswa/dashboard/js/view'
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }

    public function detail()
    {
        $id_guru  = $this->input->get('guru');
        $id_kelas = $this->input->get('kelas');
        $id_mapel = $this->input->get('mapel');

        $data = [
            'halaman' => 'Detail Siswa',
            'menu'    => 'dashboard',
            'content' => 'siswa/dashboard/detail',
            'materi'  => $this->m_materi->getDetailMateriGuru($id_guru,  $id_kelas, $id_mapel),
            'tugas'   => $this->m_tugas->getDetailTugasGuru($id_guru,  $id_kelas, $id_mapel),
            'soal'    => $this->m_soal->getDetailSoalGuru($id_guru,  $id_kelas, $id_mapel),
            'siswa'   => $this->m_siswa->getWhereStudent($id_kelas),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }

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
