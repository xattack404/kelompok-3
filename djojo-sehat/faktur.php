<?php 
include "fungsi/cek_session_public.php"; 
include "fungsi/cek_login_public.php"; 
include "beli.php"; 
$cari  = "SELECT * FROM tb_keranjang WHERE id_member = '$sesen_id' ORDER BY id_keranjang DESC";
$query = mysqli_query($koneksi,$cari);
$hasil = mysqli_fetch_array($query);

if($hasil > 0)
{
	$faktur = $hasil['id_keranjang'];
}
	else
	{
		$query 	= "INSERT INTO tb_keranjang (id_member,id_barang,jumlah,subtotal) VALUES ('$sesen_id','$id_barang','1','$harga')";
		$result = mysqli_query($koneksi,$query);

		$cari 	= "SELECT * FROM tb_keranjang ORDER BY id_keranjang DESC";
		$query 	= mysqli_query($koneksi,$cari);
		$hasil 	= mysqli_fetch_array($query);
		
		if ($hasil > 0)
		{
			$faktur = $hasil['id_keranjang'];
		}
}
?>