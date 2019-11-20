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
	$faktur = $data['id_keranjang'];

	$query  = "DELETE FROM tb_keranjang WHERE id_keranjang = '$faktur' ";
	
	if(mysqli_query($koneksi, $query)) 
  {
  	echo "<script>alert('Keranjang berhasil dikosongkan');location.replace('keranjang.html')</script>";
  }  
  	else
  	{
  		echo "Error updating record: " . mysqli_error($koneksi);
  	}
}
?>