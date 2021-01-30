<?php
include "../inc/koneksi.php";

session_start();
$tgl_awal  = date("Y-m-d H:i:s",strtotime($_POST[itgl_awal]));
$tgl_akhir  = date("Y-m-d H:i:s",strtotime($_POST[itgl_akhir]));
$sql = "INSERT INTO `jadwal_materi`( `id_kelas`, `id_materi`, `id_mapel`,
                                 `id_guru`, `tgl_tayang_awal`, `tgl_tayang_akhir`, `ket`) 
            VALUES ('$_POST[ikelas]','$_POST[imateri]','$_POST[imapel]',
            '$_SESSION[id_guru]','$tgl_awal','$tgl_akhir','')";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=jadwal_materi')</script>";
}

?>