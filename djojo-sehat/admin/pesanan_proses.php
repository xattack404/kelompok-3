<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';                         // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_hapus.php';        	// Panggil fungsi boleh hapus data atau tidak

$no_id   = mysqli_real_escape_string($koneksi, $_GET['id_trans']);

$sql = " UPDATE trans_jual SET status = 3 where id_trans='$no_id' ";
if (mysqli_query($koneksi, $sql)) 
{
  echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('pesanan.php')</script>"; 
}
  else 
  {
      echo "Error updating record: " . mysqli_error($koneksi);
  }
?>