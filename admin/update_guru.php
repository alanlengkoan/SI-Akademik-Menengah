<?php
include "../inc/koneksi.php";
$aktif='0';
if($_POST[iaktif]=='on'){
    $aktif='1';
}
$sql = "UPDATE `guru` SET nama='$_POST[inama]',nip='$_POST[inip]',pendidikan='$_POST[ipendidikan]',thn_masuk='$_POST[ithn_masuk]',`iduser`='$_POST[iuser]',`aktif` = '$aktif' WHERE `id` ='$_POST[id]';";


$rs = $mysqli->query($sql);
if($rs){
    echo "<script>window.alert('Data Tersimpan');
                  window.location=('../index.php')</script>";
}

?>