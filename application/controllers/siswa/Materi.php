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
        $this->load->model('crud');
        $this->load->model('m_siswa');
        $this->load->model('m_mapel');
        $this->load->model('m_materi');
        $this->load->model('m_absen');
        $this->load->model('m_chat');
    }

    // untuk default
    public function index()
    {
        $siswaKelas = $this->m_siswa->getDetailSiswa($this->users->id_users);
        $data = [
            'halaman' => 'Materi ' . $siswaKelas->kelas,
            'menu'    => 'materi',
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
            'halaman'  => 'Detail Materi',
            'menu'     => '',
            'content'  => 'siswa/materi/detail',
            'id_siswa' => $this->users->id_users,
            'status'   => $this->m_absen->checkAbsenSiswa($id, $this->users->id_users),
            'kelas'    => $this->m_materi->getDetailGuru($id),
            'materi'   => $this->m_materi->getDetailMateriKelas($id),
            'detail'   => $this->m_materi->getWhereMateriDetail($id),
            'css'      => '',
            'js'       => 'siswa/materi/js/detail'
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
            'pesan'     => $this->_parsingPesan($post['pesan']),
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

    // untuk absen
    public function absen()
    {
        $post = $this->input->post(NULL, TRUE);

        $data = [
            'id_materi' => $post['id_materi'],
            'id_siswa'  => $post['id_siswa']
        ];

        $this->db->trans_start();
        $this->crud->i('absen', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk respon json
        $this->_response($response);
    }

    public function _parsingPesan(string $pesan)
    {
        $cek_pesan = stristr($pesan, 'http://') ?: stristr($pesan, 'https://');

        if ($cek_pesan !== false) {
            $cari = $cek_pesan;

            if ($cek_pesan == trim($cek_pesan) && strpos($cek_pesan, ' ') !== false) {
                $array_link = explode(" ", $cek_pesan);

                for ($i = 0; $i < count($array_link); $i++) {
                    $parsing_link[] = '<a href="' . $array_link[$i] . '" target="_blank">' . $array_link[$i] . '</a>';
                }

                $ganti = implode(" ", $parsing_link);
            } else {
                $ganti = '<a href="' . $cek_pesan . '" target="_blank">' . $cek_pesan . '</a>';
            }

            $result = str_replace($cari, $ganti, $pesan);
        } else {
            $result = $pesan;
        }

        return $result;
    }
}
