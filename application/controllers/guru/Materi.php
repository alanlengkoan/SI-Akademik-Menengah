<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends MY_Controller
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
        $this->load->model('m_mapel');
        $this->load->model('m_materi');
        $this->load->model('m_chat');
        $this->load->model('m_absen');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Materi',
            'menu'    => 'materi',
            'data'    => $this->m_materi->getKelasSiswa($this->users->id_users),
            'content' => 'guru/materi/view',
            'css'     => '',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk tambah
    public function add()
    {
        $data = [
            'halaman' => 'Tambah Materi',
            'menu'    => 'materi',
            'content' => 'guru/materi/add',
            'mapel'   => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
            'css'     => '',
            'js'      => 'guru/materi/js/add'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk tambah
    public function upd()
    {
        $id_materi = base64url_decode($this->uri->segment('4'));

        $data = [
            'halaman' => 'Tambah Materi',
            'menu'    => 'materi',
            'mapel'   => $this->m_mapel->getWhereMapelGuru($this->users->id_users),
            'materi'  => $this->m_materi->getWhereDetail($id_materi),
            'detail'  => $this->m_materi->getWhereMateriDetail($id_materi),
            'content' => 'guru/materi/upd',
            'css'     => '',
            'js'      => 'guru/materi/js/upd'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk detail
    public function detail($id)
    {
        $data = [
            'halaman' => 'Detail Materi',
            'menu'    => '',
            'content' => 'guru/materi/detail',
            'materi'  => $this->m_materi->getDetailMateriKelas($id),
            'detail'  => $this->m_materi->getWhereMateriDetail($id),
            'absen'   => $this->m_absen->getDetailAbsen($id),
            'css'     => 'guru/materi/css/detail',
            'js'      => 'guru/materi/js/detail'
        ];
        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk detail materi
    public function info()
    {
        $id_guru  = $this->input->get('id_guru');
        $id_kelas = $this->input->get('id_kelas');
        $id_mapel = $this->input->get('id_mapel');

        $data = [
            'halaman'     => 'Detail Materi',
            'menu'        => 'materi',
            'content'     => 'guru/materi/info',
            'data'        => $this->m_materi->getAllMateriSiswa($id_guru, $id_kelas, $id_mapel),
            'css'         => '',
            'js'          => 'guru/materi/js/info'
        ];

        // untuk load view
        $this->load->view('guru/base', $data);
    }

    // untuk load chat room
    public function load_chat($id)
    {
        $data = [
            'id_users' => $this->users->id_users,
            'chat'     => $this->m_chat->getDetailChat($id)
        ];
        // untuk load view
        $this->load->view('guru/materi/chat', $data);
    }

    // untuk upload
    public function upload()
    {
        $post = $this->input->post(NULL, TRUE);

        $config['upload_path']   = './' . upload_path('file');
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['encrypt_name']  = TRUE;
        $config['overwrite']     = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            // apa bila gagal
            $error = array('error' => $this->upload->display_errors());

            echo strip_tags($error['error']);
        } else {
            // apa bila berhasil
            $detailFile = $this->upload->data();

            $pesan = '<a href="' . upload_url('file') . '' . $detailFile['file_name'] . '" target="_blank">' . $detailFile['file_name'] . '</a>';

            $data = [
                'id_forum'  => acak_id('forum', 'id_forum'),
                'id_materi' => $post['id_materi'],
                'id_users'  => $this->users->id_users,
                'level'     => $this->users->role,
                'pesan'     => $pesan,
            ];
            $this->db->trans_start();
            $this->crud->i('forum', $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                echo 'gagal';
            } else {
                $this->load_chat($data['id_materi']);
            }
        }
    }

    // untuk sent chat room
    public function sent_chat()
    {
        $post = $this->input->post(NULL, TRUE);

        $data = [
            'id_forum'  => acak_id('forum', 'id_forum'),
            'id_materi' => $post['id_materi'],
            'id_users'  => $this->users->id_users,
            'level'     => $this->users->role,
            'pesan'     => $this->_parsingPesan($post['pesan']),
        ];
        $this->db->trans_start();
        $this->crud->i('forum', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo 'gagal';
        } else {
            $this->load_chat($data['id_materi']);
        }
    }

    // untuk proses update chat
    public function upd_chat()
    {
        $post   = $this->input->post(NULL, TRUE);
        $status = ($post['value'] === '1' ? '0' : '1');
        $data = [
            'status' => $status,
        ];
        $this->db->trans_start();
        $this->crud->u('materi', $data, ['id_materi' => $post['id']]);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk proses update materi
    public function upd_materi()
    {
        $post   = $this->input->post(NULL, TRUE);
        $status = ($post['value'] === '1' ? '0' : '1');
        $data = [
            'status_materi' => $status,
        ];
        $this->db->trans_start();
        $this->crud->u('materi', $data, ['id_materi' => $post['id']]);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk proses tambah data
    public function process_add()
    {
        $post = $this->input->post(NULL, TRUE);

        $data = [
            'id_materi'         => acak_id('materi', 'id_materi'),
            'id_penugasan_guru' => $post['inppenugasan'],
            'judul'             => $post['inpjudul'],
            'pertemuan'         => $post['inppertemuan'],
        ];
        $this->db->trans_start();
        $this->crud->i('materi', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!', 'id_materi' => base64url_encode($data['id_materi'])];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk proses ubah data
    public function process_upd()
    {
        $post = $this->input->post(NULL, TRUE);

        $id_materi = $this->uri->segment('4');

        $data = [
            'id_penugasan_guru' => $post['inppenugasan'],
            'judul'             => $post['inpjudul'],
            'pertemuan'         => $post['inppertemuan'],
        ];
        $this->db->trans_start();
        $this->crud->u('materi', $data, ['id_materi' => $id_materi]);
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
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('materi', ['id_materi' => $post['id']]);
        $nma_file = $result['file'];
        // menghapus foto yg tersimpan
        if ($nma_file !== '' || $nma_file !== null) {
            if ($result['tipe'] === 'pdf') {
                if (file_exists(upload_path('pdf') . $result['file'])) {
                    unlink(upload_path('pdf') . $result['file']);
                }
            } else {
                if (file_exists(upload_path('mp4') . $result['file'])) {
                    unlink(upload_path('mp4') . $result['file']);
                }
            }
        }
        $this->db->trans_start();
        $this->crud->d('materi', $post['id'], 'id_materi');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal Hapus!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Hapus!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk get data by id
    public function get_detail()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('materi_detail', ['id_materi_detail' => $post['id']]);
        $data = [
            'id_materi_detail' => $result['id_materi_detail'],
            'id_materi'        => $result['id_materi'],
            'tipe'             => $result['tipe'],
            'file'             => $result['file'],
        ];
        // untuk load view
        $this->load->view('guru/materi/upd_detail', $data);
    }

    // untuk proses tambah data detail
    public function process_add_detail()
    {
        $post = $this->input->post(NULL, TRUE);

        if ($post['inptipe'] === 'pdf') {
            $config['upload_path']   = './' . upload_path('pdf');
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name']  = TRUE;
            $config['overwrite']     = TRUE;
        } else {
            $config['upload_path']   = './' . upload_path('mp4');
            $config['allowed_types'] = 'mp4';
            $config['encrypt_name']  = TRUE;
            $config['overwrite']     = TRUE;
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('inpfile')) {
            // apa bila gagal
            $error = array('error' => $this->upload->display_errors());

            $response = ['title' => 'Gagal!', 'text' => strip_tags($error['error']), 'type' => 'error', 'button' => 'Ok!'];
        } else {
            // apa bila berhasil
            $detailFile = $this->upload->data();

            $data = [
                'id_materi_detail' => acak_id('materi_detail', 'id_materi_detail'),
                'id_materi'        => $post['inpidmateri'],
                'tipe'             => $post['inptipe'],
                'file'             => $detailFile['file_name'],
            ];
            $this->db->trans_start();
            $this->crud->i('materi_detail', $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
            } else {
                $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!', 'id_materi' => base64url_encode($data['id_materi'])];
            }
        }
        // untuk response json
        $this->_response($response);
    }

    public function process_upd_detail()
    {
        $post = $this->input->post(NULL, TRUE);
        $file = $_FILES['inpfile']['name'];

        $result = $this->crud->gda('materi_detail', ['id_materi_detail' => $post['inpid']]);

        if ($file) {
            if ($post['inptipe'] === 'pdf') {
                $config['upload_path']   = './' . upload_path('pdf');
                $config['allowed_types'] = 'pdf';
                $config['encrypt_name']  = TRUE;
                $config['overwrite']     = TRUE;
            } else {
                $config['upload_path']   = './' . upload_path('mp4');
                $config['allowed_types'] = 'mp4';
                $config['encrypt_name']  = TRUE;
                $config['overwrite']     = TRUE;
            }

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('inpfile')) {
                // apa bila gagal
                $error = array('error' => $this->upload->display_errors());

                $response = ['title' => 'Gagal!', 'text' => strip_tags($error['error']), 'type' => 'error', 'button' => 'Ok!'];
            } else {
                // apa bila berhasil
                $detailFile = $this->upload->data();

                // menghapus foto yg tersimpan
                if ($post['inptipe'] === 'pdf') {
                    unlink(upload_path('pdf') . $result['file']);
                } else {
                    unlink(upload_path('mp4') . $result['file']);
                }

                $data = [
                    'tipe'              => $post['inptipe'],
                    'file'              => $detailFile['file_name'],
                ];
                $this->db->trans_start();
                $this->crud->u('materi_detail', $data, ['id_materi_detail' => $post['inpid']]);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
                } else {
                    $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
                }
            }
        } else {
            $data = [
                'judul'             => $post['inpjudul'],
                'tipe'              => $post['inptipe'],
            ];
            $this->db->trans_start();
            $this->crud->u('materi_detail', $data, ['id_materi_detail' => $post['inpid']]);
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

    // untuk proses hapus data detail
    public function process_del_detail()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('materi_detail', ['id_materi_detail' => $post['id']]);
        $nma_file = $result['file'];
        // menghapus foto yg tersimpan
        if ($nma_file !== '' || $nma_file !== null) {
            if ($result['tipe'] === 'pdf') {
                if (file_exists(upload_path('pdf') . $result['file'])) {
                    unlink(upload_path('pdf') . $result['file']);
                }
            } else {
                if (file_exists(upload_path('mp4') . $result['file'])) {
                    unlink(upload_path('mp4') . $result['file']);
                }
            }
        }
        $this->db->trans_start();
        $this->crud->d('materi_detail', $post['id'], 'id_materi_detail');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal Hapus!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Hapus!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    public function _parsingPesan(string $pesan)
    {
        $cek_pesan = stristr($pesan, 'http://') ?: stristr($pesan, 'https://');

        if ($cek_pesan !== false) {
            $cari = $cek_pesan;

            if ($cek_pesan == trim($cek_pesan) && strpos($cek_pesan, ' ') !== false) {
                $array_link = explode(" ", $cek_pesan);

                for ($i = 0; $i < count($array_link); $i++) {
                    $parsing_link[] = '<a href="' . $array_link[$i] . '" target="_blank">' . $array_link[$i] . '</a>';
                }

                $ganti = implode(" ", $parsing_link);
            } else {
                $ganti = '<a href="' . $cek_pesan . '" target="_blank">' . $cek_pesan . '</a>';
            }

            $result = str_replace($cari, $ganti, $pesan);
        } else {
            $result = $pesan;
        }

        return $result;
    }
}
