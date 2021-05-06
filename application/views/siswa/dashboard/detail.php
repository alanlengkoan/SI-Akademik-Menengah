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
            <?php foreach ($materi as $key => $value) { ?>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xs-12">
                    <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="blog-img">
                            <img src="https://pekanbaru.imigrasi.go.id/home/wp-content/uploads/2015/11/bg-02.jpg" alt="background">
                        </div>
                        <div class="blog-ctn">
                            <div class="blog-hd-sw">
                                <h3><?= $value->kelas ?> | Materi</h3>
                                <h2><i class="fa fa-user"></i>&nbsp;<?= $value->guru ?></h2>
                                <h2><i class="fa fa-book"></i>&nbsp;<?= $value->mapel ?></h2>
                                <h2><i class="fa fa-info-circle"></i>&nbsp;<?= $value->judul ?></h2>
                            </div>
                            <a href="<?= siswa_url() ?>materi/detail/<?= $value->id_materi ?>" class="btn btn-success btn-block">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <?php foreach ($tugas as $key => $value) { ?>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xs-12">
                    <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="blog-img">
                            <img src="https://pekanbaru.imigrasi.go.id/home/wp-content/uploads/2015/11/bg-02.jpg" alt="background">
                        </div>
                        <div class="blog-ctn">
                            <div class="blog-hd-sw">
                                <h3><?= $value->kelas ?> | Tugas Rumah</h3>
                                <h2><i class="fa fa-user"></i>&nbsp;<?= $value->guru ?></h2>
                                <h2><i class="fa fa-book"></i>&nbsp;<?= $value->mapel ?></h2>
                                <h2><i class="fa fa-info-circle"></i>&nbsp;<?= $value->judul ?></h2>
                            </div>
                            <a href="<?= siswa_url() ?>tugas/detail/<?= $value->id_tugas ?>" class="btn btn-success btn-block">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
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
                            <a href="<?= siswa_url() ?>ujian" class="btn btn-success btn-block">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- end:: contents -->