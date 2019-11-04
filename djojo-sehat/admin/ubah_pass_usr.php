<?php session_start();
include '../config/koneksi.php';                    // Panggil koneksi ke database
include 'cek_login.php';          // Panggil fungsi cek sudah login/belum
include 'cek_session.php';        // Panggil fungsi cek session
include '../fungsi/cek_aksi_ubah.php';      // Panggil fungsi boleh ubah data atau tidak
include '../fungsi/cek_hal_superadmin.php'; // Panggil fungsi hanya superadmin yang boleh melakukan aksi
//include '../fungsi/setting.php';            // Panggil data setting
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ubah Password User Lain | <?php include "title.php" ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../images/fav.ico" />
    <!-- JS -->
    <?php include 'js.php'; ?>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include "header.php" ?>
     
      <div class="content-wrapper">
        <section class="content-header">
          <h1>Ubah Password User Lain</h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Password User Lain</li>
            <li class="active"><a href="ubah_pass_usr.php">Ubah Password User Lain</a></li>
          </ol>
        </section>

        <section class="content">
          <?php include "ubah_pass_usr_form.php" ?>
        </section>
      </div>

      <?php include "footer.php" ?>
      
    </div>

    
  </body>
</html>