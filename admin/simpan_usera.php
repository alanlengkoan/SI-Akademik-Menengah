<?php
include "../inc/koneksi.php";

$pass = md5($_POST[password]);
$sql = "INSERT INTO `users`( `nama`, `password`, `level`,  `aktif`) VALUES ('$_POST[iuser]','$pass','$_POST[ijenis_user]','1')";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=manajemen_user')</script>";
}else{
        echo "<script>window.alert('Data Gagal Tersimpan');
                  window.location=('../index.php?mode=manajemen_user')</script>";
}

?>