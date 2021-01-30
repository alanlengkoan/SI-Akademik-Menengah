<?php
$mysqli = new mysqli("localhost", "my_root", "my_pass", "si_akademik_smk");
// pastikan username dan password adalah berupa huruf atau angka.
$username = $_POST['username'];
$pass     = $_POST['pass'];

$login=$mysqli->query("SELECT * FROM users WHERE nama='$username' AND password=md5('$pass')");
$ketemu=$login->num_rows;
$r=$login->fetch_assoc();

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";

  $_SESSION[userid]     = $r[id];
  $_SESSION[username]     = $r[nama];
  $_SESSION[usertype]     = $r[level];
  $_SESSION[userlevel]     = $r[idlevel];
  // session timeout
  $_SESSION[login] = 1;
  if($r[level] == 2){
    //cek id Guru
    $rs_guru = $mysqli->query("select * from guru where iduser='$r[id]'");
    $data_guru = $rs_guru->fetch_assoc();
    $_SESSION[id_guru] = $data_guru[id];

    // cek penugasan Guru
    $rs_tugas = $mysqli->query("SELECT `id`, `id_kelas`, `id_guru`, `id_mapel`, `aktif` FROM `penugasan_guru` WHERE id_guru ='$_SESSION[id_guru]'");
    $mapel = array();
    $kelas = array();
    while($data_tugas = $rs_tugas->fetch_assoc()){
      $mapel[]= $data_tugas[id_mapel];
      $kelas[]= $data_tugas[id_kelas];
    }
    $_SESSION[mapel]=$mapel;
    $_SESSION[kelas]=$kelas;
  }
  timer();

	$sid_lama = session_id();

	session_regenerate_id();

	$sid_baru = session_id();

  //$mysqli->query("UPDATE users SET id_session='$sid_baru' WHERE username='$username'");

  header('location:../index.php');
}
else{
  echo "<script> alert('Login Anda Salah !!!');window.location='index.php';</script>";

}

?>
