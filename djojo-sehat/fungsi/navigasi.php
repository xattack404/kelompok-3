<?php
$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keyword FROM tb_navigasi WHERE id_navigasi = 1 ";
$result 		= mysqli_query($koneksi,$sql);
$home   		= mysqli_fetch_array($result);

$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keyword FROM tb_navigasi WHERE id_navigasi = 6 ";
$result 		= mysqli_query($koneksi,$sql);
$katalog   = mysqli_fetch_array($result);

?>
