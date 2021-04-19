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
                        <?= $halaman ?>
                        <hr>
                        <!-- begin:: calender -->
                        <div id='calendar'></div>
                        <!-- end:: calender -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data as $key => $value) { ?>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xs-12">
                    <div class="blog-inner-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="blog-img">
                            <img src="<?= $value->gambar !== null ? upload_url('gambar') . '' . $value->gambar : '//placehold.it/790'  ?>" alt="<?= $value->judul ?>">
                        </div>
                        <div class="blog-ctn">
                            <div class="blog-hd-sw">
                                <h2><?= $value->judul ?></h2>
                                By Admin on <?= $value->tgl_post ?>
                            </div>
                            <p><?= $value->isi ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- end:: contents -->