<?php session_start();                    // Memulai session
include 'config/koneksi.php';             // Panggil koneksi ke database
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/tgl_indo.php';            // Panggil fungsi tanggal indonesia
include 'fungsi/setting.php';             // Panggil data setting
include 'fungsi/navigasi.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $konsultasi['judul'] ?> | <?= $namatoko ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= $konsultasi['seo_deskripsi'] ?>" />
  <meta name="keywords" content="<?= $konsultasi['seo_keyword'] ?>" />
  <meta name="author" content="<?= $author ?>" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="<?= $base_url ?>template/css/bootstrap.min.css" type="text/css">
  <!-- Favicon -->
  <link href="<?= $base_url ?>images/fav.ico" rel="shortcut icon" />
</head>

<body>
  <?php include 'navbar.php'; ?>

  <div class="container">
      <div class="row">
        <div class="col-sm-12">
              <h3><?= $konsultasi['judul']; ?></h3>
              <hr/>
            <div class="caption-full">
              <div class="row text-center">
                <?php include 'konsultasi_form.php'; ?>
              </div>
          </div>
        </div>

        <?php include 'sidebar.php'; ?>

      </div>

      <hr/>

      <?php include 'footer.php'; ?>

    </div>
  <!-- Memanggil file JS -->
    <script src="<?= $base_url ?>template/js/jquery.js"></script>
    <script src="<?= $base_url ?>template/js/bootstrap.min.js"></script>
    <script src="<?= $base_url ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= $base_url ?>template/Design/js/bootstrap.min.js"></script>
    <script src="<?= $base_url ?>template/Design/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= $base_url ?>template/Design/js/jquery.slicknav.js"></script>
    <script src="<?= $base_url ?>template/Design/js/owl.carousel.min.js"></script>
    <script src="<?= $base_url ?>template/Design/js/jquery.nice-select.min.js"></script>
    <script src="<?= $base_url ?>template/Design/js/mixitup.min.js"></script>
    <script src="<?= $base_url ?>template/Design/js/main.js"></script>
    <script>
       $('#form').hide();
       function cancel(){
        $('#form').hide();
       }
       
      function tambah(){
      $('#form').show();

    }
    </script>
</body>

</html>
