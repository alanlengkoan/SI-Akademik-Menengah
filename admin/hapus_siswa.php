<?php
include "../inc/koneksi.php";

$sql = "DELETE FROM siswa WHERE `id` ='$_GET[id]';";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=siswa')</script>";
}

?>