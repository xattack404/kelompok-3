<?php 
session_start();
include '../config/koneksi.php';					// Panggil koneksi ke database
include '../fungsi/cek_aksi_hapus.php';		// Panggil fungsi boleh hapus data atau tidak
include 'cek_login.php'; // Panggil fungsi 

$id  = $_GET['id'];
$pass = "12345678";
$password = password_hash($pass, PASSWORD_DEFAULT);
$sql  = "UPDATE tb_member SET password = '$password'
				WHERE id_member = '$id'";

if (mysqli_query($koneksi, $sql)) 
{
  echo "<script>alert('reset Password berhasil! Klik ok untuk melanjutkan');location.replace('member_list.php')</script>";
} 
  else 
  {
    echo "Error updating record: " . mysqli_error($koneksi);
  }
?>