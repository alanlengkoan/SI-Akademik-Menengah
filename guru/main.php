<?php
session_start();

$sql_mapel = "select * from mapel";
$rs_mapel = $mysqli->query($sql_mapel);
while($data_mapel = $rs_mapel->fetch_assoc()){
    $option_mapel .= "<option value=\"$data_mapel[id]\">$data_mapel[pelajaran]</option>";
}


?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Akademik Online ( Modul Guru )</title>
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
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- normalize CSS
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
    <link rel="stylesheet" href="css/dialog/sweetalert2.min.css">
    <link rel="stylesheet" href="css/dialog/dialog.css">

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
    <style>
      .chat-conversation{
        background:#ccd;
        padding : 15px;
        height: 529px
      }
      .infobox{
        background:#fff;
        max-height: 300px;
        padding: 20px;
        padding-top: 40px;
       
      }
      .onlinebox{
        background:#fff;
        padding: 20px;
        padding-top: 40px;
       
      }
      .shadowx{
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);
      }
      .table.table-bordered>tbody>tr>td, .table.table-bordered>tbody>tr>th, .table.table-bordered>tfoot>tr>td, .table.table-bordered>tfoot>tr>th, .table.table-bordered>thead>tr>td {
         padding:0; 
         padding-left:10px;
      }
      .list_kelas{
        margin : 20px;
        padding : 10px;

      }
      </style>
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
   <?php
     include "menu.php";
     echo $mobile_menu;
     echo $desktop_menu;
    ?>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->





    <!-- Start Main Content ---->

	<!-- Breadcomb area End-->
    <div class="normal-table-area">
        <div class="container">
            
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="list_kelas shadowx">
                  <h3>Jadwal Kelas </h3>
                  <hr>
                  <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Materi</th>
                                        <th>Guru</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Akhir</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                   $sql = "
                                   SELECT jadwal_materi.`id`,kelas.nama as nama_kelas,guru.nama as nama_guru,materi.judul,mapel.pelajaran,jadwal_materi.tgl_tayang_awal,jadwal_materi.tgl_tayang_akhir FROM `jadwal_materi` 
                                       JOIN kelas on kelas.id = jadwal_materi.id_kelas
                                       JOIN materi on materi.id = jadwal_materi.id_materi
                                       JOIN mapel on mapel.id = jadwal_materi.id_mapel
                                       JOIN guru on guru.id = jadwal_materi.id_guru
                                       WHERE jadwal_materi.id_guru='$_SESSION[id_guru]' ORDER by jadwal_materi.tgl_tayang_akhir
                                   ";
                                   $today = date("Y-m-d H:i:s");
                                   $rs = $mysqli->query($sql);
                                    while($data = $rs->fetch_assoc()){
                                      if($data[tgl_tayang_awal] <= $today and $data[tgl_tayang_akhir] >= $today){
                                        $status = "<button alt='Masuk Kelas' class='btn btn-success success-icon-notika btn-reco-mg btn-button-mg waves-effect'>
                                        <i class='notika-icon notika-right-arrow'></i>
                                      </button>";
                                      }elseif($data[tgl_tayang_awal] > $today){
                                        $status = "Terjadwal";
                                      }elseif($data[tgl_tayang_akhir] < $today){
                                        $status = "Berakhir "; 
                                      }
                                        
                                      $xx++;
                                      echo "
                                          <tr>
                                          <td>$xx</td>
                                          <td>$data[nama_kelas]</td>
                                          <td>$data[pelajaran]</td>
                                          <td>$data[judul]</td>
                                          <td>$data[nama_guru]</td>
                                          <td>$data[tgl_tayang_awal]</td>
                                          <td>$data[tgl_tayang_akhir]</td>
                                          <td>$status
                                            </td>
                                      </tr>
                                          ";
                                    }
                                    
                                  ?>
                                    
                              </tbody>
                              </table>    
                  </div>

                </div>
            <div>    
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                   <div class="mybox shadowx mg-t-10">
                   <div class="notika-chat-list notika-shadow tb-res-ds-n dk-res-ds">
                        <div class="realtime-ctn">
                            <div class="realtime-title">
                                <h2>Chat Box</h2>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="chat-conversation" > 
                                <div class="widgets-chat-scrollbar" >
                                    <ul class="conversation-list">
                                  
                                        
                                    </ul>
                                </div>
                                <div class="chat-widget-input">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 chat-inputbar">
                                            <div class="form-group todo-flex">
                                                <div class="nk-int-st">
                                                    <input style='padding-left:10px' type="text" class="form-control chat-input" placeholder="Enter your text">
                                                </div>
                                                <div class="chat-send">
                                                    <button type="submit" class="btn btn-md btn-primary btn-block notika-chat-btn">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                   <div class="infobox shadowx mg-t-10">
                      <div class="realtime-ctn">
                            <div class="realtime-title">
                                <h2>Info :</h2>
                            </div>
                           
                        </div>
                        <div class="list-info">
                              <ul>
                                <li>
                                    <div class="row">
                                        <div class="col-lg-3">Kelas</div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8"><strong>X.a</strong></div>
                                    </div>
                              </li>
                              <li>
                                    <div class="row">
                                        <div class="col-lg-3">Mata Pelajaran</div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8"><strong>Matematika X</strong></div>
                                    </div>
                              </li>
                              <li>
                                    <div class="row">
                                        <div class="col-lg-3">Materi</div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8"><strong>Aljabar Dasar I</strong></div>
                                    </div>
                              </li>
                              <li>
                                    <div class="row">
                                        <div class="col-lg-3">Download Materi</div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8"><a href="#"><strong>File Download</strong></a></div>
                                    </div>
                              </li>
                              <li>
                                    <div class="row">
                                        <div class="col-lg-3">Waktu Mulai</div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8"><strong>12-06-2020 12:30:00 WITA</strong></div>
                                    </div>
                              </li>  
                              <li>
                                    <div class="row">
                                        <div class="col-lg-3">Waktu Berakhir</div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8"><strong>12-06-2020 12:59:00 WITA</strong></div>
                                    </div>
                              </li>
                            </ul>
                            </div> 
                  </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="onlinebox shadowx mg-t-10">
                            <div class="realtime-ctn">
                                      <div class="realtime-title">
                                          <h2>Online :</h2>
                                      </div>
                                    
                              </div>
                              <div class="list-info">
                                  <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Sebagai</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>

                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Amin</td>
                                            <td>Guru</td>
                                            <td><a href="#">Mute</a></td>
                                        </tr>
                                        

                                    </tbody>
                                </table>   
                              </div>
                            </div>
                        </div>          
                </div>
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
    <script src="js/dialog/sweetalert2.min.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->

    <script>
    $('.hapus').on('click', function(){
        var idx = $(this).attr("id");
            swal({
                title: "Anda Yakin?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus!",
            }).then(function(){
                window.location=('admin/hapus_guru.php?id='+idx);
            });
        });
    </script>
</body>

</html>
