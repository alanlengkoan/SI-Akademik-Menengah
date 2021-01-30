<?php
session_start();
include "../inc/koneksi.php";
if(!empty($_FILES["filex"]["tmp_name"])) {
$target_dir = $_SESSION[mydir]."/".'myfile/';
$uploadOk = 1;
$imageFileType = strtolower(pathinfo(basename( $_FILES["filex"]["name"]),PATHINFO_EXTENSION));
$filename = date("YmdHis").".$imageFileType";
$target_file = $target_dir . $filename;

// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["filex"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


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
    $sql = "UPDATE `materi` set judul='$_POST[ijudul]',tipe='$_POST[tipe_materi]',id_mapel='$_POST[imapel]',`url`='$filename'";


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
}else{
  $sql = "UPDATE `materi` set judul='$_POST[ijudul]',tipe='$_POST[tipe_materi]',id_mapel='$_POST[imapel]' where id='$_GET[id]'";


  $rs = $mysqli->query($sql);
  if($rs){
      echo "<script>window.alert('Data Tersimpan');
                    window.location=('../index.php?mode=materi')</script>";
  }
}
?>
