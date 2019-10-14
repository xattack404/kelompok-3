<?php 
session_start();
require_once "../_config/config.php";
if (!isset($_SESSION['login'])) {
	header("Location: auth/login.php");
	exit;	
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Data mahasiswa</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="../_assets/css/bootstrap.min.css"> 
    <link rel="icon" href="../_assets/q.jpg">
    <script src="../_assets/ajax.js"></script>
    <script src="../_assets/js/bootstrap.min.js"></script>
    <script src="../_assets/libs/vendor/ckeditor/ckeditor/ckeditor.js"></script>
</head>
<body>
	<div class="container">
		<div class="box">
		<h1>Mahasiswa</h1>
		<h4>
			<small>Tambah Data Mahasiswa</small>
			<div class="pull-right">
				<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left "></i>Kembali</a>
			</div>
		</h4>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<form action="proses.php" method="post">
					<div class="form-group">
						<label for="nim">NIM</label>
						<input type="text" name="nim" id="nim" autofocus class="form-control" required>
					</div>
					<div class="form-group">
						<label for="nama">Nama Mahasiswa</label>
						<input type="text" name="nama" id="nama"  class="form-control" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" id="alamat" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label for="tgl">Tanggal Lahir</label>
						<input type="text" name="tgl" id="tgl"  class="form-control" required>
					</div>
					<div class="form-group">
						<label for="no_hp">Nomor Handphone</label>
						<input type="number" name="no_hp" id="no_hp" class="form-control" required>
					</div>
					<div class="form-group pull-right">
						<input type="submit" name="tambah" value="Simpan" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	<script>
		CKEDITOR.replace('alamat', {
		uiColor : '#ec43if'
		});
	</script>		
</body>
</html>