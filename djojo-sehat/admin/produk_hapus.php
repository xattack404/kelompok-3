<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_hapus.php'; 	// Panggil fungsi boleh hapus data atau tidak

$id_barang   = mysqli_real_escape_string($koneksi, $_GET['id_barang']);

$del_img  = "SELECT foto_barang FROM tb_barang WHERE id_barang = '$id_barang' ";
$res      = mysqli_query($koneksi, $del_img);
$data     = mysqli_fetch_array($res);
$img   		= $data['foto_barang'];
$tmpfile 	= "../images/produk/$img";

$sql = "DELETE FROM tb_barang WHERE id_barang = '$id_barang' ";
if (mysqli_query($koneksi, $sql)) 
{
	unlink ($tmpfile);
  echo "<script>alert('Hapus data berhasil! Klik ok untuk melanjutkan');location.replace('produk_list.php')</script>"; 
}
  else 
  {
    echo "Error updating record: " . mysqli_error($koneksi);
  }
?>