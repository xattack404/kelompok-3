<?php 
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';

if (isset($_POST['tambah'])) {
	$supplier = $_POST['supplier'];
	$tanggal = date('Y/m/d');

	$total = $_POST['total'];
	for ($i=1; $i <=$total ; $i++) {
		$nama = trim(mysqli_real_escape_string($conn, $_POST['nama-'.$i]));
		$gedung = trim(mysqli_real_escape_string( $conn, $_POST['gedung-'.$i]));
		$sql = mysqli_query($conn, "INSERT INTO tb_poliklinik (id_poli, nama_poli, gedung) VALUES ('', '$nama', '$gedung')") or die(mysqli_query($conn));
	}
	if ($sql) {
		echo "<script>alert('".$total." produk berhasil menambahkan stok.');window.location='data.php';</script>";
	}else{
		echo "<script>alert( 'data gagl ditambahkan ditambahkan. Coba lagi!');window.location='generate.php';</script>";
	}
}

?>