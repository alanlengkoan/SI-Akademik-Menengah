<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'), $this->session->userdata('role'), ['admin']);

        // untuk load model
        $this->load->model('m_siswa');
        $this->load->model('m_guru');
        $this->load->model('m_tugas');
        $this->load->model('m_ujian');
        $this->load->model('m_soal');
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

    // untuk laporan guru ikut e learning
    public function e_learning_guru()
    {
        $data = [
            'halaman' => 'Laporan E-Learning Guru',
            'content' => 'admin/laporan/e_learning_guru',
            'data'    => $this->m_guru->getLaporanGuruELearning(),
            'css'     => '',
            'js'      => 'admin/laporan/js/e_learning_guru'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk laporan siswa ikut e learning
    public function e_learning_siswa()
    {
        $data = [
            'halaman' => 'Laporan E-Learning Siswa',
            'content' => 'admin/laporan/e_learning_siswa',
            'data'    => $this->m_siswa->getLaporanSiswaELearning(),
            'css'     => '',
            'js'      => 'admin/laporan/js/e_learning_siswa'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk laporan hasil tugas
    public function hasil_tugas()
    {
        $data = [
            'halaman' => 'Laporan Hasil Tugas',
            'content' => 'admin/laporan/hasil_tugas',
            'data'    => $this->m_tugas->getAllKelasSiswa(),
            'css'     => '',
            'js'      => 'admin/laporan/js/hasil_tugas'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk laporan detail tugas
    public function hasil_tugas_detail()
    {
        $id_guru  = $this->input->get('id_guru');
        $id_kelas = $this->input->get('id_kelas');

        $data = [
            'halaman'     => 'Detail Tugas Siswa',
            'content'     => 'admin/laporan/hasil_tugas_detail',
            'data'        => $this->m_tugas->getAllHasilTugasSiswa($id_guru, $id_kelas),
            'css'         => '',
            'js'          => 'admin/laporan/js/hasil_tugas'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk laporan hasil ujian
    public function hasil_ujian()
    {
        $data = [
            'halaman' => 'Laporan Hasil Ujian',
            'content' => 'admin/laporan/hasil_ujian',
            'data'    => $this->m_soal->getAllSoal(),
            'css'     => '',
            'js'      => 'admin/laporan/js/hasil_ujian'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk laporan detail ujian
    public function hasil_ujian_detail($id)
    {
        $hasil_ujian = $this->m_ujian->getAllHasilUjian($id);
        $result = [];

        foreach ($hasil_ujian as $key => $value) {
            $detail        = $this->m_soal->getDetailSoal($value->id_soal);
            $essay         = $this->m_ujian->getDetailHasilUjianKelasEssay($value->id_soal, $value->id_siswa);
            $pilihan_ganda = $this->m_ujian->getDetailHasilUjianKelasPilihanGanda($value->id_soal, $value->id_siswa);

            $nilai_essay = [];
            $nilai_pg = [];
            foreach ($pilihan_ganda as $key => $value1) {
                if ($value1->jawaban_benar === $value1->jawaban) {
                    $nilai_pg[] = 1;
                }
            }
            foreach ($essay as $key => $value2) {
                $nilai_essay[] = $value2->nilai;
            }
            // untuk ambil nilai
            $nilai = (array_sum($nilai_pg) + array_sum($nilai_essay)) / (int) $detail->nilai;
            $nilaiAkhir = ($nilai * 100);

            $result[] = [
                'id_soal'     => $value->id_soal,
                'id_siswa'    => $value->id_siswa,
                'mapel'       => $value->mapel,
                'siswa'       => $value->siswa,
                'kelas'       => $value->kelas,
                'nilai'       => $value->nilai,
                'nilai_siswa' => round($nilaiAkhir),
            ];
        }

        $data = [
            'halaman' => 'Laporan Hasil Ujian',
            'content' => 'admin/laporan/hasil_ujian_detail',
            'data'    => $result,
            'css'     => '',
            'js'      => 'admin/laporan/js/hasil_ujian'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }
}
