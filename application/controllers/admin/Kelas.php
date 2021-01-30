<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_guru');
        $this->load->model('m_kelas');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Kelas',
            'content' => 'admin/kelas/view',
            'data'    => $this->m_kelas->getAll(),
            'guru'    => $this->m_guru->getAll(),
            'css'     => '',
            'js'      => 'admin/kelas/js/view'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('kelas', ['id' => $post['id']]);
        $data = [
            'id'        => $result['id'],
            'nama'      => $result['nama'],
            'walikelas' => $result['walikelas'],
            'guru'      => $this->m_guru->getAll(),
        ];
        // untuk load view
        $this->load->view('admin/kelas/upd', $data);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'id'        => acak_id('kelas', 'id'),
            'nama'      => $post['inpnama'],
            'walikelas' => $post['inpwalikelas'],
        ];
        $this->db->trans_start();
        $this->crud->i('kelas', $data);
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
            'nama'      => $post['inpnama'],
            'walikelas' => $post['inpwalikelas'],
        ];
        $this->db->trans_start();
        $this->crud->u('kelas', $data, ['id' => $post['inpid']]);
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
        $this->crud->d('kelas', $post['id'], 'id');
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
