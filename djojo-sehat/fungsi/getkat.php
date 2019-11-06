<?php
include "../config.php";
$sql = "SELECT * FROM tb_kategori ORDER BY nama_kategori";
$getComboNegara = mysqli_query($koneksi, $sql) or die ('Query Gagal'); 
?>