<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'), $this->session->userdata('role'), ['admin']);

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_jadwal');
        $this->load->model('m_penugasan_guru');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman'        => 'Jadwal',
            'content'        => 'admin/jadwal/view',
            'data'           => $this->m_jadwal->getAll(),
            'penugasan_guru' => $this->m_penugasan_guru->getAll(),
            'hari'           => [2 => 'Senin', 3 => 'Selasa', 4 => 'Rabu', 5 => 'Kamis', 6 => 'Jumat', 7 => 'Sabtu'],
            'css'            => '',
            'js'             => 'admin/jadwal/js/view'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('jadwal', ['id_jadwal' => $post['id']]);

        $data = [
            'id'                => $result['id_jadwal'],
            'id_penugasan_guru' => $result['id_penugasan_guru'],
            'id_hari'           => $result['hari'],
            'jam_mulai'         => date("H:i", strtotime($result['jam_mulai'])),
            'jam_selesai'       => date("H:i", strtotime($result['jam_selesai'])),
            'penugasan_guru'    => $this->m_penugasan_guru->getAll(),
            'hari'              => [2 => 'Senin', 3 => 'Selasa', 4 => 'Rabu', 5 => 'Kamis', 6 => 'Jumat', 7 => 'Sabtu'],
        ];
        // untuk load view
        $this->load->view('admin/jadwal/upd', $data);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post = $this->input->post(NULL, TRUE);

        $data = [
            'id_jadwal'         => acak_id('jadwal', 'id_jadwal'),
            'id_penugasan_guru' => $post['inppenugasanguru'],
            'hari'              => $post['inphari'],
            'jam_mulai'         => $post['inpjammulai'],
            'jam_selesai'       => $post['inpjamselesai'],
        ];
        $this->db->trans_start();
        $this->crud->i('jadwal', $data);
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
            'id_penugasan_guru' => $post['inppenugasanguru'],
            'hari'              => $post['inphari'],
            'jam_mulai'         => $post['inpjammulai'],
            'jam_selesai'       => $post['inpjamselesai'],
        ];
        $this->db->trans_start();
        $this->crud->u('jadwal', $data, ['id_jadwal' => $post['inpid']]);
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
        $this->crud->d('jadwal', $post['id'], 'id_jadwal');
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
