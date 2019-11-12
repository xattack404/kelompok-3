<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include '../fungsi/cek_login.php';        // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_hapus.php'; 	// Panggil fungsi boleh hapus data atau tidak

$id_kabkot   = mysqli_real_escape_string($koneksi, $_GET['id_kabkot']);

$sql = "DELETE FROM ongkir WHERE id_kabkot = '$id_kabkot' ";
if (mysqli_query($koneksi, $sql)) 
{
  echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('ongkir_list.php')</script>"; 
}
  else 
  {
      echo "Error updating record: " . mysqli_error($conn);
  }
?>