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
        $this->load->model('m_users');
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
        $result = $this->crud->gda('guru', ['id_guru' => $post['id']]);
        $data = [
            'id_guru'    => $result['id_guru'],
            'nip'        => $result['nip'],
            'nama'       => $result['nama'],
            'agama'      => $result['agama'],
            'jen_kel'    => $result['jen_kel'],
            'alamat'     => $result['alamat'],
            'pendidikan' => $result['pendidikan'],
            'thn_masuk'  => $result['thn_masuk'],
        ];
        // untuk load view
        $this->load->view('admin/guru/upd', $data);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'id_guru'    => acak_id('guru', 'id_guru'),
            'nip'        => $post['inpnip'],
            'nama'       => $post['inpnama'],
            'agama'      => $post['inpagama'],
            'jen_kel'    => $post['inpjenkel'],
            'alamat'     => $post['inpalamat'],
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
            'agama'      => $post['inpagama'],
            'jen_kel'    => $post['inpjenkel'],
            'alamat'     => $post['inpalamat'],
            'pendidikan' => $post['inppendidikan'],
            'thn_masuk'  => $post['inptahunmasuk'],
        ];
        $this->db->trans_start();
        $this->crud->u('guru', $data, ['id_guru' => $post['inpid']]);
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
        $this->crud->d('guru', $post['id'], 'id_guru');
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
