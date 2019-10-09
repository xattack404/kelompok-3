<?php
$host 		= "localhost";
$username 	= "root";
$password 	= "";
$dbname 	= "djojo_sehat";

// Buat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// cek koneksi
if($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}
echo "Koneksi Succesfull";
?>
