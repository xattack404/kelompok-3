<?php session_start();
include 'config/koneksi.php';                     // Panggil koneksi ke database
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/navigasi.php';            // Panggil data navigasi
include 'fungsi/setting.php';             // Panggil data setting


// Jika data tidak ditemukan maka akan muncul alert belum ada data
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <title><?php echo $konsultasi['nama_produk']; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $konsultasi['seo_deskripsi'] ?>" />
    <meta name="keywords" content="<?php echo $konsultasi['seo_keyword'] ?>" />
    <meta name="author" content="<?php echo $namatoko ?>" />
    <!-- Facebook SEO -->
    <script src="Konsul.js"></script>
    <meta property="og:title" content="<?php echo $konsultasi['nama_produk']; ?> | <?php echo $namatoko ?>" />
    <meta property="og:url" content="<?php echo $base_url; echo "produk/"; echo $konsultasi['judul_seo']; echo ".html" ?>" />
    <meta property="og:image" content="<?php echo $base_url; echo "images/produk/"; echo $konsultasi['img']; ?>" />
    <meta property="og:description" content="Dapatkan <?php echo $konsultasi['nama_produk']; ?> dan barang lainnya dengan harga yang terjangkau, berkualitas, dan bergaransi hanya di <?php echo $namatoko ?>" />
    <!-- CSS Bootstrap -->
    <link href="<?php echo $base_url ?>template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>template/css/jquery.fancybox.css" rel="stylesheet"/>
    <!-- Favicon -->
    <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon"/>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="hero-wrap hero-bread" style="background-image: url(<?= $base_url?>/images/produk/bg_6.jpg)">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center"><p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Konsutasi</span></p><h1 class="mb-0 bread">Konsultasi</h1>
      </div>
      </div>
      </div>
      </div>

      <?php include 'konsultasi_form.php'; ?>

      <hr/>

      <?php include 'footer.php'; ?>


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
    <script src="<?php echo $base_url ?>template/Design/js/main.js">
    </script>
    </script>
  </body>
</html>
