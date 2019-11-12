<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include 'cek_session.php';      // Panggil fungsi cek session
//include '../fungsi/setting.php';          // Panggil data setting
include '../fungsi/tgl_indo.php';         // Panggil fungsi merubah tanggal menjadi format seperti 2 Mei 2015

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Daftar Member | <?php include "title.php" ?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../images/fav.ico" />
  <!-- JS -->
  <?php include 'js.php'; ?>
  <!-- Data Tables -->
  <link href="template/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="template/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="template/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="../template/css/bootstrap.min.css">
  <!-- Skrip Datatables -->

  <script type="text/javascript">
    $(document).ready(function () {
      $('#example1').DataTable();
    });
  </script>
</head>

<body class="skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include "header.php" ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>Daftar Member <small><a href="member_add.php">Tambah Member Baru</a></small></h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Member</li>
          <li class="active"><a href="member_list.php">Daftar Member</a></li>
        </ol>
      </section>

      <section class="content">
        <?php include "member_list_data.php" ?>
       <?php  include 'detailmember.php'; ?>
      </section>
    </div>

    <?php include "footer.php" ?>

  </div>

</body>

</html>
