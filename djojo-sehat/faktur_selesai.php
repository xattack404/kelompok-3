<?php 
if(isset($_SESSION['id_member']))
{
	$id_member = $_SESSION['id_member'];

	$cari 	= "SELECT * FROM tb_keranjang WHERE id_member = '$id_member' ORDER BY id_keranjang DESC";
	$query 	= mysqli_query($koneksi,$cari);
	$hasil 	= mysqli_fetch_array($query);
	if($hasil > 0)
	{
		$faktur = $hasil['id_keranjang'];
	}
}
?>