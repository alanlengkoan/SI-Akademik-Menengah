<?php
include "inc/koneksi.php";
session_start();
//echo "<script> alert('Login Anda Salah $_SESSION[usertype] !!!');</script>";
if($_SESSION['login']==1){
 //   $_SESSION[usertype]="1";
    $_SESSION['mydir']=dirname(__FILE__);
    if($_SESSION['usertype']=="1"){

        $loc = "admin/";
    }elseif($_SESSION['usertype']=="2"){
        $loc = "guru/";
        $res = $mysqli->query("select * from guru where iduser='$_SESSION[userid]'");
        $data = $res->fetch_assoc();
        $_SESSION['idlevel']=$data['id'];
    }elseif($_SESSION['usertype']=="3"){
        $loc = "siswa/";
        $res = $mysqli->query("select * from siswa where iduser='$_SESSION[userid]'");
        $data = $res->fetch_assoc();
        $_SESSION['idlevel']=$data['id'];
    }else{
        $loc="";
    }

    if(!isset($_GET['mode'])){
         $halaman = "main.php";
    }else{
         $halaman = $_GET['mode'].".php";
    }


    include $loc.$halaman;
}else{
  header('Location: login/');
  exit;
}

?>
