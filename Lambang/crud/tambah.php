<html lang="en">
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

      <form method="post" action="simpan.php">
        <div class="form-group">
          <label for="no_id">No ID</label><input type="text" class="form-control"  name="no_id" id="no_id">
        </div>
        <div class="form-group">
          <label for="nama_merk">Nama Merk</label><input type="text" class="form-control"  name="nama_merk" id="nama_merk">
        </div>

       <div class="form-group">
          <label for="warna">Warna</label><input type="text" class="form-control"  name="warna" id="warna">
        </div>

       <div class="form-group">
          <label for="jumlah">Jumlah</label><input type="text" class="form-control"  name="jumlah" id="jumlah">
        </div>
        
        <div class="form-group">
    <button type="submit" name="simpan" class="btn btn-dark">Simpan Data</button>
    <button type="reset" class="btn btn-warning">Reset</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>