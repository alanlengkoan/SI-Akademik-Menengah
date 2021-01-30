<?php
include "../inc/koneksi.php";

$sql = "DELETE FROM penugasan_guru WHERE `id` ='$_GET[id]';";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=tguru')</script>";
}

?>