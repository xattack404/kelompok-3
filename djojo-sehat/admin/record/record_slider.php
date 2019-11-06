<?php
$sql 	= "SELECT * FROM tb_slider";
$data 	= mysqli_query($koneksi, $sql);
$slider = mysqli_num_rows($data); 
?>