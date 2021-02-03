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
                                    <h2><?= $judul ?></h2>
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
                        <h4>Pilihan Ganda</h4>
                        <hr>
                        <?php foreach ($pilihan_ganda as $key => $value) { ?>
                            <div class="row" style="padding: 10px;">
                                <div class="col-lg-6">
                                    <p style="text-align: justify;"><?= $value->soal ?></p>
                                    <div class="nk-int-st">
                                        <input type="radio" id="a" name="gender">
                                        <label for="a">A <?= $value->pil_a ?></label>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="radio" id="b" name="gender">
                                        <label for="b">B <?= $value->pil_b ?></label>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="radio" id="c" name="gender">
                                        <label for="c">C <?= $value->pil_c ?></label>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="radio" id="d" name="gender">
                                        <label for="d">D <?= $value->pil_d ?></label>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="radio" id="e" name="gender">
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
                            <div class="row" style="padding: 10px;">
                                <div class="col-lg-6">
                                    <p style="text-align: justify;"><?= $value->soal ?></p>
                                    <div class="nk-int-st">
                                        <textarea class="form-control" id="inpjawaban" name="inpjawaban" rows="3" placeholder="Jawaban Anda"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img src="<?= $value->gambar !== '' ? upload_url('gambar') . '' . $value->gambar : '//placehold.it/150'  ?>" width="300" height="300" alt="soal essay">
                                </div>
                            </div>
                        <?php } ?>
                        <hr>
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: contents -->