<?php 
if(isset($_SESSION['id_member']))
{
	$id_member = $_SESSION['id_member'];

	$cari 	= "SELECT * FROM trans_jual WHERE id_member = '$id_member' ORDER BY id_trans DESC";
	$query 	= mysqli_query($koneksi,$cari);
	$hasil 	= mysqli_fetch_array($query);
	if($hasil > 0)
	{
		$faktur_selesai = $hasil['id_trans'];
	}
}
?>