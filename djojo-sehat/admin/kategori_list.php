<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include 'cek_session.php';      // Panggil fungsi cek session
include '../fungsi/cek_aksi_tambah.php';  // Panggil fungsi boleh tambah data atau tidak
//include '../fungsi/setting.php';          // Panggil data setting
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Daftar Kategori | <?php include "title.php" ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../images/fav.ico" />
    <!-- JS -->
    <?php include 'js.php'; ?>
    <!-- Data Tables -->
    <link href="template/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <script src="template/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="template/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- Skrip Datatables -->
    <script type="text/javascript">
    $(document).ready( function () {
      $('#example1').DataTable();
    });
    </script>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include 'header.php'; ?>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>Daftar Kategori <small><a href="kategori_add.php">Tambah Kategori Baru</a></small></h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Kategori</li>
            <li class="active"><a href="kategori_list.php">Daftar Kategori</a></li>
          </ol>
        </section>

        <section class="content">
          <?php include "kategori_list_data.php" ?>
        </section>
      </div>

      <?php include "footer.php" ?>

    </div>

  </body>
</html>
