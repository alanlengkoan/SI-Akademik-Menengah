<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'), $this->session->userdata('role'), ['admin']);

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_users');
        $this->load->model('m_guru');
        $this->load->model('m_siswa');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Manajemen User',
            'content' => 'admin/users/view',
            'data'    => $this->m_users->getAll(),
            'css'     => 'admin/users/css/view',
            'js'      => 'admin/users/js/view'
        ];

        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('users', ['id' => $post['id']]);
        $data = [
            'id'       => $result['id'],
            'id_users' => $result['id_users'],
            'username' => $result['username'],
            'role'     => $result['role'],
            'guru'     => $this->m_guru->getAll(),
            'siswa'    => $this->m_siswa->getAll(),
        ];
        // untuk load view
        $this->load->view('admin/users/upd', $data);
    }

    // untuk get users by role
    public function get_users()
    {
        $post = $this->input->post(NULL, TRUE);

        $response['status'] = false;
        if ($post['role'] === 'guru') {
            $result = $this->m_guru->getUseUsers();

            $response['status'] = true;
            foreach ($result as $key => $value) {
                $response['data'][] = [
                    'id'   => $value->id_guru,
                    'nama' => $value->nama
                ];
            }
        } else if ($post['role'] === 'siswa') {
            $result = $this->m_siswa->getUseUsers();

            $response['status'] = true;
            foreach ($result as $key => $value) {
                $response['data'][] = [
                    'id'   => $value->id_siswa,
                    'nama' => $value->nama
                ];
            }
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post     = $this->input->post(NULL, TRUE);
        $pwd_satu = $post['inppasswordsatu'];
        $pwd_dua  = $post['inppassworddua'];
        if ($pwd_satu === $pwd_dua) {
            $pwd_hash = password_hash($pwd_dua, PASSWORD_DEFAULT);
            $data = [
                'id'       => acak_id('users', 'id'),
                'id_users' => $post['inpusers'],
                'username' => $post['inpusername'],
                'password' => $pwd_hash,
                'role'     => $post['inprole'],
            ];
            $this->db->trans_start();
            $this->crud->i('users', $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
            } else {
                $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
            }
        } else {
            $response = ['title' => 'Peringatan!', 'text' => 'Password yang Anda masukkan tidak sama!!', 'type' => 'warning', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk proses ubah data
    public function process_upd()
    {
        $post     = $this->input->post(NULL, TRUE);
        $pwd_lama = $post['inppasswordlama'];
        $pwd_satu = $post['inppasswordsatu'];
        $pwd_dua  = $post['inppassworddua'];

        $user = $this->crud->gda('users', ['id' => $post['inpid']]);
        $check_pwd = password_verify($pwd_lama, $user['password']);

        if ($pwd_lama) {
            if ($check_pwd === true) {
                if ($pwd_satu === $pwd_dua) {
                    $pwd_hash = password_hash($pwd_dua, PASSWORD_DEFAULT);

                    $data = [
                        'id_users' => $post['inpusers'],
                        'username' => $post['inpusername'],
                        'password' => $pwd_hash,
                        'role'     => $post['inprole'],
                    ];

                    $this->db->trans_start();
                    $this->crud->u('users', $data, ['id' => $post['inpid']]);
                    $this->db->trans_complete();
                    if ($this->db->trans_status() === FALSE) {
                        $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
                    } else {
                        $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
                    }
                } else {
                    $response = ['title' => 'Peringatan!', 'text' => 'Password yang Anda masukkan tidak sama!!', 'type' => 'warning', 'button' => 'Ok!'];
                }
            } else {
                $response = ['title' => 'Peringatan!', 'text' => 'Password lama yang Anda masukkan tidak sama!!', 'type' => 'warning', 'button' => 'Ok!'];
            }
        } else {
            $data = [
                'id_users' => $post['inpusers'],
                'username' => $post['inpusername'],
                'role'     => $post['inprole'],
            ];

            $this->db->trans_start();
            $this->crud->u('users', $data, ['id' => $post['inpid']]);
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

    // untuk proses hapus data
    public function process_del()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->db->trans_start();
        $this->crud->d('users', $post['id'], 'id');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal Hapus!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Hapus!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }
}
