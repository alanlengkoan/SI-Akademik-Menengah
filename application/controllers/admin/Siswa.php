<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_siswa');
        $this->load->model('m_kelas');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Siswa',
            'content' => 'admin/siswa/view',
            'data'    => $this->m_siswa->getAll(),
            'kelas'   => $this->m_kelas->getAll(),
            'css'     => 'admin/siswa/css/view',
            'js'      => 'admin/siswa/js/view'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('siswa', ['id' => $post['id']]);
        $data = [
            'id'            => $result['id'],
            'nis'           => $result['nis'],
            'nama'          => $result['nama'],
            'tempat_lahir'  => $result['tempat_lahir'],
            'tgl_lahir'     => date("d-m-Y", strtotime($result['tgl_lahir'])),
            'ortu_wali'     => $result['ortu_wali'],
            'alamat'        => $result['alamat'],
            'id_kelas'      => $result['id_kelas'],
            'jenis_kelamin' => $result['jenis_kelamin'],
            'thn_masuk'     => $result['thn_masuk'],
            'kelas'         => $this->m_kelas->getAll(),
        ];
        // untuk load view
        $this->load->view('admin/siswa/upd', $data);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'id'            => acak_id('siswa', 'id'),
            'nis'           => $post['inpnis'],
            'nama'          => $post['inpnama'],
            'tempat_lahir'  => $post['inptmplahir'],
            'tgl_lahir'     => date("Y-m-d", strtotime($post['inptgllahir'])),
            'ortu_wali'     => $post['inportuwali'],
            'alamat'        => $post['inpalamat'],
            'id_kelas'      => $post['inpkelas'],
            'jenis_kelamin' => $post['inpjenkel'],
            'thn_masuk'     => $post['inptahunmasuk'],
        ];
        $this->db->trans_start();
        $this->crud->i('siswa', $data);
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
            'nis'           => $post['inpnis'],
            'nama'          => $post['inpnama'],
            'tempat_lahir'  => $post['inptmplahir'],
            'tgl_lahir'     => date("Y-m-d", strtotime($post['inptgllahir'])),
            'ortu_wali'     => $post['inportuwali'],
            'alamat'        => $post['inpalamat'],
            'id_kelas'      => $post['inpkelas'],
            'jenis_kelamin' => $post['inpjenkel'],
            'thn_masuk'     => $post['inptahunmasuk'],
        ];
        $this->db->trans_start();
        $this->crud->u('siswa', $data, ['id' => $post['inpid']]);
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
        $this->crud->d('siswa', $post['id'], 'id');
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
