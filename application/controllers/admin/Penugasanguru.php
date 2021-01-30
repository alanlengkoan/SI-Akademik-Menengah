<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penugasanguru extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_penugasanguru');
        $this->load->model('m_kelas');
        $this->load->model('m_mapel');
        $this->load->model('m_guru');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman'   => 'Penugasan Guru',
            'content'   => 'admin/penugasanguru/view',
            'data'      => $this->m_penugasanguru->getAll(),
            'kelas'     => $this->m_kelas->getAll(),
            'mapel'     => $this->m_mapel->getAll(),
            'guru'      => $this->m_guru->getAll(),
            'css'       => 'admin/penugasanguru/css/view',
            'js'        => 'admin/penugasanguru/js/view'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('penugasan_guru', ['id' => $post['id']]);
        $data = [
            'id'       => $result['id'],
            'id_kelas' => $result['id_kelas'],
            'id_guru'  => $result['id_guru'],
            'id_mapel' => $result['id_mapel'],
            'kelas'    => $this->m_kelas->getAll(),
            'mapel'    => $this->m_mapel->getAll(),
            'guru'     => $this->m_guru->getAll(),
        ];
        // untuk load view
        $this->load->view('admin/penugasanguru/upd', $data);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'id'       => acak_id('penugasan_guru', 'id'),
            'id_kelas' => $post['inpkelas'],
            'id_guru'  => $post['inpguru'],
            'id_mapel' => $post['inpmapel'],
        ];
        $this->db->trans_start();
        $this->crud->i('penugasan_guru', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk proses ubah data
    public function process_upd()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'id_kelas' => $post['inpkelas'],
            'id_guru'  => $post['inpguru'],
            'id_mapel' => $post['inpmapel'],
        ];
        $this->db->trans_start();
        $this->crud->u('penugasan_guru', $data, ['id' => $post['inpid']]);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk proses hapus data
    public function process_del()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->db->trans_start();
        $this->crud->d('penugasan_guru', $post['id'], 'id');
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
