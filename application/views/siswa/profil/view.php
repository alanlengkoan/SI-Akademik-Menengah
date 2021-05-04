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
                <div class="widget-tabs-int">
                    <div class="tab-hd">
                        <h2>Detail Profil</h2>
                    </div>
                    <div class="widget-tabs-list">
                        <ul class="nav nav-tabs tab-nav-center">
                            <li class="active"><a data-toggle="tab" href="#akun">Akun</a></li>
                            <li><a data-toggle="tab" href="#keamanan">Keamanan</a></li>
                        </ul>
                        <div class="tab-content tab-custom-st">
                            <!-- begin:: akun -->
                            <div id="akun" class="tab-pane fade in active">
                                <form id="form-akun" action="<?= siswa_url() ?>profil/ubah_akun" method="POST">
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <label class="hrzn-fm">Nama</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm" name="nama" id="nama" value="<?= $profil->nama ?>" placeholder="Masukkan nama Anda" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <label class="hrzn-fm">Username</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm" name="username" id="username" value="<?= $profil->username ?>" placeholder="Masukkan username" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center button-icon-btn button-icon-btn-cl">
                                        <button type="submit" class="btn btn-success" id="add-akun"><i class="fa fa-save"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!-- end:: akun -->
                            <!-- begin:: keamanan -->
                            <div id="keamanan" class="tab-pane fade">
                                <form id="form-keamanan" action="<?= siswa_url() ?>profil/ubah_keamanan" method="POST">
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <label class="hrzn-fm">Password Lama</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="password" class="form-control input-sm" name="password_lama" id="password_lama" placeholder="Masukkan password lama" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <label class="hrzn-fm">Password Baru</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="password" class="form-control input-sm" name="password_baru" id="password_baru" placeholder="Masukkan password baru" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <label class="hrzn-fm">Ulangi Password Baru</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="password" class="form-control input-sm" name="konfirmasi_password" id="konfirmasi_password" placeholder="Ulangi password baru" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center button-icon-btn button-icon-btn-cl">
                                        <button type="submit" class="btn btn-success" id="add-keamanan"><i class="fa fa-save"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!-- end:: keamanan -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: contents -->