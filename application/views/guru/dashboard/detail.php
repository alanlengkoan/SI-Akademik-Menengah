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
        <div class="widget-tabs-int">
            <div class="widget-tabs-list">
                <ul class="nav nav-tabs tab-nav-center">
                    <li><a data-toggle="tab" href="#materi">Materi</a></li>
                    <li><a data-toggle="tab" href="#tugas">Tugas</a></li>
                    <li><a data-toggle="tab" href="#soal">Ujian</a></li>
                    <li><a data-toggle="tab" href="#hasil-tugas">Hasil Tugas</a></li>
                    <li><a data-toggle="tab" href="#hasil-ujian">Hasil Ujian</a></li>
                    <li><a data-toggle="tab" href="#siswa-ajar">Siswa Di Ajar</a></li>
                </ul>
                <div class="tab-content tab-custom-st">
                    <!-- begin:: untuk materi -->
                    <div id="materi" class="tab-pane fade">
                        <div class="row">
                            <?php if (count($materi) > 0) { ?>
                                <?php foreach ($materi as $key => $value) { ?>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xs-12">
                                        <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                                            <div class="blog-img">
                                                <img src="https://pekanbaru.imigrasi.go.id/home/wp-content/uploads/2015/11/bg-02.jpg" alt="background">
                                            </div>
                                            <div class="blog-ctn">
                                                <div class="blog-hd-sw">
                                                    <h3><?= $value->kelas ?> | Materi</h3>
                                                    <h2><i class="fa fa-book"></i>&nbsp;<?= $value->mapel ?></h2>
                                                    <h2><i class="fa fa-info-circle"></i>&nbsp;<?= $value->judul ?></h2>
                                                </div>
                                                <a href="<?= guru_url() ?>materi/detail/<?= $value->id_materi ?>" class="btn btn-success btn-block">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="alert-list">
                                        <div class="alert alert-danger alert-mg-b-0" role="alert">
                                            Materi Kosong!
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- end:: untuk materi-->
                    <!-- begin:: untuk tugas-->
                    <div id="tugas" class="tab-pane fade">
                        <div class="row">
                            <?php if (count($tugas) > 0) { ?>
                                <?php foreach ($tugas as $key => $value) { ?>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xs-12">
                                        <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                                            <div class="blog-img">
                                                <img src="https://pekanbaru.imigrasi.go.id/home/wp-content/uploads/2015/11/bg-02.jpg" alt="background">
                                            </div>
                                            <div class="blog-ctn">
                                                <div class="blog-hd-sw">
                                                    <h3><?= $value->kelas ?> | Tugas</h3>
                                                    <h2><i class="fa fa-book"></i>&nbsp;<?= $value->mapel ?></h2>
                                                    <h2><i class="fa fa-info-circle"></i>&nbsp;<?= $value->judul ?></h2>
                                                </div>
                                                <a href="<?= guru_url() ?>tugas/detail/<?= $value->id_tugas ?>" class="btn btn-success btn-block">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="alert-list">
                                        <div class="alert alert-danger alert-mg-b-0" role="alert">
                                            Tugas Kosong!
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- end:: untuk tugas -->
                    <!-- begin:: untuk soal-->
                    <div id="soal" class="tab-pane fade">
                        <div class="row">
                            <?php if (count($soal) > 0) { ?>
                                <?php foreach ($soal as $key => $value) { ?>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xs-12">
                                        <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                                            <div class="blog-img">
                                                <img src="https://pekanbaru.imigrasi.go.id/home/wp-content/uploads/2015/11/bg-02.jpg" alt="background">
                                            </div>
                                            <div class="blog-ctn">
                                                <div class="blog-hd-sw">
                                                    <h3><?= $value->kelas ?> | Soal</h3>
                                                    <h2><i class="fa fa-book"></i>&nbsp;<?= $value->mapel ?></h2>
                                                    <h2><i class="fa fa-info-circle"></i>&nbsp;<?= $value->jenis_ujian ?></h2>
                                                </div>
                                                <a href="<?= guru_url() ?>h_ujian/detail/<?= $value->id_soal ?>" class="btn btn-success btn-block">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="alert-list">
                                        <div class="alert alert-danger alert-mg-b-0" role="alert">
                                            Soal Kosong!
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- end:: untuk soal-->
                    <!-- begin:: untuk hasil tugas-->
                    <div id="hasil-tugas" class="tab-pane fade">
                        <div class="table-responsive">
                            <table id="tabel-hasil-tugas" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Jumlah Siswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($h_tugas as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->mapel ?></td>
                                            <td><?= $value->kelas ?></td>
                                            <td><?= $value->jumlah_siswa ?></td>
                                            <td>
                                                <div class="button-icon-btn">
                                                    <a href="<?= guru_url() ?>h_tugas/siswa?id_guru=<?= $value->id_guru ?>&id_kelas=<?= $value->id_kelas ?>" class="btn btn-success info-icon-notika">Lihat siswa</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end:: untuk hasil tugas-->
                    <!-- begin:: untuk hasil ujian-->
                    <div id="hasil-ujian" class="tab-pane fade">
                        <div class="table-responsive">
                            <table id="tabel-hasil-ujian" class="table table-striped">
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
                                    foreach ($h_ujian as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->mapel ?></td>
                                            <td><?= $value->kelas ?></td>
                                            <td><?= $value->jenis_ujian ?></td>
                                            <td>
                                                <div class="button-icon-btn">
                                                    <a href="<?= guru_url() ?>h_ujian/detail/<?= $value->id_soal ?>" class="btn btn-success info-icon-notika">Lihat siswa</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end:: untuk hasil ujian-->
                    <!-- begin:: untuk siswa di ajar -->
                    <div id="siswa-ajar" class="tab-pane fade">
                        <div class="table-responsive">
                            <table id="tabel-siswa-ajar" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Ortu Wali</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($siswa as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nis ?></td>
                                            <td><?= $value->siswa ?></td>
                                            <td><?= $value->kelas ?></td>
                                            <td><?= ($value->jen_kel === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
                                            <td><?= $value->ortu_wali ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end:: untuk siswa di ajar -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: contents -->