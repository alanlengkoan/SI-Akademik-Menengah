<?php
include "../inc/koneksi.php";


$sql = "INSERT INTO `penugasan_guru` ( `id_kelas`, `id_guru`, `id_mapel`, `aktif`) VALUES ( '$_POST[ikelas]', '$_POST[iguru]', '$_POST[ipelajaran]',  '1');";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php?mode=tguru')</script>";
}

?>