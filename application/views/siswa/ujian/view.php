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
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Guru</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $key => $value) {
                                        $status = [
                                            'alert' => [
                                                'warning',
                                                'info',
                                            ],
                                            'label' => [
                                                'Belum dikerjakan',
                                                'Telah dikerjakan',
                                            ],
                                        ];
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->guru ?></td>
                                            <td><?= $value->mapel ?></td>
                                            <td><a href="#" class="btn btn-<?= $status['alert'][$value->status] ?> info-icon-notika"><?= $status['label'][$value->status] ?></a></td>
                                            <td>
                                                <div class="button-icon-btn">
                                                    <?php if ($value->status == 1) { ?>
                                                        <a href="<?= siswa_url() ?>ujian/hasil/<?= $value->id_soal ?>" class="btn btn-primary info-icon-notika">Hasil Ujian</a>
                                                    <?php } else { ?>
                                                        <a href="<?= siswa_url() ?>ujian/soal/<?= $value->id_soal ?>" class="btn btn-info info-icon-notika">Kerjakan Ujian</a>
                                                    <?php } ?>
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
    <!-- end:: contents -->

    <!-- begin:: modal tambah -->
    <div class="modal fade" id="modalAdd" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Tambah <?= $halaman ?></h2>

                    <form id="form-add" action="<?= guru_url() ?>ujian/process_add" method="POST" enctype="multipart/form-data">
                        <div class="form-example-int form-horizental">
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
                                                    <option value="<?= $value->id_mapel ?>"><?= $value->nama ?></option>
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
                                        <label class="hrzn-fm">Jenis Soal</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <div class="nk-int-st">
                                            <select class="selectpicker" id="inpjenis" name="inpjenis">
                                                <option value="">- Pilih -</option>
                                                <option value="essay">Essay</option>
                                                <option value="pilihan_ganda">Pilihan Ganda</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- begin:: jenis ujian -->
                        <div id="jenis-ujian"></div>
                        <!-- end:: jenis ujian -->
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
                    <h2>Ubah <?= $halaman ?></h2>

                    <!-- begin:: form ubah -->
                    <div id="get-form-upd"></div>
                    <!-- end:: form ubah -->
                </div>
            </div>
        </div>
    </div>
    <!-- end:: modal ubah -->