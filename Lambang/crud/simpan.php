<?php
//panggil koneksi dari folder config unduk sambung ke DB
include('config/koneksi.php');

//jika klik tombol simpan
if(isset($_POST['simpan']));

//maka tangkap data dari form
$no = $_POST['no_id'];
$nama = $_POST['nama_merk'];
$warna = $_POST['warna'];
$jumlah = $_POST['jumlah'];


//simpan data ke database
	$query = mysqli_query($koneksi,"insert into barang values('$no', 
															  '$nama', 
															  '$warna', '
															  $jumlah')") or die(mysqli_error());
 
echo "<script>alert('Data berhasil disimpan!');location='view.php';</script>"; 

?>