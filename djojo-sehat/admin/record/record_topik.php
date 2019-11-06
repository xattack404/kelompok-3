<?php
$sql 	= "SELECT * FROM tb_topik";
$data 	= mysqli_query($koneksi, $sql);
$topik = mysqli_num_rows($data); 
?>