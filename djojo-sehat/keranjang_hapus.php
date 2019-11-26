<?php session_start(); 
include "config/koneksi.php"; 
include "faktur.php"; 
include "fungsi/base_url.php"; 
include "fungsi/cek_session_public.php"; 
//include "fungsi/cek_login_public.php"; 

$cek		= "SELECT * FROM tb_keranjang WHERE id_member = '$sesen_id'";
$hasil 	= mysqli_query($koneksi,$cek);
$data 	= mysqli_fetch_array($hasil);

if(mysqli_num_rows($hasil) == 0)
{
	echo "<script>alert('Data tidak ditemukan');location.replace('keranjang.html')</script>";
}
else
{
	$id 	= $data['id_keranjang'];
 
	$query = "DELETE FROM tb_keranjang WHERE id_keranjang = '$id' ";
	
	if(mysqli_query($koneksi, $query)) 
  {
  	echo "<script>alert('Barang berhasil dihapus');location.replace('keranjang.html')</script>";
  }  
  	else
  	{
  		echo "Error updating record: " . mysqli_error($koneksi);
  	}
}
?>
