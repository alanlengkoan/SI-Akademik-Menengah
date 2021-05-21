<!-- begin:: breadcumb -->
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?= $halaman ?></h2>
                                    <p>Selamat Datang di <span class="bread-ntd"><b>AKADEMIK ONLINE Ver.1-0</b></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: breadcumb -->

<!-- begin:: contents -->
<div class="normal-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php if ($data->jenis_tugas == 'pekerjaan_sekolah') { ?>
                    <?php if ($status == 0) { ?>
                        <button type="button" class="btn btn-success btn-block" id="absen" data-id_materi="<?= $data->id_materi ?>" data-id_siswa="<?= $id_siswa ?>">Absen</button>
                    <?php } else { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            Berhasil, melakukan Absen!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="mybox mg-t-30">
                    <div class="bsc-tbl">
                        <h2>Chat Room</h2>
                        <hr>
                        <div class="chat-conversation">
                            <div class="widgets-chat-scrollbar">
                                <!-- begin:: chat -->
                                <div id="dom_chat"></div>
                                <!-- end:: chat -->
                            </div>
                            <?php if ($data->status === '1') { ?>
                                <div class="chat-widget-input">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 chat-inputbar">
                                            <form id="form-add" action="<?= siswa_url() ?>materi/sent_chat" method="POST">
                                                <input type="hidden" name="id_materi" value="<?= $data->id_materi ?>" />

                                                <div class="form-group todo-flex">
                                                    <div class="nk-int-st">
                                                        <input type="text" name="pesan" id="pesan" class="form-control chat-input" placeholder="Masukkan Pesan Anda">
                                                    </div>
                                                    <div class="chat-send">
                                                        <button type="submit" id="kirim" class="btn btn-md btn-primary btn-block notika-chat-btn">Kirim</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="mybox mg-t-30">
                    <div class="bsc-tbl">
                        <h2><?= $halaman ?></h2>
                        <hr>
                        <p><?= $data->judul ?></p>
                        <?php if ($data->jenis_tugas == 'pekerjaan_sekolah') { ?>
                            <a <?= ($data->jam_mulai >= date('H:i:s') || $data->jam_selesai <= date('H:i:s') ? 'disabled' : 'href="' . siswa_url() . '/tugas/detail/' . $data->id_tugas . '"') ?> class="btn btn-info btn-block">Tugas Latihan</a>
                        <?php } ?>
                        <hr>
                        <?php if ($data->tipe === 'pdf') { ?>
                            <embed style="height: 500px;" src="<?= upload_url('pdf') ?><?= $data->file ?>" type="application/pdf" frameBorder="0" scrolling="auto" height="100%" width="100%"></embed>
                        <?php } else if ($data->tipe === 'mp4') { ?>
                            <video style="max-width: 100%; height: auto;" controls>
                                <source src="<?= upload_url('mp4') ?><?= $data->file ?>" type="video/mp4">
                            </video>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: contents -->