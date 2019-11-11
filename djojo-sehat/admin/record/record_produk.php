<?php
$sql 	= "SELECT * FROM tb_barang";
$data 	= mysqli_query($koneksi, $sql);
$produk = mysqli_num_rows($data); 
?>