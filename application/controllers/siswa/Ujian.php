<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends MY_Controller
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
        $this->load->model('m_siswa');
        $this->load->model('m_ujian');
    }

    // untuk default
    public function index()
    {
        $siswaKelas = $this->m_siswa->getDetailSiswa($this->users->id_users);
        $data = [
            'halaman' => 'Ujian Siswa ' . $siswaKelas->kelas,
            'content' => 'siswa/ujian/view',
            'data'    => $this->m_ujian->getUjianKelas($siswaKelas->id_kelas),
            'css'     => '',
            'js'      => 'siswa/ujian/js/view'
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }

    // untuk soal
    public function soal()
    {
        $siswaKelas  = $this->m_siswa->getDetailSiswa($this->users->id_users);
        $id_kelas    = $siswaKelas->id_kelas;
        $id_guru     = $this->input->get('id_guru');
        $id_mapel    = $this->input->get('id_mapel');
        $mapelDetail = $this->crud->gda('mapel', ['id_mapel' => $id_mapel]);

        $data = [
            'halaman'       => 'Detail Ujian',
            'content'       => 'siswa/ujian/soal',
            'judul'         => 'Ujian Mata Pelajaran ' . $mapelDetail['nama'],
            'pilihan_ganda' => $this->m_ujian->getDetailUjianKelasPilihanGanda($id_guru, $id_mapel, $id_kelas),
            'essay'         => $this->m_ujian->getDetailUjianKelasEssay($id_guru, $id_mapel, $id_kelas),
            'css'           => '',
            'js'            => ''
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }
}
