<?php session_start();
include '../config/koneksi.php';                // Panggil koneksi ke database
include 'cek_login.php';      // Panggil fungsi cek sudah login/belum
include 'cek_session.php';    // Panggil fungsi cek session
include '../fungsi/cek_aksi_ubah.php';
//Panggil fungsi boleh ubah data atau tidak 
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Ubah Data Supplier | <?php include "title.php" ?></title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../images/fav.ico" />
  <!-- JS -->
  <?php include 'js.php'; ?>
</head>

<body class="skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include "header.php"; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>Ubah Data Supplier</h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Supplier</li>
          <li class="active">Ubah Data Supplier</li>
        </ol>
      </section>

      <section class="content">
        <?php include "supplier_ubah_form.php" ?>
      </section>
    </div>

    <?php include "footer.php" ?>

  </div>

</body>

</html>