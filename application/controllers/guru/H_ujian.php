<?php
defined('BASEPATH') or exit('No direct script access allowed');

class H_ujian extends MY_Controller
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
            'data'    => $this->m_soal->getAll(),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk detail ujian
    public function detail($id)
    {
        $data = [
            'halaman' => 'Hasil Ujian',
            'content' => 'guru/h_ujian/detail',
            'data'    => $this->m_ujian->getAllHasilUjian($id),
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

        $data = [
            'halaman'       => 'Detail Ujian',
            'content'       => 'guru/h_ujian/detail_ujian',
            'siswa'         => $this->m_siswa->getDetailSiswa($id_siswa),
            'detail'        => $this->m_soal->getDetailSoal($id_soal),
            'essay'         => $this->m_ujian->getDetailHasilUjianKelasEssay($id_soal, $id_siswa),
            'pilihan_ganda' => $this->m_ujian->getDetailHasilUjianKelasPilihanGanda($id_soal, $id_siswa),
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
