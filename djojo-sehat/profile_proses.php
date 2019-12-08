<?php 

include 'config/koneksi.php';
include 'fungsi/base_url.php';


if (isset($_POST['simpan_nama'])) {
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
	$sql_nama= "UPDATE tb_member SET nama ='$nama' WHERE id_member= '$id'";
	if (mysqli_query($koneksi, $sql_nama)) {
		 echo "<script>alert('nama  berhasil ditambahkan! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}else{
		echo "<script>alert('gagal diubah! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}
}

if (isset($_POST['simpan_jk'])) {
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$jk = mysqli_real_escape_string($koneksi,$_POST['jenis_kelamin']);
	$sql_jk = "UPDATE tb_member SET jenis_kelamin ='$jk' WHERE id_member= '$id'";
	if (mysqli_query($koneksi, $sql_jk)) {
		 echo "<script>alert('jenis_kelamin  berhasil ditambahkan! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}else{
		echo "<script>alert('gagal diubah! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}
}

if (isset($_POST['simpan_email'])) {
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$email = mysqli_real_escape_string($koneksi,$_POST['email']);
	$sql_email = "UPDATE tb_member SET email ='$email' WHERE id_member= '$id'";
	if (mysqli_query($koneksi, $sql_email)) {
		 echo "<script>alert('email  berhasil ditambahkan! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}else{
		echo "<script>alert('gagal diubah! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}
}

if (isset($_POST['simpan_no_hp'])) {
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$no_hp = mysqli_real_escape_string($koneksi,$_POST['no_hp']);
	$sql_no_hp = "UPDATE tb_member SET no_hp ='$no_hp' WHERE id_member= '$id'";
	if (mysqli_query($koneksi, $sql_no_hp)) {
		 echo "<script>alert('nomor hp  berhasil ditambahkan! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}else{
		echo "<script>alert('gagal diubah! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}
}

if (isset($_POST['simpan_semua'])) {
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
	$jenis_kelamin = mysqli_real_escape_string($koneksi,$_POST['jenis_kelamin']);
	$email = mysqli_real_escape_string($koneksi,$_POST['email']);
	$no_hp = mysqli_real_escape_string($koneksi,$_POST['no_hp']);

	
		$sql_semua = "UPDATE tb_member SET nama ='$nama',  jenis_kelamin ='$jenis_kelamin', email ='$email', no_hp ='$no_hp' WHERE id_member= '$id'";
		if (mysqli_query($koneksi, $sql_semua)) {
			 echo "<script>alert('biodata  berhasil diubah! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
		}else{
			echo "<script>alert('gagal diubah! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
		}
	}




 ?>