<?php
include "../inc/koneksi.php";


$sql = "INSERT INTO `guru` ( `nip`, `nama`, `pendidikan`, `thn_masuk`, `aktif`) VALUES ( '$_POST[inip]', '$_POST[inama]', '$_POST[ipendidikan]', '$_POST[ithn_masuk]', '1');";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php')</script>";
}

?>