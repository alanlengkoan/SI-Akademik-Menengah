<?php
    $tahun = date('Y'); 
    $sql_kelas = "select * from kelas";
    $sql_mapel = "select * from mapel";
    $sql_guru = "select * from guru";
    $rs_kelas = $mysqli->query($sql_kelas);
    $rs_mapel = $mysqli->query($sql_mapel);
    $rs_guru = $mysqli->query($sql_guru);

    while($data_kelas = $rs_kelas->fetch_assoc()){
        $option .= "<option value=\"$data_kelas[id]\">$data_kelas[nama]</option>"; 
    }
    while($data_mapel = $rs_mapel->fetch_assoc()){
            $option2 .= "<option value=\"$data_mapel[id]\">$data_mapel[pelajaran]</option>"; 
        }
    while($data_guru = $rs_guru->fetch_assoc()){
            $option3 .= "<option value=\"$data_guru[id]\">$data_guru[nama]</option>"; 
        }
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Akademik Online ( SMKT MAMASA )</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <!--<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <link rel="stylesheet" href="css/wave/button.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
     <!-- Data Table JS
		============================================ -->
   	============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
   <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="css/bootstrap-select/bootstrap-select.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
        <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="css/datapicker/datepicker3.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#akademik" href="#">Akademik</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="index.php">Guru</a></li>
                                        <li><a href="index.php?mode=siswa">Siswa</a></li>
                                        <li><a href="index.php?mode=kelas">Kelas</a></li>
                                        <li><a href="index.php?mode=pelajaran">Pelajaran</a></li>
                                        <li><a href="index.php?mode=tguru">Penugasan Guru</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#user" href="#">Pengguna</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                       
                                        <li><a href="index.php?mode=manajemen_user">Manajemen User</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a  href="logout.php"><i class="fa fa-close"></i> Logout </a></li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a data-toggle="tab" href="#akademik"><i class="notika-icon notika-house"></i> Akademik</a>
                        </li>
                        <li><a data-toggle="tab" href="#user"><i class="fa fa-user"></i> Pengguna </a></li>
                        <li><a  href="logout.php"><i class="fa fa-close"></i> Logout </a></li>
                        
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="akademik" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                      <li><a href="index.php">Guru</a></li>
                                        <li><a href="index.php?mode=siswa">Siswa</a></li>
                                        <li><a href="index.php?mode=kelas">Kelas</a></li>
                                        <li><a href="index.php?mode=pelajaran">Pelajaran</a></li>
                                        <li><a href="index.php?mode=tguru">Penugasan Guru</a></li>
                            </ul>
                        </div>
                        <div id="user" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                  
                                        <li><a href="index.php?mode=manajemen_user">Manajemen User</a>
                                        </li>
                            </ul>
                        </div>
                    
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!-- Start Main Content ---->
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
										<h2>Tambah Penugasan Guru </h2>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <div class="normal-table-area">
        <div class="container">
          
             <div class="row">
                 <form action="admin/simpan_tguru.php" method="POST" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-10">
                      
                         <div class="form-example-int form-horizental mg-t-15">
                           <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Kelas</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <select class="selectpicker" id="ikelas" name="ikelas">
                                               <?php
                                                    
                                                        echo $option;
                                                        ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                             <div class="form-example-int form-horizental mg-t-15">
                           <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Mata Pelajaran</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <select class="selectpicker" id="ipelajaran" name="ipelajaran">
                                               <?php
                                                    
                                                        echo $option2;
                                                        ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                             <div class="form-example-int form-horizental mg-t-15">
                           <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Guru Pengajar</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <select class="selectpicker" id="iguru" name="iguru">
                                               <?php
                                                    
                                                        echo $option3;
                                                        ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button class="btn btn-success notika-btn-success">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>     
            </div>
               
            
              </div>
    </div>
    <!-- end Main Content ---->
    
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2019  </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
	<!--	============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
       <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
	<!-- bootstrap select JS
		============================================ -->
    <!-- Data Table JS
		============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS

		============================================ -->
            <!-- datapicker JS
		============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
</body>

</html>