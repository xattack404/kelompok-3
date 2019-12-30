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
  <title>Tambah Barang Baru | <?php include "title.php" ?></title>
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
        <h1>Form Entry Barang Baru</h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Barang</li>
          <li class="active"><a href="produk_add.php">Entry Barang Baru</a></li>
        </ol>
      </section>

      <section class="content">
        <?php include "produk_add_form.php" ?>
      </section>
    </div>
    <?php include "footer.php" ?>

  </div>

</body>

</html>