<html lang="en">
<?php

include 'config/koneksi.php';
?>
<?php
$id = $_GET['id'];
 
$query = mysqli_query($koneksi,"select * from barang where no_id='$id'") or die(mysql_error());
 
$data = mysqli_fetch_array($query);
?>
<head>
  <title>Registrasi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/jquery.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/propper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <div class="card">

    <div class="card-header bg-dark text-white">Entry Form</div>
    <div class="card-body">

      <form method="post" action="">
        <div class="form-group">
          <label for="no_id">No ID</label><input type="text" class="form-control" value="<?php echo $id; ?>"  name="no_id" id="no_id" disabled>
        </div>
        <div class="form-group">
          <label for="nama_merk">Nama Merk</label><input type="text" class="form-control" value="<?php echo $data['nama_merk']; ?>"  name="nama_merk" id="nama_merk">
        </div>

       <div class="form-group">
          <label for="warna">Warna</label><input type="text" class="form-control" value="<?php echo $data['warna']; ?>" name="warna" id="warna">
        </div>

       <div class="form-group">
          <label for="jumlah">Jumlah</label><input type="text" class="form-control" value="<?php echo $data['jumlah']; ?>" name="jumlah" id="jumlah">
        </div>
        
        <div class="form-group">
    <button type="submit" name="simpan" class="btn btn-dark">Simpan Data</button>
    <button type="reset" class="btn btn-warning">Reset</button>
      </form>
    </div>
  </div>
</div>
</body>

<?php
 if (isset($_POST['simpan'])){
//tangkap data dari forms

$nama = $_POST['nama_merk'];
$warna = $_POST['warna'];
$jumlah = $_POST['jumlah'];

//update data di database sesuai user_id
$query1 = mysqli_query($koneksi,"update barang set nama_merk='$nama', 
                       warna='$warna', jumlah='$jumlah' where no_id='$id'") or die(mysqli_error());
 
echo "<script>alert('Data berhasil disimpan!');location='view.php';</script>"; 
}
?>
</html>