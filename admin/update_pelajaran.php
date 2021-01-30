<?php
include "../inc/koneksi.php";
$aktif='0';
if($_POST[iaktif]=='on'){
    $aktif='1';
}
$sql = "UPDATE `mapel` SET pelajaran='$_POST[inama]',`aktif` = '$aktif' WHERE `id` ='$_POST[id]';";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=pelajaran')</script>";
}

?>