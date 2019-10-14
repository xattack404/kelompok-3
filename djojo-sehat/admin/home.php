<?php session_start();
include '../config/koneksi.php';              // Panggil koneksi ke database
include 'cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'cek_session.php';  // Panggil fungsi cek session
//include '../fungsi/setting.php';      // Panggil data setting
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Dashboard | <?php include "title.php"; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="template/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="template/font-awesome4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="template/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="template/dist/css/skins/skin-yellow.min.css" rel="stylesheet" type="text/css" />
    <!-- Favicon -->
    <link href="../images/fav.ico" rel="shortcut icon" />
  </head>
  <body class="skin-yellow sidebar-mini">
    <div class="wrapper">
      <?php include "header.php" ?>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>Dashboard</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <section class='content'>
          <div class='row'>
            <?php include 'record.php'; ?>
          </div>
        </section>

      </div>
      <?php include "footer.php" ?>
    </div>

    <?php include 'js.php'; ?>
  </body>
</html>
