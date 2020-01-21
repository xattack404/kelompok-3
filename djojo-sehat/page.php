<?php session_start();                    // Memulai session
include 'config/koneksi.php';             // Panggil koneksi ke database
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/navigasi.php';            // Panggil data navigasi
include 'fungsi/setting.php';             // Panggil data setting

$id_nav = mysqli_real_escape_string($koneksi,$_GET['id_nav']);
$sql    = "SELECT * FROM tb_navigasi WHERE judul_seo = '$id_nav' ";
$result = mysqli_query($koneksi,$sql);
$page   = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $page['judul'] ?> | <?php echo $namatoko ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $page['deskripsi'] ?>" />
  <meta name="keyword" content="<?php echo $page['judul'] ?>" />
  <meta name="author" content="<?php echo $author ?>" />
  <!-- CSS Bootstrap -->
  <link href="<?php echo $base_url ?>template/css/bootstrap.min.css" rel="stylesheet">
  <!-- Favicon -->
  <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon" />
</head>

<body>
  <?php include 'navbar.php'; ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-sm-push-3">
        <div class="thumbnail">
          <div class="col-md-12">
            <h3><?php echo $page['judul']; ?></h3>
            <hr />
          </div>
          <div class="caption-full">
            <?php
              if (mysqli_num_rows($result) > 0){
                echo " ".$page['isi']." ";
              }
              else{
                echo "Belum ada data";
              }
              ?>
          </div>
        </div>
      </div>

      <?php include 'sidebar.php'; ?>

    </div>

    <hr />

    <?php include 'footer.php'; ?>

  </div>

  <!-- Memanggil JS -->
  <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
  <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
</body>

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
</html>
