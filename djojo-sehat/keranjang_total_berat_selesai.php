<?php
$sql_total_berat 		= mysqli_query($koneksi,"SELECT sum(jumlah_berat) AS jumlah_berat FROM detail_jual 
						          INNER JOIN tb_barang ON tb_barang.id_barang = detail_jual.id_barang 
						          INNER JOIN trans_jual ON trans_jual.id_trans = detail_jual.id_trans 
						          WHERE  trans_jual.id_trans = '$faktur_selesai' 
					          	AND trans_jual.status = 2 ");
$data 							= mysqli_fetch_array($sql_total_berat);
$jumlah_berat 			= $data['jumlah_berat'];
$total_berat 				= round($jumlah_berat,2);
$total_berat_genap 	= ceil($jumlah_berat);
?>