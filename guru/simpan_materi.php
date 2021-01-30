<?php
session_start();
include "../inc/koneksi.php";
$target_dir = $_SESSION[mydir]."/".'myfile/';
$uploadOk = 1;
$imageFileType = strtolower(pathinfo(basename( $_FILES["filex"]["name"]),PATHINFO_EXTENSION));
$filename = date("YmdHis").".$imageFileType";
$target_file = $target_dir . $filename;



// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["filex"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "txt" && $imageFileType != "MP4" ) {
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 0) {
  if (move_uploaded_file($_FILES["filex"]["tmp_name"], $target_file)) {
    $sql = "INSERT INTO `materi`( `judul`, `id_mapel`,`id_guru`, `tipe`, `url`, `aktif`)
                        VALUES ('$_POST[ijudul]','$_POST[imapel]','$_SESSION[id_guru]','$_POST[tipe_materi]','$filename','1')";


    $rs = $mysqli->query($sql);
    if($rs){
        echo "<script>window.alert('Data Tersimpan');
                      window.location=('../index.php?mode=materi')</script>";
    }

  }
}else{
  echo "<script>window.alert('Ada Error');
                window.location=('../index.php?mode=materi')</script>";
}
?>
