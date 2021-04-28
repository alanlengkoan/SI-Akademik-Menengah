<?php
defined('BASEPATH') or exit('No direct script access allowed');

class H_ujian extends MY_Controller
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
        $this->load->model('m_ujian');
        $this->load->model('m_soal');
        $this->load->model('m_siswa');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Hasil Ujian',
            'content' => 'guru/h_ujian/view',
            'data'    => $this->m_soal->getAll($this->users->id_users),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk detail ujian
    public function detail($id)
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
            'halaman' => 'Hasil Ujian',
            'content' => 'guru/h_ujian/detail',
            'data'    => $result,
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk detail jawaban
    public function detail_jawaban()
    {
        $id_soal  = $this->input->get('id_soal');
        $id_siswa = $this->input->get('id_siswa');

        $detail        = $this->m_soal->getDetailSoal($id_soal);
        $essay         = $this->m_ujian->getDetailHasilUjianKelasEssay($id_soal, $id_siswa);
        $pilihan_ganda = $this->m_ujian->getDetailHasilUjianKelasPilihanGanda($id_soal, $id_siswa);

        $nilai_essay = [];
        $nilai_pg = [];
        foreach ($pilihan_ganda as $key => $value) {
            if ($value->jawaban_benar === $value->jawaban) {
                $nilai_pg[] = 1;
            }
        }
        foreach ($essay as $key => $value) {
            $nilai_essay[] = $value->nilai;
        }
        // untuk ambil nilai
        $nilai = (array_sum($nilai_pg) + array_sum($nilai_essay)) / (int) $detail->nilai;
        $nilaiAkhir = ($nilai * 100);

        $data = [
            'halaman'       => 'Detail Ujian',
            'content'       => 'guru/h_ujian/detail_ujian',
            'siswa'         => $this->m_siswa->getDetailSiswa($id_siswa),
            'nilai'         => round($nilaiAkhir),
            'detail'        => $detail,
            'essay'         => $essay,
            'pilihan_ganda' => $pilihan_ganda,
            'css'           => '',
            'js'            => 'guru/h_ujian/js/detail_ujian'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk jawaban
    public function add_nilai()
    {
        $post = $this->input->post(NULL, TRUE);
        $count_essay = count($post['inp_id_ujian_essay']);

        // untuk essay
        $this->db->trans_start();
        for ($i = 0; $i < $count_essay; $i++) {
            $data = [
                'nilai' => $post["{$i}_inpnilai"]
            ];
            $this->crud->u('hasil_ujian', $data, ['id_ujian' => $post["inp_id_ujian_essay"][$i], 'id_siswa' => $post["id_siswa"]]);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }
}
