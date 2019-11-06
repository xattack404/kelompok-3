<?php
$sql 	= "SELECT * FROM tb_konsultasi";
$data 	= mysqli_query($koneksi, $sql);
$konsultasi = mysqli_num_rows($data); 
?>