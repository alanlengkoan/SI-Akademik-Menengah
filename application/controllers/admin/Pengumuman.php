<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_pengumuman');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Pengumuman',
            'content' => 'admin/pengumuman/view',
            'data'    => $this->m_pengumuman->getAll(),
            'css'     => '',
            'js'      => 'admin/pengumuman/js/view'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('pengumuman', ['id_pengumuman' => $post['id']]);
        $data = [
            'id'     => $result['id_pengumuman'],
            'judul'  => $result['judul'],
            'isi'    => $result['isi'],
            'gambar' => $result['gambar'],
            'role'   => explode(',', $result['role'])
        ];
        // untuk load view
        $this->load->view('admin/pengumuman/upd', $data);
    }

    // untuk proses update status
    public function upd_status()
    {
        $post   = $this->input->post(NULL, TRUE);
        $status = ($post['value'] === '1' ? '0' : '1');
        $data = [
            'status' => $status,
        ];
        $this->db->trans_start();
        $this->crud->u('pengumuman', $data, ['id_pengumuman' => $post['id']]);
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
        $file = $_FILES['inpgambar']['name'];

        if ($file) {
            $config['upload_path']   = './' . upload_path('gambar');
            $config['allowed_types'] = 'jpg|png|PNG|JPEG|jpeg|JPG';
            $config['encrypt_name']  = TRUE;
            $config['overwrite']     = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('inpgambar')) {
                // apa bila gagal
                $error = array('error' => $this->upload->display_errors());

                $response = ['title' => 'Gagal!', 'text' => strip_tags($error['error']), 'type' => 'error', 'button' => 'Ok!'];
            } else {
                // apa bila berhasil
                $detailFile = $this->upload->data();

                $data = [
                    'id_pengumuman' => acak_id('pengumuman', 'id_pengumuman'),
                    'judul'         => $post['inpjudul'],
                    'isi'           => $post['inpisi'],
                    'gambar'        => $detailFile['file_name'],
                    'status'        => '1',
                    'role'          => implode(',', $post['inprole'])
                ];
                $this->db->trans_start();
                $this->crud->i('pengumuman', $data);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
                } else {
                    $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
                }
            }
        } else {
            $data = [
                'id_pengumuman' => acak_id('pengumuman', 'id_pengumuman'),
                'judul'         => $post['inpjudul'],
                'isi'           => $post['inpisi'],
                'status'        => '1',
                'role'          => implode(',', $post['inprole'])
            ];
            $this->db->trans_start();
            $this->crud->i('pengumuman', $data);
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
        $file = $_FILES['inpgambar']['name'];

        $result = $this->crud->gda('pengumuman', ['id_pengumuman' => $post['inpid']]);

        if ($file) {
            $config['upload_path']   = './' . upload_path('gambar');
            $config['allowed_types'] = 'jpg|png|PNG|JPEG|jpeg|JPG';
            $config['encrypt_name']  = TRUE;
            $config['overwrite']     = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('inpgambar')) {
                // apa bila gagal
                $error = array('error' => $this->upload->display_errors());

                $response = ['title' => 'Gagal!', 'text' => strip_tags($error['error']), 'type' => 'error', 'button' => 'Ok!'];
            } else {
                // apa bila berhasil
                $detailFile = $this->upload->data();

                // menghapus foto yg tersimpan
                if ($result['gambar'] !== '' || $result['gambar'] !== null) {
                    if (file_exists(upload_path('gambar') . $result['gambar'])) {
                        unlink(upload_path('gambar') . $result['gambar']);
                    }
                }

                $data = [
                    'judul'         => $post['inpjudul'],
                    'isi'           => $post['inpisi'],
                    'gambar'        => $detailFile['file_name'],
                    'status'        => '1',
                    'role'          => implode(',', $post['inprole'])
                ];
                $this->db->trans_start();
                $this->crud->u('pengumuman', $data, ['id_pengumuman' => $post['inpid']]);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
                } else {
                    $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
                }
            }
        } else {
            $data = [
                'judul'         => $post['inpjudul'],
                'isi'           => $post['inpisi'],
                'status'        => '1',
                'role'          => implode(',', $post['inprole'])
            ];
            $this->db->trans_start();
            $this->crud->u('pengumuman', $data, ['id_pengumuman' => $post['inpid']]);
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
        $this->crud->d('pengumuman', $post['id'], 'id_pengumuman');
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
