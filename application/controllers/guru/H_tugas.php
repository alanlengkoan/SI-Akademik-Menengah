<?php
defined('BASEPATH') or exit('No direct script access allowed');

class H_tugas extends MY_Controller
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
        $this->load->model('m_tugas');
        $this->load->model('m_siswa');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Hasil Tugas',
            'menu'    => 'h_tugas',
            'content' => 'guru/h_tugas/view',
            'data'    => $this->m_tugas->getKelasHasilTugasSiswa($this->users->id_users),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk detail siswa
    public function siswa()
    {
        $id_guru  = $this->input->get('id_guru');
        $id_kelas = $this->input->get('id_kelas');

        $data = [
            'halaman'     => 'Tugas Siswa',
            'menu'        => 'h_tugas',
            'content'     => 'guru/h_tugas/siswa',
            'data'        => $this->m_tugas->getAllHasilTugasSiswa($id_guru, $id_kelas),
            'css'         => '',
            'js'          => ''
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk detail tugas
    public function detail()
    {
        $id_tugas = $this->input->get('id_tugas');
        $id_siswa = $this->input->get('id_siswa');

        $data = [
            'halaman'     => 'Hasil Tugas',
            'menu'        => '',
            'content'     => 'guru/h_tugas/detail',
            'data'        => $this->m_tugas->getDetailTugasKelas($id_tugas, $id_siswa),
            'siswa'       => $this->m_siswa->getDetailSiswa($id_siswa),
            'hasil_tugas' => $this->m_tugas->getHasilDetailTugas($id_tugas, $id_siswa),
            'css'         => '',
            'js'          => 'guru/h_tugas/js/detail'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk jawaban
    public function add_nilai()
    {
        $post = $this->input->post(NULL, TRUE);

        // untuk essay
        $data = [
            'nilai' => $post["inpnilai"]
        ];
        $this->db->trans_start();
        $this->crud->u('hasil_tugas', $data, ['id_tugas' => $post["id_tugas"], 'id_siswa' => $post["id_siswa"]]);
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
