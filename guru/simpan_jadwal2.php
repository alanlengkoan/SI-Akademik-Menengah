<?php
include "../inc/koneksi.php";

session_start();
$tgl_awal  = date("Y-m-d H:i:s",strtotime($_POST[itgl_awal]));
$tgl_akhir  = date("Y-m-d H:i:s",strtotime($_POST[itgl_akhir]));
$sql = "INSERT INTO `jadwal_ujian`( `id_kelas`,  `id_mapel`,
                                 `id_guru`, `grup_soal`, `tgl_ujian_awal`, `tgl_ujian_akhir`, `ket`) 
            VALUES ('$_POST[ikelas]','$_POST[imapel]',
            '$_SESSION[id_guru]','$_POST[igrup]','$tgl_awal','$tgl_akhir','')";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=jadwal_ujian')</script>";
}else{
    echo $mysqli->error;
}

?>