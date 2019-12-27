<?php 
$koneksi = mysqli_connect("127.0.0.1","root","","djojo_store");
 
// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>