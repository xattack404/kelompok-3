<?php 


date_default_timezone_set('Asia/Jakarta');
// session_start();
include_once "conn.php";
$conn = mysqli_connect($conn['host'], $conn['user'], $conn['pass'], $conn['db']); 
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}

?>