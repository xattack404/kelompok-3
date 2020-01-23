<?php session_start();                    // Memulai session
include 'config/koneksi.php';                     // Panggil koneksi ke database
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/navigasi.php';            // Panggil data navigasi
include 'fungsi/setting.php';             // Panggil data setting
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $katalog['judul'] ?> | <?php echo $namatoko ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $katalog['seo_deskripsi'] ?>" />
    <meta name="keywords" content="<?php echo $katalog['seo_keywords'] ?>" />
    <meta name="author" content="<?php echo $author ?>" />    
    <!-- CSS Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/aos.css">

    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/style.css">
<link rel="stylesheet" href="<?php echo $base_url ?>template/css/bootstrap.min.css" type="text/css">
  <!-- Favicon -->
  <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon" />
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="hero-wrap hero-bread" style="background-image: url('<?= $base_url ?>images/produk/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
            <h1 class="mb-0 bread"><?php echo $katalog['judul']; ?></h1>


          </div>
        </div>
      </div>
    </div>

            <?php include 'katalog_data.php'; ?>
              <hr/>
                

      </div>
      
      <hr/>

      <?php include 'footer.php'; ?>

    </div>
    
     <!-- Memanggil file JS -->
  <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
  <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
  <script src="<?php echo $base_url ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/popper.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/bootstrap.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.easing.1.3.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.waypoints.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.stellar.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/owl.carousel.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/aos.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.animateNumber.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/bootstrap-datepicker.js"></script>
  <script src="<?= $base_url ?>template/Design/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?= $base_url ?>template/Design/js/google-map.js"></script>
  <script src="<?= $base_url ?>template/Design/js/main.js"></script>
  </body>
</html>