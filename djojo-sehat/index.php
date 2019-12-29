<?php session_start();                    // Memulai session
include 'config/koneksi.php';            // Panggil koneksi ke database
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/navigasi.php';            // Panggil data navigasi
include 'fungsi/setting.php';             // Panggil data setting
include 'record_keranjang.php';
//pengunjung();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $home['judul'] ?> | <?php echo $namatoko ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $home['seo_deskripsi'] ?>" />
  <meta name="keywords" content="<?php echo $home['seo_keyword'] ?>" />
  <meta name="author" content="<?php echo $author ?>" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="<?php echo $base_url ?>template/css/bootstrap.min.css" type="text/css">
  <!-- Favicon -->
  <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon" />
</head>

<body> 
  <!-- Page Preloder -->
  <!-- Search model -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-switch">+</div>
      <form class="search-model-form">
        <input type="text" id="search-input" placeholder="Search here.....">
      </form>
    </div>
  </div>
  <!-- Search model end -->

  <!-- Header Section Begin -->
  <?php
include 'navbar.php';
?>
  <!-- Header Info Begin -->
  
  <!-- Header Info End -->
  <!-- Header End -->

  <!-- Hero Slider Begin -->
  <section class="hero-slider">
    <?php
        include 'slider.php';
        ?>
  </section>
  <!-- Hero Slider End -->

  <!-- Features Section Begin -->
  <section class="features-section spad">
    <div class="features-ads">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="single-features-ads first">
              <img src="<?php echo $base_url ?>template/Design/icons/f-delivery.png" alt="">
              <h4>Free shipping</h4>
              <p> </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="single-features-ads second">
              <img src="<?php echo $base_url ?>template/Design/icons/coin.png" alt="">
              <h4>100% Money back </h4>
              <p></p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="single-features-ads">
              <img src="<?php echo $base_url ?>template/Design/icons/chat.png" alt="">
              <h4>Online support 24/7</h4>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Features Box -->
    

  
      
  <!-- Latest Product End -->

  <!-- Lookbok Section Begin -->
  <!-- Lookbok Section End -->

  <!-- Logo Section Begin -->
  <div class="logo-section spad">
    <div class="logo-items owl-carousel">
      <div class="logo-item">
        <img src="<?php echo $base_url ?>template/Design/logos/logo-1.png" alt="">
      </div>
      <div class="logo-item">
        <img src="<?php echo $base_url ?>template/Design/logos/logo-2.png" alt="">
      </div>
      <div class="logo-item">
        <img src="<?php echo $base_url ?>template/Design/logos/logo-3.png" alt="">
      </div>
      <div class="logo-item">
        <img src="<?php echo $base_url ?>template/Design/logos/logo-4.png" alt="">
      </div>
      <div class="logo-item">
        <img src="<?php echo $base_url ?>template/Design/logos/logo-5.png" alt="">
      </div>
    </div>
  </div>
  <!-- Logo Section End -->

  <!-- Footer Section Begin -->
  <footer class="footer-section spad">
    <div class="container">
      <div class="newslatter-form">
        <div class="row">
          <div class="col-lg-12">
            <form action="#">
              <input type="text" placeholder="Your email address">
              <button type="submit">Subscribe to our newsletter</button>
            </form>
          </div>
        </div>
      </div>
      <div class="footer-widget">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="single-footer-widget">
              <h4>About us</h4>
              <ul>
                <li>About Us</li>
                <li>Community</li>
                <li>Jobs</li>
                <li>Shipping</li>
                <li>Contact Us</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-footer-widget">
              <h4>Customer Care</h4>
              <ul>
                <li>Search</li>
                <li>Privacy Policy</li>
                <li>2019 Lookbook</li>
                <li>Shipping & Delivery</li>
                <li>Gallery</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-footer-widget">
              <h4>Our Services</h4>
              <ul>
                <li>Free Shipping</li>
                <li>Free Returnes</li>
                <li>Our Franchising</li>
                <li>Terms and conditions</li>
                <li>Privacy Policy</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-footer-widget">
              <h4>Information</h4>
              <ul>
                <li>Payment methods</li>
                <li>Times and shipping costs</li>
                <li>Product Returns</li>
                <li>Shipping methods</li>
                <li>Conformity of the products</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="social-links-warp">
      <div class="container">
        <div class="social-links">
          <a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
          <a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
          <a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
          <a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
          <a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
          <a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
        </div>
      </div>
      <?php
include 'footer.php';
?>

    </div>


    </div>
  </footer>
  <!-- Footer Section End -->

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
  
</body>

</html>
