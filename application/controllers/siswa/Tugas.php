<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends MY_Controller
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
        $this->load->model('m_mapel');
        $this->load->model('m_tugas');
    }

    // untuk default
    public function index()
    {
        $siswaKelas = $this->m_siswa->getDetailSiswa($this->users->id_users);
        $data = [
            'halaman' => 'Tugas ' . $siswaKelas->kelas,
            'content' => 'siswa/tugas/view',
            'data'    => $this->m_tugas->getTugasKelas($siswaKelas->id_kelas),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }

    // untuk default
    public function detail($id)
    {
        $data = [
            'halaman'     => 'Detail Tugas',
            'content'     => 'siswa/tugas/detail',
            'data'        => $this->m_tugas->getDetailTugasKelas($id),
            'hasil_tugas' => $this->m_tugas->getHasilTugas($id),
            'css'         => 'siswa/tugas/css/detail',
            'js'          => 'siswa/tugas/js/detail'
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }

    // untuk upload
    public function upload()
    {
        $post = $this->input->post(NULL, TRUE);

        $config['upload_path']   = './' . upload_path('pdf');
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name']  = TRUE;
        $config['overwrite']     = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            // apa bila gagal
            $error = array('error' => $this->upload->display_errors());

            $response = ['title' => 'Gagal!', 'text' => strip_tags($error['error']), 'type' => 'error', 'button' => 'Ok!'];
        } else {
            // apa bila berhasil
            $detailFile = $this->upload->data();

            $this->db->trans_start();
            $tugas = [
                'status' => '1',
            ];
            $this->crud->u('tugas', $tugas, ['id_tugas' => $post['id_tugas']]);

            $hasil_tugas = [
                'id_hasil_tugas' => acak_id('hasil_tugas', 'id_hasil_tugas'),
                'id_tugas'       => $post['id_tugas'],
                'id_siswa'       => $this->users->id_users,
                'jawaban'        => $detailFile['file_name'],
            ];
            $this->crud->i('hasil_tugas', $hasil_tugas);

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
            } else {
                $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
            }
        }
        // untuk response json
        $this->_response($response);
    }
}
