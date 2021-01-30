<?php
session_start();
$mapel = $_SESSION[mapel];
    $tahun = date('Y');
    $sql_mapel = "select * from mapel";
    $rs_mapel = $mysqli->query($sql_mapel);
    while($data_mapel = $rs_mapel->fetch_assoc()){
       if(in_array($data_mapel[id],$mapel)){
        $option .= "<option value=\"$data_mapel[id]\">$data_mapel[pelajaran]</option>";
        }
    }
    $sql_grup = "select * from grup_soal";
    $rs_grup = $mysqli->query($sql_grup);
    while($data_grup = $rs_grup->fetch_assoc()){
        $option1 .= "<option value=\"$data_grup[id]\">$data_grup[kelompok]</option>";
        
    }
    //print_r($_SESSION[mapel]);
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
    <?php
      include "menu.php";

      echo $mobile_menu;
      echo $desktop_menu;
     ?>



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
										<i class="fa fa-plus"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Tambah Soal</h2>
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
                 <form action="guru/simpan_soal.php" method="POST" enctype="multipart/form-data">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-10">
                      <div class="form-example-int form-horizental mg-t-15">
                     <div class="form-group">
                          <div class="row">
                              <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                  <label class="hrzn-fm">Mata Pelajaran</label>
                              </div>
                              <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                  <div class="nk-int-st">
                                      <select class="selectpicker" id="imapel" name="imapel">
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
                              <label class="hrzn-fm">Jenis Soal</label>
                          </div>
                          <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                              <div class="nk-int-st">
                                  <select class="selectpicker" id="ijenis" name="ijenis">

                                    <option value="pil_ganda">Pilihan Ganda</option>
                                      <option value="essay">Essai</option>
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
                              <label class="hrzn-fm">Grup Soal</label>
                          </div>
                          <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                              <div class="nk-int-st">
                                  <select class="selectpicker" id="igrup" name="igrup">
                                         <?php echo $option1;?>
                                    
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
                       <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Uraian</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <textarea class="form-control" id="iuraian" name="iuraian" rows="3" placeholder="Uraian Soal"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                             <div class="form-group">
                                 <div class="row">
                                     <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                         <label class="hrzn-fm">Pilihan A ( Jika Pilihan Ganda)</label>
                                     </div>
                                     <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                         <div class="nk-int-st">
                                             <textarea id="ipila" name="ipila" class="form-control" rows="3" placeholder="Pilihan A"></textarea>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="form-example-int form-horizental">
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                          <label class="hrzn-fm">Pilihan B ( Jika Pilihan Ganda)</label>
                                      </div>
                                      <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                          <div class="nk-int-st">
                                              <textarea id="ipilb" name="ipilb" class="form-control" rows="3" placeholder="Pilihan B"></textarea>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-example-int form-horizental">
                               <div class="form-group">
                                   <div class="row">
                                       <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                           <label class="hrzn-fm">Pilihan C ( Jika Pilihan Ganda)</label>
                                       </div>
                                       <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                           <div class="nk-int-st">
                                               <textarea id="ipilc" name="ipilc" class="form-control" rows="3" placeholder="Pilihan C"></textarea>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Pilihan D ( Jika Pilihan Ganda)</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <textarea id="ipild" name="ipild" class="form-control" rows="3" placeholder="Pilihan D"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental">
                                 <div class="form-group">
                                     <div class="row">
                                         <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                             <label class="hrzn-fm">Pilihan E ( Jika Pilihan Ganda)</label>
                                         </div>
                                         <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                             <div class="nk-int-st">
                                                 <textarea id="ipile" name="ipile" class="form-control" rows="3" placeholder="Pilihan E"></textarea>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>


                        <div class="form-example-int form-horizental mg-t-15">
                       <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Jawaban ( Jika Pilihan Ganda)</label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <select class="selectpicker" id="ijawaban" name="ijawaban">
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                           <option value="3">C</option>
                                           <option value="4">D</option>
                                           <option value="5">E</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int form-horizental">
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                     <label class="hrzn-fm">Gambar Soal</label>
                                 </div>
                                 <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                     <div class="nk-int-st">
                                         <input type="file" class="form-control input-sm" placeholder="" name="filex" id="filex">
                                         <p>File dengan tipe (*.jpeg,*.png,*.gif)</p>
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
</body>

</html>
