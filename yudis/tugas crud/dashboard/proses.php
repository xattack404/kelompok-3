<?php 

require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;



if (isset($_POST['tambah'])) {
	$uuid = Uuid::uuid4()->toString();
	$nim = trim(mysqli_real_escape_string($conn, $_POST['nim']));
	$nama = trim(mysqli_real_escape_string( $conn, $_POST['nama']));
	$alamat = trim(mysqli_real_escape_string( $conn, $_POST['alamat']));
	$tgl = trim(mysqli_real_escape_string( $conn, $_POST['tgl']));
	$no_hp = trim(mysqli_real_escape_string( $conn, $_POST['no_hp']));
	mysqli_query($conn, "INSERT INTO tb_mahasiswa (id_mahasiswa, nim, nama_mahasiswa, alamat, tgl, no_hp) VALUES ('$uuid', '$nim', '$nama', '$alamat', '$tgl', '$no_hp')") or die(mysqli_error($conn));
	echo "<script>window.location='data.php';</script>";

}else if (isset($_POST['ubah'])) {
	$id =  $_POST['id'];
	$nim = trim(mysqli_real_escape_string($conn, $_POST['nim']));
	$nama = trim(mysqli_real_escape_string( $conn, $_POST['nama']));
	$alamat = trim(mysqli_real_escape_string( $conn, $_POST['alamat']));
	$tgl = trim(mysqli_real_escape_string( $conn, $_POST['tgl']));
	$no_hp = trim(mysqli_real_escape_string( $conn, $_POST['no_hp']));
	mysqli_query($conn, "UPDATE tb_mahasiswa SET nim = '$nim', nama_mahasiswa = '$nama', alamat ='$alamat', tgl = '$tgl', no_hp = $no_hp WHERE id_mahasiswa = '$id'") or die(myqli_error($conn));
	echo "<script>window.location='data.php';</script>";
}


?>
