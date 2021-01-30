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
// Check if file already ex
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

    $sql = "UPDATE `soal` SET `id_mapel`='$_POST[imapel]',`jenis_soal`='$_POST[ijenis]',
                              `uraian_soal`='$_POST[iuraian]',`gbr_soal`='$filename',id_grup='$_POST[igrup]',
                              `pil1`='$_POST[ipila]',`pil2`='$_POST[ipilb]',`pil3`='$_POST[ipilc]',
                              `pil4`='$_POST[ipild]',`pil5`='$_POST[ipile]',`jawaban_pil`='$_POST[ijawaban]' WHERE id='$_GET[id]'";


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
  $sql = "UPDATE `soal` SET `id_mapel`='$_POST[imapel]',`jenis_soal`='$_POST[ijenis]',
  `uraian_soal`='$_POST[iuraian]',id_grup='$_POST[igrup]',
  `pil1`='$_POST[ipila]',`pil2`='$_POST[ipilb]',`pil3`='$_POST[ipilc]',
  `pil4`='$_POST[ipild]',`pil5`='$_POST[ipile]',`jawaban_pil`='$_POST[ijawaban]' WHERE id='$_GET[id]'";

  $rs = $mysqli->query($sql);
  if($rs){
      echo "<script>window.alert('Data Tersimpan');
                    window.location=('../index.php?mode=soal')</script>";
  }
}
?>
