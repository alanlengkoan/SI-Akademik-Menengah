<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_ujian extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'), $this->session->userdata('role'), ['admin']);

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_jenis_ujian');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Jenis Ujian',
            'content' => 'admin/jenis_ujian/view',
            'data'    => $this->m_jenis_ujian->getAll(),
            'css'     => '',
            'js'      => 'admin/jenis_ujian/js/view'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('ujian_jenis', ['id_ujian_jenis' => $post['id']]);
        $data = [
            'id_ujian_jenis' => $result['id_ujian_jenis'],
            'jenis'          => $result['jenis'],
            'keterangan'     => $result['keterangan'],
        ];
        // untuk load view
        $this->load->view('admin/jenis_ujian/upd', $data);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'id_ujian_jenis' => acak_id('ujian_jenis', 'id_ujian_jenis'),
            'jenis'          => $post['inpjenis'],
            'keterangan'     => $post['inpketerangan'],
        ];
        
        $this->db->trans_start();
        $this->crud->i('ujian_jenis', $data);
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
            'jenis'      => $post['inpjenis'],
            'keterangan' => $post['inpketerangan'],
        ];
        $this->db->trans_start();
        $this->crud->u('ujian_jenis', $data, ['id_ujian_jenis' => $post['inpid']]);
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
        $this->crud->d('ujian_jenis', $post['id'], 'id_ujian_jenis');
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
