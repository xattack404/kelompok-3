<?php 

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
	<div class="box">
		<h1>Dokter</h1>
		<h4>
			<small>Data Dokter</small>
			<div class="pull-right">
				<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
				<a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Dokter</a>
			</div>
		</h4>
		<form method="post" name="proses">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" id="dokter">
					<thead>
						<tr>
							<th>
								<center>
									<input type="checkbox" id="select_all" value="">
								</center>
							</th>
							<th>No.</th>
							<th>Nama Dokter</th>
							<th>Spesialis</th>
							<th>Alamat</th>
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
										<a href="hapus.php?id=<?=$data['id_mahasiswa']?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
									</td>
								</tr>
							<?php
							}
						?>
					</tbody>
				</table>
		</div>
		</form>
	</div>		
</body>
</html>