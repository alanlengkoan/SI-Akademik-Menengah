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
        $this->load->model('m_soal');
        $this->load->model('m_ujian');
    }

    // untuk default
    public function index()
    {
        $siswaKelas = $this->m_siswa->getDetailSiswa($this->users->id_users);
        $siswaUjian =  $this->m_ujian->getHasilUjianSiswa($this->users->id_users);

        $get_id_ujian = [];
        foreach ($siswaUjian as $key => $value) {
            $get_id_ujian[] = $value->id_ujian;
        }

        $id_ujian = implode("' , '", $get_id_ujian);

        $data = [
            'halaman' => 'Ujian Siswa ' . $siswaKelas->kelas,
            'content' => 'siswa/ujian/view',
            'data'    => $this->m_ujian->getUjianKelas($siswaKelas->id_kelas, $id_ujian,  $this->users->id_users),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }

    // untuk soal
    public function soal($id_soal)
    {
        $data = [
            'halaman'       => 'Detail Ujian',
            'content'       => 'siswa/ujian/soal',
            'detail'        => $this->m_soal->getDetailSoal($id_soal),
            'pilihan_ganda' => $this->m_ujian->getDetailUjianKelasPilihanGanda($id_soal),
            'essay'         => $this->m_ujian->getDetailUjianKelasEssay($id_soal),
            'css'           => '',
            'js'            => 'siswa/ujian/js/soal'
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }

    // untuk hasil
    public function hasil($id_soal)
    {
        $data = [
            'halaman'       => 'Hasil Ujian',
            'content'       => 'siswa/ujian/hasil',
            'siswa'         => $this->m_siswa->getDetailSiswa($this->users->id_users),
            'detail'        => $this->m_soal->getDetailSoal($id_soal),
            'essay'         => $this->m_ujian->getDetailHasilUjianKelasEssay($id_soal, $this->users->id_users),
            'pilihan_ganda' => $this->m_ujian->getDetailHasilUjianKelasPilihanGanda($id_soal, $this->users->id_users),
            'css'           => '',
            'js'            => ''
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }

    // untuk jawab
    public function jawab()
    {
        $post = $this->input->post(NULL, TRUE);
        $count_pil_gan = count($post['inpidujian_pil_gan']);
        $count_essay = count($post['inpidujian_esssay']);

        // untuk pilihan ganda
        for ($i = 0; $i < $count_pil_gan; $i++) { 
            $data[] = [
                'id_hasil_ujian' => acak_id('hasil_ujian', 'id_hasil_ujian'),
                'id_ujian'       => $post["inpidujian_pil_gan"][$i],
                'id_siswa'       => $this->users->id_users,
                'jawaban'        => $post["{$i}_inpjawaban_pil_gan"]
            ];
        }
        // untuk essay
        for ($i = 0; $i < $count_essay; $i++) {
            $data[] = [
                'id_hasil_ujian' => acak_id('hasil_ujian', 'id_hasil_ujian'),
                'id_ujian'       => $post["inpidujian_esssay"][$i],
                'id_siswa'       => $this->users->id_users,
                'jawaban'        => $post["{$i}_inpjawaban_essay"]
            ];
        }
        $this->db->trans_start();
        $this->db->insert_batch('hasil_ujian', $data); 
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
