<?php
$mobile_menu = "
<div class='mobile-menu-area'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='mobile-menu'>
                    <nav id='dropdown'>
                        <ul class='mobile-menu-nav'>
                            <li><a data-toggle='collapse' data-target='#akademik' href='#'>Akademik</a>
                                <ul class='collapse dropdown-header-top'>
                                <li><a href='index.php'>Ruang Belajar</a></li>
                                <li><a href='index.php?mode=materi'>Materi</a></li>
                                <li><a href='index.php?mode=soal'>Bank Soal</a></li>
                                <li><a href='index.php?mode=jadwal_materi'>Jadwal Materi</a></li>
                                <li><a href='index.php?mode=jadwal_ujian'>Jadwal Ujian</a></li>
                                <li><a href='index.php?mode=susun_soal'>Susun Soal</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle='collapse' data-target='#user' href='#'>Pengguna</a>
                                <ul id='demoevent' class='collapse dropdown-header-top'>

                                    <li><a href='#'>Manajemen User</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a  href='logout.php'><i class='fa fa-close'></i> Logout </a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
";

$desktop_menu = "
<div class='main-menu-area mg-tb-40'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <ul class='nav nav-tabs notika-menu-wrap menu-it-icon-pro'>
                    <li class='active'><a data-toggle='tab' href='#akademik'><i class='notika-icon notika-house'></i> Akademik</a>
                    </li>
                    <li><a data-toggle='tab' href='#evaluasi'><i class='fa fa-pencil'></i> Evaluasi </a></li>
                    <li><a data-toggle='tab' href='#hasil'><i class='fa fa-paper'></i> Hasil </a></li>
                    <li><a data-toggle='tab' href='#user'><i class='fa fa-user'></i> Pengguna </a></li>
                    <li><a  href='logout.php'><i class='fa fa-close'></i> Logout </a></li>

                </ul>
                <div class='tab-content custom-menu-content'>
                    <div id='akademik' class='tab-pane in active notika-tab-menu-bg animated flipInX'>
                        <ul class='notika-main-menu-dropdown'>
                                    <li><a href='index.php'>Ruang Belajar</a></li>
                                    <li><a href='index.php?mode=materi'>Materi</a></li>
                                    <li><a href='index.php?mode=grup_soal'>Grup Soal</a></li>
                                    <li><a href='index.php?mode=soal'>Bank Soal</a></li>
                                    <li><a href='index.php?mode=jadwal_materi'>Jadwal Materi</a></li>
                                    <li><a href='index.php?mode=jadwal_ujian'>Jadwal Ujian</a></li>
                        </ul>
                    </div>
                    <div id='evaluasi' class='tab-pane  notika-tab-menu-bg animated flipInX'>
                        <ul class='notika-main-menu-dropdown'>
                                    <li><a href='index.php'>Tugas</a></li>
                                    <li><a href='index.php?mode=materi'>Ujian Semester</a></li>
                        </ul>
                    </div>
                    <div id='hasil' class='tab-pane  notika-tab-menu-bg animated flipInX'>
                    <ul class='notika-main-menu-dropdown'>
                                <li><a href='index.php'>Nilai Tugas</a></li>
                                <li><a href='index.php?mode=materi'>Nilai Ujian</a></li>
                    </ul>
                </div>
                    <div id='user' class='tab-pane notika-tab-menu-bg animated flipInX'>
                        <ul class='notika-main-menu-dropdown'>

                                    <li><a href='index.php?mode=manajemen_user'>Manajemen User</a>
                                    </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
";

 ?>
