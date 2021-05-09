<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends MY_Controller
{
    public $users;

    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'), $this->session->userdata('role'), ['guru']);

        // untuk mengambil detail user
        $this->users = get_users_detail($this->session->userdata('id'));

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_soal');
        $this->load->model('m_mapel');
        $this->load->model('m_jenis_ujian');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman'   => 'Ujian',
            'menu'      => 'ujian',
            'content'   => 'guru/ujian/view',
            'data'      => $this->m_soal->getAll($this->users->id_users),
            'mapel'     => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
            'jen_ujian' => $this->m_jenis_ujian->getAll(),
            'css'       => '',
            'js'        => 'guru/ujian/js/view'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('soal', ['id_soal' => $post['id']]);
        $data = [
            'id_soal'           => $result['id_soal'],
            'id_penugasan_guru' => $result['id_penugasan_guru'],
            'id_ujian_jenis'    => $result['id_ujian_jenis'],
            'tgl_ujian'         => date("d-m-Y", strtotime($result['tgl_ujian'])),
            'time'              => $result['time'],
            'nilai'             => $result['nilai'],
            'mapel'             => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
            'jen_ujian'         => $this->m_jenis_ujian->getAll(),
        ];
        // untuk load view
        $this->load->view('guru/ujian/upd', $data);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'id_soal'           => acak_id('soal', 'id_soal '),
            'id_penugasan_guru' => $post['inppenugasan'],
            'id_ujian_jenis'    => $post['inpjenisujian'],
            'tgl_ujian'         => date("Y-m-d", strtotime($post['inptanggalujian'])),
            'time'              => $post['inptime'],
            'nilai'             => $post['inpnilai'],
        ];
        $this->db->trans_start();
        $this->crud->i('soal', $data);
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
            'id_penugasan_guru' => $post['inppenugasan'],
            'id_ujian_jenis'    => $post['inpjenisujian'],
            'tgl_ujian'         => date("Y-m-d", strtotime($post['inptanggalujian'])),
            'time'              => $post['inptime'],
            'nilai'             => $post['inpnilai'],
        ];
        $this->db->trans_start();
        $this->crud->u('soal', $data, ['id_soal' => $post['inpid']]);
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
        $this->crud->d('soal', $post['id'], 'id_soal');
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
