<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_hapus.php'; 	// Panggil fungsi boleh hapus data atau tidak

$id_kat   = mysqli_real_escape_string($koneksi, $_GET['id_kat']);

$sql = "DELETE FROM tb_kategori WHERE id_kategori = '$id_kat' ";
if (mysqli_query($koneksi, $sql)) 
{
  echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('kategori_list.php')</script>"; 
}
  else 
  {
      echo "Error updating record: " . mysqli_error($koneksi);
  }
?>