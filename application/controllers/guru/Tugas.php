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
        $this->load->model('m_guru');
        $this->load->model('m_mapel');
        $this->load->model('m_tugas');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Tugas',
            'content' => 'guru/tugas/view',
            'data'    => $this->m_tugas->getAll(),
            'mapel'   => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
            'css'     => '',
            'js'      => 'guru/tugas/js/view'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('tugas', ['id_tugas' => $post['id']]);
        $data = [
            'id_tugas' => $result['id_tugas'],
            'id_mapel' => $result['id_mapel'],
            'judul'    => $result['judul'],
            'tipe'     => $result['tipe'],
            'file'     => $result['file'],
            'start'    => date("d-m-Y", strtotime($result['start'])),
            'finish'   => date("d-m-Y", strtotime($result['finish'])),
            'mapel'    => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
        ];
        // untuk load view
        $this->load->view('guru/tugas/upd', $data);
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

            $start = date("Y-m-d", strtotime($post['inpstart']));  
            $finish = date("Y-m-d", strtotime($post['inpfinish']));  

            $data = [
                'id_tugas' => acak_id('tugas', 'id_tugas'),
                'id_guru'  => $this->users->id_users,
                'id_mapel' => $post['inpmapel'],
                'judul'    => $post['inpjudul'],
                'tipe'     => $post['inptipe'],
                'file'     => $detailFile['file_name'],
                'start'    => $start,
                'finish'   => $finish,
            ];
            $this->db->trans_start();
            $this->crud->i('tugas', $data);
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
        
        $result = $this->crud->gda('tugas', ['id_tugas' => $post['inpid']]);

        $start  = date("Y-m-d", strtotime($post['inpstart']));
        $finish = date("Y-m-d", strtotime($post['inpfinish']));

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
                    'id_guru'  => $this->users->id_users,
                    'id_mapel' => $post['inpmapel'],
                    'judul'    => $post['inpjudul'],
                    'tipe'     => $post['inptipe'],
                    'file'     => $detailFile['file_name'],
                    'start'    => $start,
                    'finish'   => $finish,
                ];
                $this->db->trans_start();
                $this->crud->u('tugas', $data, ['id_tugas' => $post['inpid']]);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
                } else {
                    $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
                }
            }
        } else {
            $data = [
                'id_guru'  => $this->users->id_users,
                'id_mapel' => $post['inpmapel'],
                'judul'    => $post['inpjudul'],
                'tipe'     => $post['inptipe'],
                'start'    => $start,
                'finish'   => $finish,
            ];
            $this->db->trans_start();
            $this->crud->u('tugas', $data, ['id_tugas' => $post['inpid']]);
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
        $result = $this->crud->gda('tugas', ['id_tugas' => $post['id']]);
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
        $this->crud->d('tugas', $post['id'], 'id_tugas');
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
