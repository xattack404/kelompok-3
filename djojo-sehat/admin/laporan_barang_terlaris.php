<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include 'cek_session.php';      // Panggil fungsi cek session
//include '../fungsi/setting.php';          // Panggil data setting
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Daftar Penjualan | <?php include "title.php" ?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../images/fav.ico" />
  <!-- JS -->
  <?php include 'js.php'; ?>
  <!-- Data Tables -->
  <link href="template/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="template/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="template/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <!-- Skrip Datatables -->
  <script type="text/javascript">
    $(document).ready(function () {
      $('#example1').DataTable();
    });
  </script>
</head>

<body class="skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include 'header.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>Laporan Penjualan </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Laporan</li>
          <li class="active"><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
        </ol>
      </section>

      <section class="content">
        <!-- <div class="row">
          <div class="col-lg-8">
             <div class="table-responsive">
                <form action="lap_transaksi_penjualan.php" method="post">
                     <table class="table table-bordered" >
                        <tr bgcolor="white">
                            <td width="50"><input required type="radio" name="cek" value="1" style="cursor: pointer;"></td>
                            <td>Semua data</td>
                        </tr>
                        <tr bgcolor="white">
                            <td width="50"><input required type="radio" name="cek" value="2" style="cursor: pointer;"></td>
                            <td>TANGGAL <br>   
                              <b>Dari :</b><input type="date" name="tgl_awal" value="<?= date("Y/m/d") ?>" style="height: 20px;" > <span class="pull-right"><b>Sampai :</b><input type="date" value="<?= date("Y/m/d") ?>" name="tgl_akhir" style="height: 20px;"></span>
                            </td>
                        </tr>
                        <tr bgcolor="white">
                            <td> </td>
                            <td class="text-left"><input type="submit" name="tampilkan" class="btn btn-danger" value="Cetak PDF"></td>
                        </tr>
                    </table>
                  </form>
              </div>
          </div>
        </div> -->
        <div class="row">
          <div class="col-lg-12">
            <div class="box">
              <div class="box-body table-responsive padding">
                <?php 
                $query_data = mysqli_query($koneksi, "SELECT tb_barang.nama_barang, sum(detail_jual.jumlah) as jumlah, tb_barang.id_barang FROM tb_barang INNER JOIN detail_jual ON tb_barang.id_barang = detail_jual.id_barang group by detail_jual.id_barang order by sum(detail_jual.jumlah) desc limit 10");?>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr bgcolor="skyblue">
                      <th style="text-align: center">No.</th>
                      <th style="text-align: center">Nama Barang</th>
                      <th style="text-align: center">Jumlah terjual</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  <?php while ($row = mysqli_fetch_array($query_data)){ ?>
                     <tr>
                      <td><?= $no++; ?></td>
                      <td class="text-left"><?= $row['nama_barang'] ?></td>
                      <td class="text-center"><?= $row['jumlah'] ?></td>
                     </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  

    <?php include "footer.php" ?>

  </div>

</body>

</html>
