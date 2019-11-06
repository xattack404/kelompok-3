<?php
$sql 	= "SELECT * FROM tb_login";
$data 	= mysqli_query($koneksi, $sql);
$login = mysqli_num_rows($data); 
?>