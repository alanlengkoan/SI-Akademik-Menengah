<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends MY_Controller
{
    public $users;

    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'), $this->session->userdata('role'), ['guru']);

        // untuk mengambil detail user
        $this->users = get_users_detail($this->session->userdata('id'));

        // load model
        $this->load->model('m_profil');
        $this->load->model('crud');
    }

    // fungsi default
    public function index()
    {
        $data = [
            'halaman' => 'Profil',
            'menu'    => 'profil',
            'content' => 'guru/profil/view',
            'profil'  => $this->m_profil->getWhereGuru($this->users->id_users),
            'css'     => '',
            'js'      => 'guru/profil/js/view'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk ubah akun
    public function ubah_akun()
    {
        $post = $this->input->post(NULL, TRUE);

        $users = [
            'username' => $post['username']
        ];

        $guru = [
            'nama' => $post['nama']
        ];

        $this->db->trans_start();
        // update users
        $this->crud->u('users', $users, ['id_users' => $this->users->id_users]);
        // update guru
        $this->crud->u('guru', $guru, ['id_guru' => $this->users->id_users]);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk respon json
        $this->_response($response);
    }

    // untuk ubah keamanan
    public function ubah_keamanan()
    {
        $post = $this->input->post(NULL, TRUE);

        $pwd_lama = $post['password_lama'];
        $pwd_baru = $post['password_baru'];
        $konfirmasi_pwd_baru = $post['konfirmasi_password'];

        $users = $this->crud->gda('users', ['id_users' => $this->users->id_users]);
        $check_pwd = password_verify($pwd_lama, $users['password']);

        if ($check_pwd === true) {
            if ($pwd_baru === $konfirmasi_pwd_baru) {
                $guru = [
                    'password' => password_hash($pwd_baru, PASSWORD_DEFAULT)
                ];

                $this->db->trans_start();
                $this->crud->u('users', $guru, ['id_users' => $this->users->id_users]);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $response = ['title' => 'Gagal!', 'text' => 'Terdapat kesalahan pada sistem!', 'type' => 'error', 'button' => 'Ok!'];
                } else {
                    $response = ['title' => 'Berhasil!', 'text' => 'Berhasil!', 'type' => 'success', 'button' => 'Ok!'];
                }
            } else {
                $response = ['title' => 'Gagal!', 'text' => 'Password baru dan konfirmasi password baru tidak sama!', 'type' => 'error', 'button' => 'Ok!'];
            }
        } else {
            $response = ['title' => 'Gagal!', 'text' => 'Password lama yang Anda masukkan tidak sama!', 'type' => 'error', 'button' => 'Ok!'];
        }
        // untuk respon json
        $this->_response($response);
    }
}
