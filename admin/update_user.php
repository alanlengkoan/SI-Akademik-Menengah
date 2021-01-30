<?php
include "../inc/koneksi.php";
$aktif='0';
if($_POST[iaktif]=='on'){
    $aktif='1';
}
$sql_cek = "select * from users where id='$_POST[id]'";
$res_cek = $mysqli->query($sql_cek);
$data_cek = $res_cek->fetch_assoc();
$md5_lama = $data_cek['password'];
$pass_lama = md5($_POST['password3']);
$pass1 = md5($_POST['password']);
$pass2 = md5($_POST['password2']);
if($pass_lama == $md5_lama){
    
    if($pass1 == $pass2){
         $sql = "UPDATE `users` SET password='$pass1',`aktif` = '$aktif' WHERE `id` ='$_POST[id]';";


        $rs = $mysqli->query($sql);
        if($rs){
            echo "<script>window.alert('Data Tersimpan');
                          window.location=('../index.php?mode=manajemen_user')</script>";
        }   
    }else{
        echo "<script>window.alert('Data Gagal Tersimpan...Password Baru Tidak Sama');
                          window.location=('../index.php?mode=manajemen_user')</script>";
    }
}else{
   echo "<script>window.alert('Data Gagal Tersimpan ... Password Lama Salah');
                      window.location=('../index.php?mode=manajemen_user')</script>"; 
}



?>