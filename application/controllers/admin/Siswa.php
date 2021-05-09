<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'), $this->session->userdata('role'), ['admin']);

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
            'kelas'   => $this->m_kelas->getKelasJumlahSiswa(),
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk detail
    public function detail($id)
    {
        $data = [
            'halaman' => 'Siswa',
            'content' => 'admin/siswa/detail',
            'data'    => $this->m_siswa->getWhereStudent($id),
            'css'     => '',
            'js'      => 'admin/siswa/js/detail'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('siswa', ['id_siswa' => $post['id']]);
        $data = [
            'id_siswa'  => $result['id_siswa'],
            'id_kelas'  => $result['id_kelas'],
            'nis'       => $result['nis'],
            'nama'      => $result['nama'],
            'tmp_lahir' => $result['tmp_lahir'],
            'tgl_lahir' => date("d-m-Y", strtotime($result['tgl_lahir'])),
            'ortu_wali' => $result['ortu_wali'],
            'agama'     => $result['agama'],
            'jen_kel'   => $result['jen_kel'],
            'alamat'    => $result['alamat'],
            'thn_masuk' => $result['thn_masuk'],
            'kelas'     => $this->m_kelas->getAll(),
        ];
        // untuk load view
        $this->load->view('admin/siswa/upd', $data);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'id_siswa'  => acak_id('siswa', 'id_siswa'),
            'id_kelas'  => $post['inpkelas'],
            'nis'       => $post['inpnis'],
            'nama'      => $post['inpnama'],
            'tmp_lahir' => $post['inptmplahir'],
            'tgl_lahir' => date("Y-m-d", strtotime($post['inptgllahir'])),
            'ortu_wali' => $post['inportuwali'],
            'agama'     => $post['inpagama'],
            'jen_kel'   => $post['inpjenkel'],
            'alamat'    => $post['inpalamat'],
            'thn_masuk' => $post['inptahunmasuk'],
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
            'id_kelas'  => $post['inpkelas'],
            'nis'       => $post['inpnis'],
            'nama'      => $post['inpnama'],
            'tmp_lahir' => $post['inptmplahir'],
            'tgl_lahir' => date("Y-m-d", strtotime($post['inptgllahir'])),
            'ortu_wali' => $post['inportuwali'],
            'agama'     => $post['inpagama'],
            'jen_kel'   => $post['inpjenkel'],
            'alamat'    => $post['inpalamat'],
            'thn_masuk' => $post['inptahunmasuk'],
        ];
        $this->db->trans_start();
        $this->crud->u('siswa', $data, ['id_siswa' => $post['inpid']]);
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
        $this->crud->d('siswa', $post['id'], 'id_siswa');
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
