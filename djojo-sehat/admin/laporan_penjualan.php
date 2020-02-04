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
        <div class="row">
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
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="box">
              <div class="box-body table-responsive padding">
                <?php 
                $query_data = mysqli_query($koneksi, "SELECT trans_jual.id_trans, trans_jual.berat, trans_jual.total_bayar, trans_jual.tanggal, tb_member.nama FROM trans_jual LEFT JOIN tb_member on tb_member.id_member = trans_jual.id_member WHERE status='5'");?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr bgcolor="skyblue">
                      <th style="text-align: center">No.</th>
                      <th >Aksi</th>
                      <th style="text-align: center">Tanggal</th>
                      <th style="text-align: center">Nama Pelanggan</th>
                      <th style="text-align: center">Jumlah terjual</th>
                      <th style="text-align: center">Berat</th>
                      <th style="text-align: center">Total Bayar</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  <?php while ($row = mysqli_fetch_array($query_data)){ ?>
                    <?php $id_trans = $row['id_trans']; ?>
                  <?php $quer = mysqli_query($koneksi, "SELECT sum(detail_jual.jumlah) as jumlah from detail_jual WHERE id_trans='$id_trans'"); $sum = mysqli_fetch_array($quer); ?>
                     <tr>
                      <td><?= $no++; ?></td>
                      <td><a href="tmp_mdl_jual.php?kd_jual=<?= $id_trans?>" class="btn btn-info" data-toggle="modal" data-target="#myModal" ><b>detail jual</b></td>
                      <td><?= $row['tanggal'] ?></td>
                      <td class="text-center"><?= $row['nama'] ?></td>
                      <td class="text-center"><?= $sum['jumlah'] ?></td>
                      <td class="text-center"><?= $row['berat'] ?></td>
                      <td class="text-right">Rp. <?= number_format($row['total_bayar'], 0, ',', '.').",-"; ?></td>
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
    <div class="modal fade" id="myModal" role="dialog" >
            <div class="modal-dialog" style="width: 800px;">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
        </div>
    <script language="javascript">
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    </script>

    <?php include "footer.php" ?>

  </div>

</body>

</html>
