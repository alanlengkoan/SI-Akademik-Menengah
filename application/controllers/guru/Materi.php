<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends MY_Controller
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
        $this->load->model('m_mapel');
        $this->load->model('m_materi');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Materi',
            'content' => 'guru/materi/view',
            'data'    => $this->m_materi->getAll(),
            'mapel'   => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
            'css'     => '',
            'js'      => 'guru/materi/js/view'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('materi', ['id_materi' => $post['id']]);
        $data = [
            'id_materi' => $result['id_materi'],
            'id_mapel'  => $result['id_mapel'],
            'judul'     => $result['judul'],
            'tipe'      => $result['tipe'],
            'file'      => $result['file'],
            'mapel'     => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
        ];
        // untuk load view
        $this->load->view('guru/materi/upd', $data);
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
                'id_materi' => acak_id('materi', 'id_materi'),
                'id_guru'   => $this->users->id_users,
                'id_mapel'  => $post['inpmapel'],
                'judul'     => $post['inpjudul'],
                'tipe'      => $post['inptipe'],
                'file'      => $detailFile['file_name'],
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
                    'id_guru'   => $this->users->id_users,
                    'id_mapel'  => $post['inpmapel'],
                    'judul'     => $post['inpjudul'],
                    'tipe'      => $post['inptipe'],
                    'file'      => $detailFile['file_name'],
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
                'id_guru'   => $this->users->id_users,
                'id_mapel'  => $post['inpmapel'],
                'judul'     => $post['inpjudul'],
                'tipe'      => $post['inptipe'],
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
