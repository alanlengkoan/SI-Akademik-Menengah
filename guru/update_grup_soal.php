<?php
session_start();
include "../inc/koneksi.php";
$aktif='0';
if($_POST[iaktif]=='on'){
    $aktif='1';
}
    $sql = "UPDATE `grup_soal` set `kelompok`='$_POST[igrup]', `ket`='$_POST[iket]', `aktif`=' $aktif' where id='$_GET[id]'";


    $rs = $mysqli->query($sql);
    if($rs){
        echo "<script>window.alert('Data Tersimpan');
                      window.location=('../index.php?mode=grup_soal')</script>";
    }else{
        echo $mysqli->error;
    }

?>
