<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends MY_Controller
{
    public $users;

    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk mengambil detail user
        $this->users = get_users_detail($this->session->userdata('id'));

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_mapel');
        $this->load->model('m_soal');
        $this->load->model('m_ujian');
        $this->load->model('m_jenis_ujian');
    }

    // untuk add
    public function add($id)
    {
        $data = [
            'halaman'   => 'Soal',
            'content'   => 'guru/soal/view',
            'data'      => $this->m_ujian->getAll($id),
            'detail'    => $this->m_soal->getDetailSoal($id),
            'mapel'     => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
            'jen_ujian' => $this->m_jenis_ujian->getAll(),
            'css'       => '',
            'js'        => 'guru/soal/js/view'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('ujian', ['id_ujian' => $post['id']]);
        $data = [
            'id_ujian'  => $result['id_ujian'],
            'jenis'     => $result['jenis'],
            'detail'    => $this->m_soal->getDetailSoal($result['id_soal']),
            'mapel'     => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
            'jen_ujian' => $this->m_jenis_ujian->getAll(),
        ];
        // untuk load view
        $this->load->view('guru/soal/upd', $data);
    }

    // untuk proses update soal
    public function upd_soal()
    {
        $post   = $this->input->post(NULL, TRUE);
        $status = ($post['value'] === '1' ? '0' : '1');
        $data = [
            'status_soal' => $status,
        ];
        $this->db->trans_start();
        $this->crud->u('soal', $data, ['id_soal' => $post['id']]);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk ambil jenis ujian
    public function get_jenis_ujian()
    {
        $post = $this->input->post(NULL, TRUE);
        // untuk load view
        $this->load->view('guru/soal/' . $post['jenis']);
    }

    // untuk ambil detail jenis ujian
    public function get_jenis_ujian_detail()
    {
        $post  = $this->input->post(NULL, TRUE);
        $jenis = $post['jenis'];

        if ($jenis === 'essay') {
            // tabel detail ujian essay
            $result = $this->crud->gda('ujian_essay', ['id_ujian' => $post['id_ujian']]);
            $response = [
                'id_ujian_essay' => $result['id_ujian_essay'],
                'id_ujian'       => $result['id_ujian'],
                'soal'           => $result['soal'],
                'jawaban_benar'  => $result['jawaban_benar'],
            ];
        } else if ($jenis === 'pilihan_ganda') {
            // tabel detail ujian pilihan ganda
            $result = $this->crud->gda('ujian_pilihan_ganda', ['id_ujian' => $post['id_ujian']]);
            $response = [
                'id_ujian_pilihan_ganda' => $result['id_ujian_pilihan_ganda'],
                'id_ujian'               => $result['id_ujian'],
                'soal'                   => $result['soal'],
                'pil_a'                  => $result['pil_a'],
                'pil_b'                  => $result['pil_b'],
                'pil_c'                  => $result['pil_c'],
                'pil_d'                  => $result['pil_d'],
                'pil_e'                  => $result['pil_e'],
                'jawaban_benar'          => $result['jawaban_benar'],
            ];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post  = $this->input->post(NULL, TRUE);
        $jenis = $post['inpjenis'];
        $file  = $_FILES['inpgambar']['name'];

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

                $this->db->trans_start();
                // tabel ujian
                $ujian = [
                    'id_ujian' => acak_id('ujian', 'id_ujian'),
                    'id_soal'  => $post['inpidsoal'],
                    'jenis'    => $post['inpjenis'],
                ];
                $this->crud->i('ujian', $ujian);

                if ($jenis === 'essay') {
                    // tabel detail ujian essay
                    $ujian_detail = [
                        'id_ujian_essay' => acak_id('ujian_essay', 'id_ujian_essay '),
                        'id_ujian'       => $ujian['id_ujian'],
                        'soal'           => $post['inpsoal'],
                        'gambar'         => $detailFile['file_name'],
                        'jawaban_benar'  => $post['inpjawabanbenar'],
                    ];
                    $this->crud->i('ujian_essay', $ujian_detail);
                } else if ($jenis === 'pilihan_ganda') {
                    // tabel detail ujian pilihan ganda
                    $ujian_detail = [
                        'id_ujian_pilihan_ganda' => acak_id('ujian_pilihan_ganda', 'id_ujian_pilihan_ganda '),
                        'id_ujian'               => $ujian['id_ujian'],
                        'soal'                   => $post['inpsoal'],
                        'gambar'                 => $detailFile['file_name'],
                        'pil_a'                  => $post['inppila'],
                        'pil_b'                  => $post['inppilb'],
                        'pil_c'                  => $post['inppilc'],
                        'pil_d'                  => $post['inppild'],
                        'pil_e'                  => $post['inppile'],
                        'jawaban_benar'          => $post['inpjawabanbenar'],
                    ];
                    $this->crud->i('ujian_pilihan_ganda', $ujian_detail);
                }
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
                } else {
                    $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
                }
            }
        } else {
            $this->db->trans_start();
            // tabel ujian
            $ujian = [
                'id_ujian' => acak_id('ujian', 'id_ujian'),
                'id_soal'  => $post['inpidsoal'],
                'jenis'    => $post['inpjenis'],
            ];
            $this->crud->i('ujian', $ujian);

            if ($jenis === 'essay') {
                // tabel detail ujian essay
                $ujian_detail = [
                    'id_ujian_essay' => acak_id('ujian_essay', 'id_ujian_essay '),
                    'id_ujian'       => $ujian['id_ujian'],
                    'soal'           => $post['inpsoal'],
                    'jawaban_benar'  => $post['inpjawabanbenar'],
                ];
                $this->crud->i('ujian_essay', $ujian_detail);
            } else if ($jenis === 'pilihan_ganda') {
                // tabel detail ujian pilihan ganda
                $ujian_detail = [
                    'id_ujian_pilihan_ganda' => acak_id('ujian_pilihan_ganda', 'id_ujian_pilihan_ganda '),
                    'id_ujian'               => $ujian['id_ujian'],
                    'soal'                   => $post['inpsoal'],
                    'pil_a'                  => $post['inppila'],
                    'pil_b'                  => $post['inppilb'],
                    'pil_c'                  => $post['inppilc'],
                    'pil_d'                  => $post['inppild'],
                    'pil_e'                  => $post['inppile'],
                    'jawaban_benar'          => $post['inpjawabanbenar'],
                ];
                $this->crud->i('ujian_pilihan_ganda', $ujian_detail);
            }
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
        $post  = $this->input->post(NULL, TRUE);
        $jenis = $post['inpjenis'];
        $file  = $_FILES['inpgambar']['name'];

        if ($jenis === 'essay') {
            $result = $this->crud->gda('ujian_essay', ['id_ujian' => $post['inpid']]);
        } else if ($jenis === 'pilihan_ganda') {
            $result = $this->crud->gda('ujian_pilihan_ganda', ['id_ujian' => $post['inpid']]);
        }

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

                $this->db->trans_start();
                // tabel ujian
                $ujian = [
                    'id_soal' => $post['inpidsoal'],
                    'jenis'   => $post['inpjenis'],
                ];
                $this->crud->u('ujian', $ujian, ['id_ujian' => $post['inpid']]);

                if ($jenis === 'essay') {
                    // tabel detail ujian essay
                    $ujian_detail = [
                        'soal'          => $post['inpsoal'],
                        'gambar'        => $detailFile['file_name'],
                        'jawaban_benar' => $post['inpjawabanbenar'],
                    ];
                    $this->crud->u('ujian_essay', $ujian_detail, ['id_ujian' => $post['inpid']]);
                } else if ($jenis === 'pilihan_ganda') {
                    // tabel detail ujian pilihan ganda
                    $ujian_detail = [
                        'soal'          => $post['inpsoal'],
                        'gambar'        => $detailFile['file_name'],
                        'pil_a'         => $post['inppila'],
                        'pil_b'         => $post['inppilb'],
                        'pil_c'         => $post['inppilc'],
                        'pil_d'         => $post['inppild'],
                        'pil_e'         => $post['inppile'],
                        'jawaban_benar' => $post['inpjawabanbenar'],
                    ];
                    $this->crud->u('ujian_pilihan_ganda', $ujian_detail, ['id_ujian' => $post['inpid']]);
                }
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
                } else {
                    $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
                }
            }
        } else {
            $this->db->trans_start();
            // tabel ujian
            $ujian = [
                'id_soal' => $post['inpidsoal'],
                'jenis'   => $post['inpjenis'],
            ];
            $this->crud->u('ujian', $ujian, ['id_ujian' => $post['inpid']]);

            if ($jenis === 'essay') {
                // tabel detail ujian essay
                $ujian_detail = [
                    'soal'          => $post['inpsoal'],
                    'jawaban_benar' => $post['inpjawabanbenar'],
                ];
                $this->crud->u('ujian_essay', $ujian_detail, ['id_ujian' => $post['inpid']]);
            } else if ($jenis === 'pilihan_ganda') {
                // tabel detail ujian pilihan ganda
                $ujian_detail = [
                    'soal'          => $post['inpsoal'],
                    'pil_a'         => $post['inppila'],
                    'pil_b'         => $post['inppilb'],
                    'pil_c'         => $post['inppilc'],
                    'pil_d'         => $post['inppild'],
                    'pil_e'         => $post['inppile'],
                    'jawaban_benar' => $post['inpjawabanbenar'],
                ];
                $this->crud->u('ujian_pilihan_ganda', $ujian_detail, ['id_ujian' => $post['inpid']]);
            }
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
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('ujian', ['id_ujian' => $post['id']]);
        // mengambil data berdasarkan jenis
        if ($result['jenis'] === 'essay') {
            $detail = $this->crud->gda('ujian_essay', ['id_ujian' => $post['id']]);
        } else if ($result['jenis'] === 'pilihan_ganda') {
            $detail = $this->crud->gda('ujian_pilihan_ganda', ['id_ujian' => $post['id']]);
        }
        $nma_file = $detail['gambar'];
        // menghapus foto yg tersimpan
        if ($nma_file !== '' || $nma_file !== null) {
            if (file_exists(upload_path('gambar') . $nma_file)) {
                unlink(upload_path('gambar') . $nma_file);
            }
        }
        $this->db->trans_start();
        $this->crud->d('ujian', $post['id'], 'id_ujian');
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
