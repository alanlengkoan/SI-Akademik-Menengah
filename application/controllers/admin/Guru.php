<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_guru');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Guru',
            'content' => 'admin/guru/view',
            'data'    => $this->m_guru->getAll(),
            'css'     => '',
            'js'      => 'admin/guru/js/view'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('guru', ['id' => $post['id']]);
        $data = [
            'id'          => $result['id'],
            'nip'         => $result['nip'],
            'nama'        => $result['nama'],
            'pendidikan'  => $result['pendidikan'],
            'tahun_masuk' => $result['thn_masuk'],
        ];
        // untuk load view
        $this->load->view('admin/guru/upd', $data);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'id'         => acak_id('guru', 'id'),
            'nip'        => $post['inpnip'],
            'nama'       => $post['inpnama'],
            'pendidikan' => $post['inppendidikan'],
            'thn_masuk'  => $post['inptahunmasuk'],
        ];
        $this->db->trans_start();
        $this->crud->i('guru', $data);
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
            'nip'        => $post['inpnip'],
            'nama'       => $post['inpnama'],
            'pendidikan' => $post['inppendidikan'],
            'thn_masuk'  => $post['inptahunmasuk'],
        ];
        $this->db->trans_start();
        $this->crud->u('guru', $data, ['id' => $post['inpid']]);
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
        $this->crud->d('guru', $post['id'], 'id');
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
