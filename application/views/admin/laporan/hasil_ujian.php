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
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Jenis Ujian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->mapel ?></td>
                                            <td><?= $value->kelas ?></td>
                                            <td><?= $value->jenis_ujian ?></td>
                                            <td>
                                                <div class="button-icon-btn">
                                                    <a href="<?= admin_url() ?>laporan/hasil_ujian_detail/<?= $value->id_soal ?>" class="btn btn-success info-icon-notika">Lihat siswa</a>
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