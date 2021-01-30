<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Akademik Online ( SMKT MAMASA )</title>
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
                                <li><a data-toggle="collapse" data-target="#akademik" href="#">Akademik</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="<?= admin_url() ?>guru">Guru</a></li>
                                        <li><a href="<?= admin_url() ?>kelas">Kelas</a></li>
                                        <li><a href="<?= admin_url() ?>siswa">Siswa</a></li>
                                        <li><a href="<?= admin_url() ?>mapel">Pelajaran</a></li>
                                        <li><a href="<?= admin_url() ?>penugasan_guru">Penugasan Guru</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#user" href="#">Pengguna</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li>
                                            <a href="index.php?mode=manajemen_user">Manajemen User</a>
                                        </li>
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
                        <li class="active"><a data-toggle="tab" href="#akademik"><i class="notika-icon notika-house"></i> Akademik</a>
                        </li>
                        <li><a data-toggle="tab" href="#user"><i class="fa fa-user"></i> Pengguna </a></li>
                        <li><a href="<?= logout_url() ?>"><i class="fa fa-close"></i> Logout </a></li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="akademik" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?= admin_url() ?>guru">Guru</a></li>
                                <li><a href="<?= admin_url() ?>kelas">Kelas</a></li>
                                <li><a href="<?= admin_url() ?>siswa">Siswa</a></li>
                                <li><a href="<?= admin_url() ?>mapel">Pelajaran</a></li>
                                <li><a href="<?= admin_url() ?>penugasan_guru">Penugasan Guru</a></li>
                            </ul>
                        </div>
                        <div id="user" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li>
                                    <a href="index.php?mode=manajemen_user">Manajemen User</a>
                                </li>
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
                        <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- begin:: js local -->
    <?php empty($js) ? '' : $this->load->view($js); ?>
    <!-- end:: js local -->
</body>

</html>