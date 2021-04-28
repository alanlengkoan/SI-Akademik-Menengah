<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends MY_Controller
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
        $this->load->model('m_mapel');
        $this->load->model('m_materi');
        $this->load->model('m_chat');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Materi',
            'content' => 'guru/materi/view',
            'data'    => $this->m_materi->getAll($this->users->id_users),
            'mapel'   => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
            'css'     => '',
            'js'      => 'guru/materi/js/view'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk detail
    public function detail($id)
    {
        $data = [
            'halaman' => 'Detail Materi',
            'content' => 'guru/materi/detail',
            'data'    => $this->m_materi->getDetailMateriKelas($id),
            'css'     => '',
            'js'      => 'guru/materi/js/detail'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk load chat room
    public function load_chat($id)
    {
        $data = [
            'id_users' => $this->users->id_users,
            'chat'     => $this->m_chat->getDetailChat($id)
        ];
        // untuk load view
        $this->load->view('guru/materi/chat', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('materi', ['id_materi' => $post['id']]);
        $data = [
            'id_materi'         => $result['id_materi'],
            'id_penugasan_guru' => $result['id_penugasan_guru'],
            'judul'             => $result['judul'],
            'tipe'              => $result['tipe'],
            'file'              => $result['file'],
            'mapel'             => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
        ];
        // untuk load view
        $this->load->view('guru/materi/upd', $data);
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

    // untuk proses update chat
    public function upd_chat()
    {
        $post   = $this->input->post(NULL, TRUE);
        $status = ($post['value'] === '1' ? '0' : '1');
        $data = [
            'status' => $status,
        ];
        $this->db->trans_start();
        $this->crud->u('materi', $data, ['id_materi' => $post['id']]);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk proses update materi
    public function upd_materi()
    {
        $post   = $this->input->post(NULL, TRUE);
        $status = ($post['value'] === '1' ? '0' : '1');
        $data = [
            'status_materi' => $status,
        ];
        $this->db->trans_start();
        $this->crud->u('materi', $data, ['id_materi' => $post['id']]);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post = $this->input->post(NULL, TRUE);

        if ($post['inptipe'] === 'pdf') {
            $config['upload_path']   = './' . upload_path('pdf');
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name']  = TRUE;
            $config['overwrite']     = TRUE;
        } else {
            $config['upload_path']   = './' . upload_path('mp4');
            $config['allowed_types'] = 'mp4';
            $config['encrypt_name']  = TRUE;
            $config['overwrite']     = TRUE;
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('inpfile')) {
            // apa bila gagal
            $error = array('error' => $this->upload->display_errors());

            $response = ['title' => 'Gagal!', 'text' => strip_tags($error['error']), 'type' => 'error', 'button' => 'Ok!'];
        } else {
            // apa bila berhasil
            $detailFile = $this->upload->data();

            $data = [
                'id_materi'         => acak_id('materi', 'id_materi'),
                'id_penugasan_guru' => $post['inppenugasan'],
                'judul'             => $post['inpjudul'],
                'tipe'              => $post['inptipe'],
                'file'              => $detailFile['file_name'],
            ];
            $this->db->trans_start();
            $this->crud->i('materi', $data);
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

    // untuk proses ubah data
    public function process_upd()
    {
        $post = $this->input->post(NULL, TRUE);
        $file = $_FILES['inpfile']['name'];
        
        $result = $this->crud->gda('materi', ['id_materi' => $post['inpid']]);

        if ($file) {
            if ($post['inptipe'] === 'pdf') {
                $config['upload_path']   = './' . upload_path('pdf');
                $config['allowed_types'] = 'pdf';
                $config['encrypt_name']  = TRUE;
                $config['overwrite']     = TRUE;
            } else {
                $config['upload_path']   = './' . upload_path('mp4');
                $config['allowed_types'] = 'mp4';
                $config['encrypt_name']  = TRUE;
                $config['overwrite']     = TRUE;
            }

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('inpfile')) {
                // apa bila gagal
                $error = array('error' => $this->upload->display_errors());

                $response = ['title' => 'Gagal!', 'text' => strip_tags($error['error']), 'type' => 'error', 'button' => 'Ok!'];
            } else {
                // apa bila berhasil
                $detailFile = $this->upload->data();

                // menghapus foto yg tersimpan
                if ($post['inptipe'] === 'pdf') {
                    unlink(upload_path('pdf') . $result['file']);
                } else {
                    unlink(upload_path('mp4') . $result['file']);
                }

                $data = [
                    'id_penugasan_guru' => $post['inppenugasan'],
                    'judul'             => $post['inpjudul'],
                    'tipe'              => $post['inptipe'],
                    'file'              => $detailFile['file_name'],
                ];
                $this->db->trans_start();
                $this->crud->u('materi', $data, ['id_materi' => $post['inpid']]);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
                } else {
                    $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
                }
            }
        } else {
            $data = [
                'id_penugasan_guru' => $post['inppenugasan'],
                'judul'             => $post['inpjudul'],
                'tipe'              => $post['inptipe'],
            ];
            $this->db->trans_start();
            $this->crud->u('materi', $data, ['id_materi' => $post['inpid']]);
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
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('materi', ['id_materi' => $post['id']]);
        $nma_file = $result['file'];
        // menghapus foto yg tersimpan
        if ($nma_file !== '' || $nma_file !== null) {
            if ($result['tipe'] === 'pdf') {
                if (file_exists(upload_path('pdf') . $result['file'])) {
                    unlink(upload_path('pdf') . $result['file']);
                }
            } else {
                if (file_exists(upload_path('mp4') . $result['file'])) {
                    unlink(upload_path('mp4') . $result['file']);
                }
            }
        }
        $this->db->trans_start();
        $this->crud->d('materi', $post['id'], 'id_materi');
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
