<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include 'cek_session.php';      // Panggil fungsi cek session
include '../fungsi/setting.php';          // Panggil data 
include '../fungsi/base_url.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Pesanan Barang Baru | <?php include "title.php" ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../images/fav.ico" />
    <!-- JS -->
    <?php include 'js.php'; ?>
    <!-- Data Tables -->
    <link href="template/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <script src="template/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="template/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
    <!-- Skrip Datatables -->
    <script type="text/javascript">
    $(document).ready( function () {
      $('#example1').DataTable();
    });
    </script>
  </head>
  <body class="skin-blue sidebar-mini">
      <?php include 'header.php'; ?>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>Daftar Pesanan Barang</h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="pesanan.php">Daftar Pesanan Barang</a></li>
          </ol>
        </section>

        <section>
<?php include 'pesanan_data.php';?>
        </section>
      </div>
      <?php include "footer.php" ?>

    </div>

  </body>
</html>
</body>
