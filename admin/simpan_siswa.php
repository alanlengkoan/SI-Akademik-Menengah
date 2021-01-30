<?php
include "../inc/koneksi.php";

$tgl = date("Y-m-d",strtotime($_POST[itgl_lahir]));
$sql = "INSERT INTO `siswa`(`nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `ortu_wali`, `alamat`, `jenis_kelamin`, `thn_masuk`, `aktif`, `id_kelas`) VALUES ('$_POST[inis]','$_POST[inama]','$_POST[itempat_lahir]','$tgl','$_POST[iortu_wali]','$_POST[ialamat]',
'$_POST[ijenis_kelamin]','$_POST[ithn_masuk]','1','$_POST[ikelas]')";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=siswa')</script>";
}

?>