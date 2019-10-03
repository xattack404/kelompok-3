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
</head>
<body>
	<div class="container-fluid">
	<div class="box">
		<h1>Mahasiswa</h1>
		<h4>
			<small>Data Mahasiswa</small>
			<div class="pull-right">
				<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
				<a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Mahasiswa</a>
				<a href="../auth/logout.php" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Keluar</a>
			</div>
		</h4>
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" id="dokter">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nim</th>
							<th>nama</th>
							<th>alamat</th>
							<th>tanggal lahir</th>
							<th>No. Telepon</th>
							<th><i class="glyphicon glyphicon-cog"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						$sql_poli = mysqli_query($conn, "SELECT * FROM tb_mahasiswa ") or die(mysqli_error($conn));
							while ($data = mysqli_fetch_array($sql_poli)) {?>
								<tr>
									<td><?= $no++ ?>.</td>
									<td><?= $data['nim'] ?></td>
									<td><?= $data['nama_mahasiswa'] ?></td>
									<td><?= $data['alamat'] ?></td>
									<td><?= $data['tgl'] ?></td>
									<td><?= $data['no_hp'] ?></td>
									<td>
										<a href="edit.php?id=<?=$data['id_mahasiswa']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
										<a href="del.php?id=<?=$data['id_mahasiswa']?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
									</td>
								</tr>
							<?php
							}
						?>
					</tbody>
				</table>
		</div>
	</div>
	</div>		
</body>
</html>