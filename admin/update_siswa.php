<?php
include "../inc/koneksi.php";
$aktif='0';
if($_POST[iaktif]=='on'){
    $aktif='1';
}
$tgl = date("Y-m-d",strtotime($_POST[itgl_lahir]));
$sql =" UPDATE `siswa` SET `nis`='$_POST[inis]',`nama`='$_POST[inama]',`tempat_lahir`='$_POST[itempat_lahir]',`tgl_lahir`='$tgl',`ortu_wali`='$_POST[iortu_wali]',`alamat`='$_POST[ialamat]',`id_kelas`='$_POST[ikelas]',`jenis_kelamin`='$_POST[ijenis_kelamin]',`thn_masuk`=$_POST[ithn_masuk],`iduser`='$_POST[iuser]',`aktif`='$aktif'";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=siswa')</script>";
}

?>