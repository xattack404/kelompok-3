<?php
$sql 	= "SELECT * FROM tb_supplier ";
$data 	= mysqli_query($koneksi, $sql);
$supplier = mysqli_num_rows($data); 
?>