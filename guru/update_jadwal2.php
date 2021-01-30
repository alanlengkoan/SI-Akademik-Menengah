<?php
include "../inc/koneksi.php";

session_start();
$tgl_awal  = date("Y-m-d H:i:s",strtotime($_POST[itgl_awal]));
$tgl_akhir  = date("Y-m-d H:i:s",strtotime($_POST[itgl_akhir]));
$sql = "UPDATE `jadwal_ujian` set `id_kelas`='$_POST[ikelas]', `id_mapel`='$_POST[imapel]',
                                 `id_guru`='$_SESSION[id_guru]', `tgl_ujian_awal`='$tgl_awal',
                                  `tgl_ujian_akhir`='$tgl_akhir',`grup_soal`='$_POST[igrup]'
                            where id = '$_GET[id]'";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=jadwal_ujian')</script>";
}

?>