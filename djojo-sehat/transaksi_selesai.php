<?php session_start();
include 'config/koneksi.php';              // Panggil koneksi ke database
include 'faktur.php';                      
include 'faktur_selesai.php';             // Panggil data faktur yang telah selesai
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/cek_login_public.php';    // Panggil fungsi cek login public
include 'fungsi/navigasi.php';            // Panggil data navigasi
include 'fungsi/setting.php';             // Panggil data setting
include 'fungsi/tgl_indo.php';            // Panggil fungsi tanggal indonesia
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Transaksi Selesai | <?php echo $namatoko ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="<?php echo $author ?>" />    
    <!-- CSS Bootstrap -->
    <link href="<?php echo $base_url ?>template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>template/css/nomoretable.css" rel="stylesheet">
    <!-- Favicon -->
    <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon"/>
    
    <!-- Memanggil file JS -->  
  <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
  <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
  <script src="<?php echo $base_url ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/bootstrap.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/jquery.slicknav.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/owl.carousel.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/jquery.nice-select.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/mixitup.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/main.js"></script>
  </head>
  <body>
    <?php
     include 'navbar.php'; 
    ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-sm-push-3">
          <div class="thumbnail">
            <div class="col-md-12">
              <h3>Transaksi Selesai</h3>
              <hr/>
            </div>
            <div class="caption-full">
              <?php include 'transaksi_selesai_data.php'; ?>
            </div>
          </div>
        </div>

        <?php include 'sidebar.php'; ?>
        
      </div>  
      
      <hr/>

      <?php include 'footer.php'; ?>

    </div>
    
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/popper.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/bootstrap.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.stellar.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/owl.carousel.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/aos.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/scrollax.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/google-map.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/main.js"></script>
  </body>
</html>
