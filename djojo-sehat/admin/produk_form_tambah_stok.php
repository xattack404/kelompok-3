<?php
 session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include 'cek_session.php';      // Panggil fungsi cek session
//include '../fungsi/setting.php';          // Panggil data setting
//include '../fungsi/tgl_indo.php';         // Panggil fungsi merubah tanggal menjadi format seperti 2 Mei 2015
$chk = $_POST['checked'];

if (!isset($chk)) {
	echo "<script>alert('Tidak ada data yang dipilih');window.location='produk_kurang.php';</script>";
}else{

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Daftar Produk | <?php include "title.php" ?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../images/fav.ico" />
  <!-- JS -->
  <?php include 'js.php'; ?>
  </head>

<body class="skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include 'header.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>Tambah Stok Produk</h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Produk</li>
          <li class="active"><a href="#">Tambah Stok Produk</a></li>
        </ol>
      </section>

      <section class="content">
      	<form action="produk_proses_tambah_stok.php" method="post">
      	<div class="row">
      		<div class="col-lg-3 col-lg-offset-1">
      		<label>Nama Supplier</label>
              <br />
              <select name="supplier" id="supplier" class="form-control" required>
                <option value="">--Pilih Supplier--</option>
                <?php
                $query = "SELECT * FROM tb_supplier ORDER BY nama_supplier";
                $sql = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['id_supplier'].'">'.$data['nama_supplier'].'</option>';}
                ?>
              </select>
              </div>
              <div class="col-lg-3">
              	<label>Tanggal</label><br>
      			<label style="background-color: white; padding: 4px;"><?= date('Y/m/d') ?></label>
              </div>
      	</div><br>
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				
					<input type="hidden" name="total" value="<?= $d = count($chk); ?>">
					<div class="box">
					<div class="box-body table-responsive padding">
					<table class="table table-bordered ">
						<thead>
						<tr>
							<th>#</th>
							<th>Nama Barang</th>
							<th class="text-center">Harga Beli</th>
							<th>Jumlah</th>
							<th>Sub Total</th>
						</tr>
						</thead>
						<tbody>
						<!-- <tr>
							<th>#</th>
							<th>#</th>
							<th class="text-center">Harga Lama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Harga Baru</th><th>#</th>
							<th>#</th>
						</tr> -->
						<?php
						$no=1; 
						//var_dump($id_barang);
						foreach ($chk as $id) {
							$sql_poli = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang = '$id'") or die(mysqli_error($koneksi));
							while ($data = mysqli_fetch_array($sql_poli)) {?>
							<tr>
								<td><?= $no++ ?></td>
								<td>
									<input type="hidden" name="id[]" value="<?= $data['id_barang']?>">
									<?= $data['nama_barang'] ?>
								</td>
								<td class="text-center">
								<input type="text" id="harga_beli<?= $data['id_barang']?>" name="harga_beli[]" value="<?= $data['harga_beli'] ?>" onkeypress="return isNumberKey(event)" required>
								</td>
								<td>
									<input type="text" id="jumlah<?= $data['id_barang']?>" name="jumlah[]" onkeypress="return isNumberKey(event)" required>
								</td>
								<td>
									<input type="text" readonly id="sub_total<?= $data['id_barang']?>" name="sub_total[]" class="form-control" required>
								</td> 

								<script>
							$(document).ready(function(){
								$('#jumlah<?= $data['id_barang']?>').keyup(function(){
									const nilaiawal = $('#harga_beli<?= $data['id_barang']?>').val();
									const myvalue = $(this).val();
									$('#sub_total<?= $data['id_barang']?>').val(parseInt(nilaiawal) * parseInt(myvalue));
									var count = $('#sub_total<?= $data['id_barang']?>').val();
									if ($('#total_harga').val() == '') {
										$('#total_harga').val(parseInt(count));
									}else{
										var myint = parseInt($('#total_harga').val());
										$('#total_harga').val(parseInt(count) + myint);
									}
									
									var countjml = $('#jumlah<?= $data['id_barang']?>').val();
									if ($('#total_jumlah').val() == '') {
										$('#total_jumlah').val(parseInt(countjml));
									}else{
										var myint2 = parseInt($('#total_jumlah').val());
										$('#total_jumlah').val(parseInt(countjml) + myint2);
									}				

								});
								
							});
							</script>
								
							</tr>
							<?php
						}
						}
						?>

						
						
							<td colspan="3"><center>Total</center></td>
							<td><input type="text" name="total_jumlah" class="form-control" style="width: 150px;" id="total_jumlah" readonly></td>
							<td><input type="text" name="total_harga" id="total_harga<?= $data['id_barang']?>" class="form-control" readonly></td>
					
						</tbody>
					</table>
				</div>
			</div>
					<div class="form-group pull-right">
						<input type="submit" name="tambah" value="Simpan Transaksi" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
	 </section>
    </div>


    <?php include "footer.php" ?>

  </div>

</body>
<!-- <script type="text/javascript" src="template/autoNumeric.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#harga_beli').autoNumeric('init');
        $('#sub_total').autoNumeric('init');
    });
</script> -->
<script>

    function isNumberKey(evt)
    {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
      return true;
    }
    </script>
</html>


	
<?php 
}
?>