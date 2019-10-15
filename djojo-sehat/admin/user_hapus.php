<?php 
session_start();
include '../config/koneksi.php';					// Panggil koneksi ke database
include '../fungsi/cek_aksi_hapus.php';		// Panggil fungsi boleh hapus data atau tidak
include 'cek_login.php'; // Panggil fungsi 

$id_user   = $_GET['id_user'];
$sql  = "DELETE FROM tb_login WHERE id_login = '$id_user'";

if (mysqli_query($koneksi, $sql)) 
{
  echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('user_list.php')</script>";
} 
  else 
  {
    echo "Error updating record: " . mysqli_error($koneksi);
  }
?>