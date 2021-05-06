<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends MY_Controller
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
        $this->load->model('m_siswa');
        $this->load->model('m_mapel');
        $this->load->model('m_materi');
        $this->load->model('m_chat');
    }

    // untuk default
    public function index()
    {
        $siswaKelas = $this->m_siswa->getDetailSiswa($this->users->id_users);
        $data = [
            'halaman' => 'Materi ' . $siswaKelas->kelas,
            'content' => 'siswa/materi/view',
            'data'    => $this->m_materi->getMateriKelas($siswaKelas->id_kelas),
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
            'halaman' => 'Detail Materi',
            'content' => 'siswa/materi/detail',
            'guru'    => $this->m_materi->getDetailGuru($id),
            'data'    => $this->m_materi->getDetailMateriKelas($id),
            'css'     => '',
            'js'      => 'siswa/materi/js/detail'
        ];
        // untuk load view
        $this->load->view('siswa/base', $data);
    }

    // untuk load chat room
    public function load_chat($id)
    {
        $data = [
            'id_users' => $this->users->id_users,
            'chat'     => $this->m_chat->getDetailChat($id)
        ];
        // untuk load view
        $this->load->view('siswa/materi/chat', $data);
    }

    // untuk sent chat room
    public function sent_chat()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'id_forum'  => acak_id('forum', 'id_forum'),
            'id_materi' => $post['id_materi'],
            'id_users'  => $this->users->id_users,
            'level'     => $this->users->role,
            'pesan'     => $post['pesan'],
        ];
        $this->db->trans_start();
        $this->crud->i('forum', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo 'gagal';
        } else {
            $this->load_chat($data['id_materi']);
        }
    }
}
