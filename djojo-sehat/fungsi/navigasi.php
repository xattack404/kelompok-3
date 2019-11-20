<?php
$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keyword FROM tb_navigasi WHERE id_navigasi = 1 ";
$result 		= mysqli_query($koneksi,$sql);
$home   		= mysqli_fetch_array($result);

$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keyword FROM tb_navigasi WHERE id_navigasi = 6 ";
$result 		= mysqli_query($koneksi,$sql);
$katalog        = mysqli_fetch_array($result);

$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keyword FROM tb_navigasi WHERE id_navigasi = 7 ";
$result 		= mysqli_query($koneksi,$sql);
$keranjang   	= mysqli_fetch_array($result);

$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keyword FROM tb_navigasi WHERE id_navigasi = 9 ";
$result 		= mysqli_query($koneksi,$sql);
$register   	= mysqli_fetch_array($result);

$sql    		= "SELECT judul,isi,seo_deskripsi,seo_keyword FROM tb_navigasi WHERE id_navigasi = 8 ";
$result 		= mysqli_query($koneksi,$sql);
$konsultasi   	= mysqli_fetch_array($result);
?>
