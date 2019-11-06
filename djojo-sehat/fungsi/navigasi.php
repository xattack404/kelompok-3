<?php
$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keywords FROM navigasi WHERE id_nav = 1 ";
$result 		= mysqli_query($conn,$sql);
$home   		= mysqli_fetch_array($result);

$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keywords FROM navigasi WHERE id_nav = 6 ";
$result 		= mysqli_query($conn,$sql);
$katalog   = mysqli_fetch_array($result);

$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keywords FROM navigasi WHERE id_nav = 7 ";
$result 		= mysqli_query($conn,$sql);
$keranjang  = mysqli_fetch_array($result);

$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keywords FROM navigasi WHERE id_nav = 8 ";
$result 		= mysqli_query($conn,$sql);
$resi   		= mysqli_fetch_array($result);

$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keywords FROM navigasi WHERE id_nav = 9 ";
$result 		= mysqli_query($conn,$sql);
$testimoni 	= mysqli_fetch_array($result);

$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keywords FROM navigasi WHERE id_nav = 10 ";
$result 		= mysqli_query($conn,$sql);
$register 	= mysqli_fetch_array($result);
?>
