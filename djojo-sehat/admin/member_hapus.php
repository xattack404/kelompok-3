<?php 
session_start();
include '../config/koneksi.php';					// Panggil koneksi ke database
include '../fungsi/cek_aksi_hapus.php';		// Panggil fungsi boleh hapus data atau tidak
include 'cek_login.php'; // Panggil fungsi 

$id  = $_GET['id'];
$sql  = "DELETE FROM tb_member WHERE id_member = '$id'";

if (mysqli_query($koneksi, $sql)) 
{
  echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('user_list.php')</script>";
} 
  else 
  {
    echo "Error updating record: " . mysqli_error($koneksi);
  }
?>