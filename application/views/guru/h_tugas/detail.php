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
                <div class="mybox mg-t-30">
                    <div class="bsc-tbl">
                        <h2><?= $halaman ?></h2>
                        <hr>
                        <p><?= $data->judul ?></p>

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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mybox mg-t-30">
                    <div class="bsc-tbl">
                        <?php if ($data->status === '1') { ?>
                            <h2>File Tugas</h2>
                            <hr>
                            <?php if (getExtension($hasil_tugas->jawaban) === 'pdf') { ?>
                                <embed style="height: 500px;" src="<?= upload_url('pdf') ?><?= $hasil_tugas->jawaban ?>" type="application/pdf" frameBorder="0" scrolling="auto" height="100%" width="100%"></embed>
                            <?php } else { ?>
                                <iframe style=" width: 100%; height: 500px;" src="https://docs.google.com/gview?url=<?= upload_url('pdf') ?><?= $hasil_tugas->jawaban ?>&embedded=true" frameborder="0"></iframe>
                            <?php } ?>
                        <?php } else { ?>
                            <h2>Upload Tugas</h2>
                            <hr>
                            <form action="<?= siswa_url() ?>tugas/upload" class="dropzone dropzone-nk" id="formAdd">
                                <div id="dropzone1" class="multi-uploader-cs">
                                    <div class="dz-message needsclick download-custom">
                                        <i class="notika-icon notika-cloud"></i>
                                        <h2>Silahkan upload!</h2>
                                        <p>Silahkan upload file tugas Anda disini.</p>
                                    </div>
                                </div>
                            </form>

                            <div style="padding-top: 10px;">
                                <p>File dengan tipe (*.pdf)</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mybox mg-t-30">
                    <div class="bsc-tbl">
                        <form id="form-add" action="<?= guru_url() ?>h_tugas/add_nilai" method="POST">
                            <input type="hidden" name="id_tugas" value="<?= $data->id_tugas ?>">
                            <input type="hidden" name="id_siswa" value="<?= $siswa->id_siswa ?>">

                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="inpnilai" id="inpnilai" required="required" value="<?= $hasil_tugas->nilai ?>" placeholder="Masukkan Nilai" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="add" class="btn btn-success btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: contents -->