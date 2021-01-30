<?php
session_start();
include "../inc/koneksi.php";

    $sql = "INSERT INTO `grup_soal`(`kelompok`, `ket`, `aktif`) 
    VALUES ('$_POST[igrup]','$_POST[iket]','1')";


    $rs = $mysqli->query($sql);
    if($rs){
        echo "<script>window.alert('Data Tersimpan');
                      window.location=('../index.php?mode=grup_soal')</script>";
    }

?>
