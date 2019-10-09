<?php
$koneksi = mysqli_connect("localhost","root","","shiro");

//Check Connection
if($koneksi -> connect_error){
    die("Koneksi Gagal :".$koneksi -> connect_error);
}else "Koneksi Berhasil";
?>