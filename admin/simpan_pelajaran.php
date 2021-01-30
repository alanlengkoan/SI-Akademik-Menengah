<?php
include "../inc/koneksi.php";


$sql = "INSERT INTO `mapel` ( `pelajaran`, `aktif`) VALUES ( '$_POST[inama]', '1');";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=pelajaran')</script>";
}

?>