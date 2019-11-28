<?php

$sql_total_berat 		= mysqli_query($koneksi,"SELECT sum(berat) AS berat FROM tb_keranjang 
												 WHERE tb_keranjang.id_member = '$sesen_id' ");
$data 							= mysqli_fetch_array($sql_total_berat);
$jumlah_berat 		= $data['berat'];
$total_berat 		= round($jumlah_berat,2);
$total_berat_genap 	= ceil($jumlah_berat);
?>