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
                <!-- begin:: form -->
                <div class="mybox mg-t-30">
                    <div class="bsc-tbl">
                        <div class="button-icon-btn button-icon-btn-cl">
                            <?= $halaman ?>
                        </div>
                        <hr>
                        <form id="form-add" action="<?= guru_url() ?>materi/process_add" method="POST" enctype="multipart/form-data">
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Mata Pelajaran</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="nk-int-st">
                                                <select class="selectpicker" id="inppenugasan" name="inppenugasan">
                                                    <option value="">- Pilih -</option>
                                                    <?php foreach ($mapel as $key => $value) { ?>
                                                        <option value="<?= $value->id_penugasan_guru ?>">(<?= $value->kelas ?>) <?= $value->mapel ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Judul</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="inpjudul" id="inpjudul" placeholder="Masukkan Judul" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center button-icon-btn button-icon-btn-cl">
                                <button type="submit" class="btn btn-success" name="add" id="add"><i class="fa fa-save"></i></button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end:: form -->
            </div>
        </div>
    </div>
</div>
<!-- end:: contents -->