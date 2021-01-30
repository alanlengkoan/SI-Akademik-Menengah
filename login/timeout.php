<?php
session_start();
function timer(){
	$time=1000;
	$_SESSION[timeout1]=time()+$time;
}
function cek_login(){
	$timeout=$_SESSION[timeout1];
	if(time()<$timeout){
		timer();
		return true;
	}else{
		unset($_SESSION[timeout1]);
		return false;
	}
}
?>
