<?php
include "../inc/koneksi.php";


$sql = "INSERT INTO `kelas` ( `nama`, `walikelas`, `aktif`) VALUES ( '$_POST[inama]', '$_POST[iwalikelas]', '1');";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=kelas')</script>";
}

?>