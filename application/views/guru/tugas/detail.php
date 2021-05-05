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
                        <p><?= $data->judul ?></p>

                        <?php if ($data->tipe === 'pdf') { ?>
                            <embed style="height: 500px;" src="<?= upload_url('pdf') ?><?= $data->file ?>" type="application/pdf" frameBorder="0" scrolling="auto" height="100%" width="100%"></embed>
                        <?php } else if ($data->tipe === 'mp4') { ?>
                            <video style="max-width: 100%; height: auto;" controls>
                                <source src="<?= upload_url('mp4') ?><?= $data->file ?>" type="video/mp4">
                            </video>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: contents -->