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
                        <h4>Detail <?= $halaman ?></h4>
                        <hr>
                        <div class="form-example-wrap mg-t-30">
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Mata Pelajaran</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <?= $detail->mapel ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Jenis Ujian</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <?= $detail->jenis_ujian ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Nama</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <?= $siswa->siswa ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Kelas</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <?= $siswa->kelas ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Nilai Minimum</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <?= $detail->nilai ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Nilai Anda</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <?= $nilai ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mybox mg-t-30">
                    <div class="bsc-tbl">
                        <form id="form-add" action="<?= guru_url() ?>h_ujian/add_nilai" method="POST">
                            <input type="hidden" name="id_siswa" value="<?= $siswa->id_siswa ?>">

                            <?php if (count($pilihan_ganda) !== 0) { ?>
                                <h4>Pilihan Ganda</h4>
                                <hr>
                                <?php foreach ($pilihan_ganda as $key => $value) {
                                    $jawaban = ['Tidak di jawab', 'A', 'B', 'C', 'D', 'E'];
                                ?>
                                    <div class="row" style="padding: 10px;">
                                        <div class="col-lg-6">
                                            <h4>Soal</h4>
                                            <p style="text-align: justify;"><?= $value->soal ?></p>
                                            <h4>Jawaban Benar</h4>
                                            <p style="text-align: justify;"><?= $jawaban[$value->jawaban_benar] ?></p>
                                            <h4>Jawaban Siswa</h4>
                                            <p style="text-align: justify;"><?= $jawaban[$value->jawaban] ?></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="<?= $value->gambar !== '' ? upload_url('gambar') . '' . $value->gambar : '//placehold.it/150'  ?>" width="300" height="300" alt="soal pilihan ganda">
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <?php if (count($essay) !== 0) { ?>
                                <h4>Essay</h4>
                                <hr>
                                <?php foreach ($essay as $key => $value) { ?>
                                    <input type="hidden" name="inp_id_ujian_essay[]" value="<?= $value->id_ujian ?>">
                                    <div class="row" style="padding: 10px;">
                                        <div class="col-lg-6">
                                            <h4>Soal</h4>
                                            <p style="text-align: justify;"><?= $value->soal ?></p>
                                            <h4>Jawaban Benar</h4>
                                            <p style="text-align: justify;"><?= $value->jawaban_benar ?></p>
                                            <h4>Jawaban Siswa</h4>
                                            <p style="text-align: justify;"><?= ($value->jawaban === '' ? 'Tidak di jawab' : $value->jawaban) ?></p>
                                            <div class="form-example-int form-horizental">
                                                <div class="form-group">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm" name="<?= $key ?>_inpnilai" id="inpnilai" required="required" value="<?= $value->nilai ?>" placeholder="Masukkan Nilai" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="<?= $value->gambar !== '' ? upload_url('gambar') . '' . $value->gambar : '//placehold.it/150'  ?>" width="300" height="300" alt="soal essay">
                                        </div>
                                    </div>
                                <?php } ?>
                                <hr>
                                <button type="submit" id="add" class="btn btn-success btn-block">Submit</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: contents -->