<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_hapus.php'; 	// Panggil fungsi boleh hapus data atau tidak

$id_kons   = mysqli_real_escape_string($koneksi, $_GET['id_konsultasi']);

$sql = "DELETE FROM tb_konsultasi WHERE id_konsultasi = '$id_kons' ";
if (mysqli_query($koneksi, $sql)) 
{
  echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('konsultasi_list.php')</script>"; 
}
  else 
  {
      echo "Error updating record: " . mysqli_error($koneksi);
  }
?>