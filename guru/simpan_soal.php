<?php
session_start();
include "../inc/koneksi.php";

if(!empty($_FILES["filex"]["tmp_name"])) {

$target_dir = $_SESSION[mydir]."/".'file_soal/';
$uploadOk = 1;
$imageFileType = strtolower(pathinfo(basename( $_FILES["filex"]["name"]),PATHINFO_EXTENSION));
$filename = date("YmdHis").".$imageFileType";
$target_file = $target_dir . $filename;

// Check if image file is a actual image or fake image
/*  $check = getimagesize($_FILES["filex"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    //echo "File is not an image.";
    $uploadOk = 0;
  }

*/
// Check if file already exists
if (file_exists($target_file)) {
  //echo "Sorry, file already exists.";
  $uploadOk = 0;
  $error = " File Sudah ADa";

}

// Check file size
if ($_FILES["filex"]["size"] > 500000) {
  //echo "Sorry, your file is too large.";
  $uploadOk = 0;
  $error = " File Melebihi Kapasitas";
}

// Allow certain file formats
if($imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "gif" ) {
  $uploadOk = 0;
  $error = " Bukan File yg Diminta";
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 0) {

  if (move_uploaded_file($_FILES["filex"]["tmp_name"], $target_file)) {

    $sql = "INSERT INTO `soal`( `id_mapel`, `jenis_soal`, `uraian_soal`, `gbr_soal`,`id_grup`,
       `pil1`, `pil2`, `pil3`, `pil4`, `pil5`, `jawaban_pil`, `aktif`)
       VALUES ('$_POST[imapel]','$_POST[ijenis]','$_POST[iuraian]','$filename','$_POST[igrup]','$_POST[ipila]','$_POST[ipilb]',
               '$_POST[ipilc]','$_POST[ipild]','$_POST[ipile]','$_POST[ijawaban]','1')";


    $rs = $mysqli->query($sql);
    if($rs){
        echo "<script>window.alert('Data Tersimpan');
                      window.location=('../index.php?mode=soal')</script>";
    }

  }else{
    echo "<script>window.alert('Gagal Upload ".$target_file."');
                //  window.location=('../index.php?mode=soal')</script>";
  }
}else{
  echo "<script>window.alert('Ada Error, $error');
                window.location=('../index.php?mode=soal ')</script>";
}
}else{
  $sql = "INSERT INTO `soal`( `id_mapel`, `jenis_soal`, `uraian_soal`, `gbr_soal`,`id_grup`,
     `pil1`, `pil2`, `pil3`, `pil4`, `pil5`, `jawaban_pil`, `aktif`)
     VALUES ('$_POST[imapel]','$_POST[ijenis]','$_POST[iuraian]','','$_POST[igrup]','$_POST[ipila]','$_POST[ipilb]',
             '$_POST[ipilc]','$_POST[ipild]','$_POST[ipile]','$_POST[ijawaban]','1')";

  $rs = $mysqli->query($sql);
  if($rs){
      echo "<script>window.alert('Data Tersimpan');
                    window.location=('../index.php?mode=soal')</script>";
  }
}
?>
