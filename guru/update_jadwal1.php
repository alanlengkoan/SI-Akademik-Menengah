<?php
include "../inc/koneksi.php";

session_start();
$tgl_awal  = date("Y-m-d H:i:s",strtotime($_POST[itgl_awal]));
$tgl_akhir  = date("Y-m-d H:i:s",strtotime($_POST[itgl_akhir]));
$sql = "UPDATE `jadwal_materi` set `id_kelas`='$_POST[ikelas]', `id_materi`='$_POST[imateri]', `id_mapel`='$_POST[imapel]',
                                 `id_guru`='$_SESSION[id_guru]', `tgl_tayang_awal`='$tgl_awal',
                                  `tgl_tayang_akhir`='$tgl_akhir'
                            where id = '$_GET[id]'";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=jadwal_materi')</script>";
}

?>