<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Passing Data To Modal</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/jquery.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/propper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </head>
 <?php 
//panggil konesi
  include('config/koneksi.php') 
?>
  <body>
    <div class="container">
      <div class="row"> 
        <table class="table table-bordered">
          <tr>
            <th>No</th>
            <th>ID Merk</th>
            <th>Nama Merk</th>
            <th>Warna</th>
            <th>Jumlah</th>
            <th colspan="2">Opsi</th>
          </tr>
          <?php
	//panggil semua data di tabel barang
    $query = mysqli_query($koneksi,"select * from barang");
 	$no = 1;
   
    while ($data = mysqli_fetch_array($query)) {
    ?>
             <tr>     
             <td><?php echo $no; ?></td>
             <td><?php echo $data['no_id']; ?></td>
           	 <td><?php echo $data['nama_merk']; ?></td>
           	 <td><?php echo $data['warna']; ?></td>
             <td><?php echo $data['jumlah']; ?></td>
             <td><a href='tambah.php' class='btn btn-danger btn-small' id='custId' data-toggle='edit'>Hapus</a></td>
              <td><a href='delete.php?id=<?php echo $data['no_id']; ?>' class='btn btn-danger btn-small' id='custId' data-toggle='edit'>Hapus</a></td>
              <td><a href='ubah.php?id=<?php echo $data['no_id']; ?>' class='btn btn-warning btn-small' id='custId' data-toggle='edit'>Ubah</a></td>
             </tr>
            <?php 
            $no++; 
	}
            ?>

        </table>
      </div>
    </div>
 
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail </h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
 
   </body>
</html>