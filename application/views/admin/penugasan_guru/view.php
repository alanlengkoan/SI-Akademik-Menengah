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
                        <div class="button-icon-btn button-icon-btn-cl">
                            <button type="button" class="btn btn-primary primary-icon-notika btn-cl" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i></button>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Guru Pengajar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->kelas ?></td>
                                            <td><?= $value->pelajaran ?></td>
                                            <td><?= $value->guru ?></td>
                                            <td>
                                                <div class="button-icon-btn button-icon-btn-cl">
                                                    <button type="button" id="btn-upd" data-id="<?= $value->id ?>" class="btn btn-info info-icon-notika" data-toggle="modal" data-target="#modalUpd"><i class="fa fa-pencil"></i></button>
                                                    <button type="button" id="btn-del" data-id="<?= $value->id ?>" class="btn btn-warning warning-icon-notika"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
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
                <h2>Tambah Siswa</h2>

                <form id="form-add" action="<?= admin_url() ?>penugasan_guru/process_add" method="POST">
                    <div class="form-example-int form-horizental mg-t-15">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Kelas</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="nk-int-st">
                                        <select class="selectpicker" id="inpkelas" name="inpkelas">
                                            <option value="">- Pilih -</option>
                                            <?php foreach ($kelas as $key => $value) { ?>
                                                <option value="<?= $value->id ?>"><?= $value->kelas ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int form-horizental mg-t-15">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Mata Pelajaran</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="nk-int-st">
                                        <select class="selectpicker" id="inpmapel" name="inpmapel">
                                            <option value="">- Pilih -</option>
                                            <?php foreach ($mapel as $key => $value) { ?>
                                                <option value="<?= $value->id ?>"><?= $value->pelajaran ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int form-horizental mg-t-15">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Guru</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="nk-int-st">
                                        <select class="selectpicker" id="inpguru" name="inpguru">
                                            <option value="">- Pilih -</option>
                                            <?php foreach ($guru as $key => $value) { ?>
                                                <option value="<?= $value->id ?>"><?= $value->nama ?></option>
                                            <?php } ?>
                                        </select>
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
    </div>
</div>
<!-- end:: modal tambah -->

<!-- begin:: modal ubah -->
<div class="modal fade" id="modalUpd" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-body">
                <h2>Ubah Siswa</h2>

                <!-- begin:: form ubah -->
                <div id="get-form-upd"></div>
                <!-- end:: form ubah -->
            </div>
        </div>
    </div>
</div>
<!-- end:: modal ubah -->