<?php
include "../inc/koneksi.php";
$aktif='0';
if($_POST[iaktif]=='on'){
    $aktif='1';
}
$sql = "UPDATE `kelas` SET nama='$_POST[inama]',walikelas='$_POST[iwalikelas]',`aktif` = '$aktif' WHERE `id` ='$_POST[id]';";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=kelas')</script>";
}

?>