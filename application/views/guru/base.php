<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-learning - AKADEMIK - SMTK Mamasa</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?= assets_url() ?>logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/owl.theme.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/owl.transitions.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/wave/waves.min.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/wave/button.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/meanmenu/meanmenu.min.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/animate.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/normalize.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/notika-custom-icon.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/wave/waves.min.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/dialog/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/dialog/dialog.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/datapicker/datepicker3.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/main.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/style.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" href="<?= assets_url() ?>admin/css/responsive.css">

    <!-- begin:: css local -->
    <?php empty($css) ? '' : $this->load->view($css); ?>
    <!-- end:: css local -->

    <script src="<?= assets_url() ?>admin/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- begin:: header -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="<?= assets_url() ?>admin/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: header -->

    <!-- begin:: mobile menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li>
                                    <a data-toggle="collapse" data-target="#dashboard" href="#">Dashboard</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="<?= guru_url() ?>dashboard">Dashboard</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a data-toggle="collapse" data-target="#pustaka" href="#">Pustaka</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="<?= guru_url() ?>siswa_pengajar">Siswa Pengajar</a></li>
                                        <li><a href="<?= guru_url() ?>siswa_wali">Siswa Wali</a></li>
                                        <li><a href="<?= guru_url() ?>materi">Materi</a></li>
                                        <li><a href="<?= guru_url() ?>tugas">Tugas</a></li>
                                        <li><a href="<?= guru_url() ?>ujian">Ujian</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?= logout_url() ?>"><i class="fa fa-close"></i> Logout </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: mobil menu end -->

    <!-- begin:: main menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="<?= ($this->uri->segment(2) == 'dashboard' ? 'active' : '') ?>">
                            <a data-toggle="tab" href="#dashboard">
                                <i class="fa fa-home"></i> Dashboard
                            </a>
                        </li>
                        <li class="<?= ($this->uri->segment(2) == 'siswa_pengajar' || $this->uri->segment(2) == 'siswa_wali' || $this->uri->segment(2) == 'materi' || $this->uri->segment(2) == 'tugas' || $this->uri->segment(2) == 'ujian' || $this->uri->segment(2) == 'soal' ? 'active' : '') ?>">
                            <a data-toggle="tab" href="#pustaka">
                                <i class="fa fa-archive"></i> Pustaka
                            </a>
                        </li>
                        <li class="<?= ($this->uri->segment(2) == 'h_tugas' || $this->uri->segment(2) == 'h_ujian' ? 'active' : '') ?>">
                            <a data-toggle="tab" href="#hasil">
                                <i class="fa fa-file"></i> Hasil
                            </a>
                        </li>
                        <li>
                            <a href="<?= logout_url() ?>"><i class="fa fa-sign-out"></i> Logout </a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="dashboard" class="<?= ($this->uri->segment(2) == 'dashboard' ? 'active' : '') ?> tab-pane in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?= guru_url() ?>dashboard">Dashboard</a></li>
                            </ul>
                        </div>
                        <div id="hasil" class="<?= ($this->uri->segment(2) == 'h_tugas' || $this->uri->segment(2) == 'h_ujian' ? 'active' : '') ?> tab-pane in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?= guru_url() ?>h_tugas">Tugas</a></li>
                                <li><a href="<?= guru_url() ?>h_ujian">Ujian</a></li>
                            </ul>
                        </div>
                        <div id="pustaka" class="<?= ($this->uri->segment(2) == 'siswa_pengajar' || $this->uri->segment(2) == 'siswa_wali' || $this->uri->segment(2) == 'materi' || $this->uri->segment(2) == 'tugas' || $this->uri->segment(2) == 'ujian' || $this->uri->segment(2) == 'soal' ? 'active' : '') ?> tab-pane in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?= guru_url() ?>siswa_pengajar">Siswa Pengajar</a></li>
                                <li><a href="<?= guru_url() ?>siswa_wali">Siswa Wali</a></li>
                                <li><a href="<?= guru_url() ?>materi">Materi</a></li>
                                <li><a href="<?= guru_url() ?>tugas">Tugas</a></li>
                                <li><a href="<?= guru_url() ?>ujian">Ujian</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: main menu area End-->

    <!-- begin:: content -->
    <?php $this->load->view($content); ?>
    <!-- end:: content -->

    <!-- begin:: footer -->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            <a href="https://alanlengkoan.netlify.app/" target="_blank">AL</a> - Sistem Informasi Akademik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: footer -->

    <script src="<?= assets_url() ?>admin/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= assets_url() ?>admin/js/bootstrap.min.js"></script>
    <script src="<?= assets_url() ?>admin/js/wow.min.js"></script>
    <script src="<?= assets_url() ?>admin/js/jquery.scrollUp.min.js"></script>
    <script src="<?= assets_url() ?>admin/js/meanmenu/jquery.meanmenu.js"></script>
    <script src="<?= assets_url() ?>admin/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?= assets_url() ?>admin/js/counterup/waypoints.min.js"></script>
    <script src="<?= assets_url() ?>admin/js/counterup/counterup-active.js"></script>
    <script src="<?= assets_url() ?>admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= assets_url() ?>admin/js/todo/jquery.todo.js"></script>
    <script src="<?= assets_url() ?>admin/js/plugins.js"></script>
    <script src="<?= assets_url() ?>admin/js/wave/waves.min.js"></script>
    <script src="<?= assets_url() ?>admin/js/wave/wave-active.js"></script>
    <script src="<?= assets_url() ?>admin/js/dialog/sweetalert2.min.js"></script>
    <script src="<?= assets_url() ?>admin/js/data-table/jquery.dataTables.min.js"></script>
    <script src="<?= assets_url() ?>admin/js/data-table/data-table-act.js"></script>
    <script src="<?= assets_url() ?>admin/js/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?= assets_url() ?>admin/js/main.js"></script>
    <script src="<?= assets_url() ?>admin/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= assets_url() ?>admin/js/datapicker/datepicker-active.js"></script>
    <script src="<?= assets_url() ?>admin/js/notify/notify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- begin:: js local -->
    <?php empty($js) ? '' : $this->load->view($js); ?>
    <!-- end:: js local -->
</body>

</html>