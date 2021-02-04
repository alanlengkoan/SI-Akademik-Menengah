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
                                                <?= $detail->nama ?>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mybox mg-t-30">
                    <div class="bsc-tbl">
                        <form id="form-add" action="<?= siswa_url() ?>ujian/jawab" method="POST">
                            <input type="hidden" name="id_soal" value="<?= $detail->id_soal ?>">

                            <h4>Pilihan Ganda</h4>
                            <hr>
                            <?php foreach ($pilihan_ganda as $key => $value) { ?>
                                <input type="hidden" name="inpidujian_pil_gan[]" value="<?= $value->id_ujian ?>">
                                <div class="row" style="padding: 10px;">
                                    <div class="col-lg-6">
                                        <p style="text-align: justify;"><?= $value->soal ?></p>
                                        <div class="nk-int-st">
                                            <input type="radio" id="a" name="<?= $key ?>_inpjawaban_pil_gan" value="1">
                                            <label for="a">A <?= $value->pil_a ?></label>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="radio" id="b" name="<?= $key ?>_inpjawaban_pil_gan" value="2">
                                            <label for="b">B <?= $value->pil_b ?></label>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="radio" id="c" name="<?= $key ?>_inpjawaban_pil_gan" value="3">
                                            <label for="c">C <?= $value->pil_c ?></label>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="radio" id="d" name="<?= $key ?>_inpjawaban_pil_gan" value="4">
                                            <label for="d">D <?= $value->pil_d ?></label>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="radio" id="e" name="<?= $key ?>_inpjawaban_pil_gan" value="5">
                                            <label for="e">E <?= $value->pil_e ?></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="<?= $value->gambar !== '' ? upload_url('gambar') . '' . $value->gambar : '//placehold.it/150'  ?>" width="300" height="300" alt="soal pilihan ganda">
                                    </div>
                                </div>
                            <?php } ?>
                            <h4>Essay</h4>
                            <hr>
                            <?php foreach ($essay as $key => $value) { ?>
                                <input type="hidden" name="inpidujian_esssay[]" value="<?= $value->id_ujian ?>">
                                <div class="row" style="padding: 10px;">
                                    <div class="col-lg-6">
                                        <p style="text-align: justify;"><?= $value->soal ?></p>
                                        <div class="nk-int-st">
                                            <textarea class="form-control" name="<?= $key ?>_inpjawaban_essay" rows="3" placeholder="Jawaban Anda" required="required"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="<?= $value->gambar !== '' ? upload_url('gambar') . '' . $value->gambar : '//placehold.it/150'  ?>" width="300" height="300" alt="soal essay">
                                    </div>
                                </div>
                            <?php } ?>
                            <hr>
                            <button type="submit" id="add" class="btn btn-success btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: contents -->