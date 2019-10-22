<?php
if(isset($_SESSION['akses']))
{
	$sesen_id_user	= $_SESSION['id_login'];
	$sesen_username = $_SESSION['username'];
	$sesen_nama 	= $_SESSION['nama'];
	$sesen_usertype = $_SESSION['id_posisi'];
	$sesen_akses	= $_SESSION['akses'];
}
else{
	die("<script>alert('Anda tidak memiliki akses!');history.go(-1)</script>");
}
?>
