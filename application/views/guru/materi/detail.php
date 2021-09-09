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
                            <?php if ($materi->status === '1') { ?>
                                <div class="chat-widget-input">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 chat-inputbar">
                                            <form id="form-add" action="<?= guru_url() ?>materi/sent_chat" method="POST">
                                                <input type="hidden" name="id_materi" value="<?= $materi->id_materi ?>" />

                                                <div class="form-group todo-flex">
                                                    <div class="nk-int-st">
                                                        <input type="text" name="pesan" id="pesan" class="form-control chat-input" placeholder="Masukkan Pesan Anda">
                                                    </div>
                                                    <div class="chat-send">
                                                        <button type="button" class="btn btn-md btn-primary notika-chat-btn" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-paperclip"></i></button>
                                                        <button type="submit" id="kirim" class="btn btn-md btn-primary notika-chat-btn">Kirim</button>
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
                        <p><?= $materi->pertemuan ?> | <?= $materi->judul ?></p>

                        <?php foreach ($detail as $value) { ?>
                            <?php if ($value->tipe === 'pdf') { ?>
                                <embed style="height: 500px;" src="<?= upload_url('pdf') ?><?= $value->file ?>" type="application/pdf" frameBorder="0" scrolling="auto" height="100%" width="100%"></embed>
                                <hr>
                            <?php } else if ($value->tipe === 'mp4') { ?>
                                <video style="max-width: 100%; height: auto;" controls>
                                    <source src="<?= upload_url('mp4') ?><?= $value->file ?>" type="video/mp4">
                                </video>
                                <hr>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mybox mg-t-30">
                    <div class="bsc-tbl">
                        <h2>Absen</h2>
                        <hr>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Siswa</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($absen as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama ?></td>
                                            <td><?= date("d-m-Y", strtotime($value->waktu)) ?></td>
                                            <td><?= date("H:i:s", strtotime($value->waktu)) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: contents -->

<!-- begin:: modal tambah -->
<div class="modal fade" id="modalAdd" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?= guru_url() ?>materi/upload" class="dropzone dropzone-nk" id="formAdd">
                    <div id="dropzone1" class="multi-uploader-cs">
                        <div class="dz-message needsclick download-custom">
                            <i class="notika-icon notika-cloud"></i>
                            <h2>Silahkan upload!</h2>
                            <p>Silahkan upload file tugas Anda disini.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end:: modal tambah -->