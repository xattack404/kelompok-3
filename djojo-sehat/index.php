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

        <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Trending</h2>
            <p></p>
          </div>
        </div>      
      </div>
      <div class="container">
        <div class="row">
<?php 
    $data     = mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY id_barang DESC LIMIT 10");
$numrows  = mysqli_num_rows($data);
?>
<?php
// Jika data ketemu, maka akan ditampilkan dengan While
if($numrows > 0)
{
  while($row = mysqli_fetch_assoc($data))
  {
    $harga_normal = number_format($row['harga_jual'], 0, ',', '.').",-";
?>
          <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
            <div class="product d-flex flex-column">
              <a href="#" class="img-prod" style="margin:auto;">
                <img class="img-fluid" src="<?php echo $base_url ?>images/produk/<?php echo $row['foto_barang']; ?>" alt="<?php echo $row['nama_barang']; ?>" style="max-width:200px;max-height:200px;">
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3">
                <div class="d-flex">
                  <div class="cat">
                    <span>Lifestyle</span>
                  </div>
                  <div class="rating">
                    <p class="text-right mb-0">
                      <a href="#"><span class="ion-ios-star"></span></a>
                      <a href="#"><span class="ion-ios-star"></span></a>
                      <a href="#"><span class="ion-ios-star"></span></a>
                      <a href="#"><span class="ion-ios-star"></span></a>
                      <a href="#"><span class="ion-ios-star-half"></span></a>
                    </p>
                  </div>
                </div>
                <h3><a href="#"><?php echo $row['nama_barang']; ?></a></h3>
                <div class="pricing">
                  <p class="price"><span>Rp <?php echo $harga_normal ?></span></p>
                </div>
                <p class="bottom-area d-flex px-3">
                  <a href="<?php echo $base_url ?>beli/<?php echo $row['id_barang']; ?>" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                  <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="buy-now text-center py-2">Details<span><i class="ion-ios-cart ml-1"></i></span></a>
                </p>
              </div>
            </div>
          </div>
        <?php } }?>
      </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">New Clothes Arrival</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>      
      </div>
      <div class="container">
        <div class="row">
<?php 
    $data     = mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY id_barang DESC LIMIT 10");
$numrows  = mysqli_num_rows($data);
?>
<?php
// Jika data ketemu, maka akan ditampilkan dengan While
if($numrows > 0)
{
  while($row = mysqli_fetch_assoc($data))
  {
    $harga_normal = number_format($row['harga_jual'], 0, ',', '.').",-";
?>
          <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
            <div class="product d-flex flex-column">
              <a href="#" class="img-prod" style="margin:auto;">
                <img class="img-fluid" src="<?php echo $base_url ?>images/produk/<?php echo $row['foto_barang']; ?>" alt="<?php echo $row['nama_barang']; ?>" style="max-width:200px;max-height:200px;">
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3">
                <div class="d-flex">
                  <div class="cat">
                    <span>Lifestyle</span>
                  </div>
                  <div class="rating">
                    <p class="text-right mb-0">
                      <a href="#"><span class="ion-ios-star"></span></a>
                      <a href="#"><span class="ion-ios-star"></span></a>
                      <a href="#"><span class="ion-ios-star"></span></a>
                      <a href="#"><span class="ion-ios-star"></span></a>
                      <a href="#"><span class="ion-ios-star-half"></span></a>
                    </p>
                  </div>
                </div>
                <h3><a href="#"><?php echo $row['nama_barang']; ?></a></h3>
                <div class="pricing">
                  <p class="price"><span>Rp <?php echo $harga_normal ?></span></p>
                </div>
                <p class="bottom-area d-flex px-3">
                  <a href="<?php echo $base_url ?>beli/<?php echo $row['id_barang']; ?>" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                  <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="buy-now text-center py-2">Details<span><i class="ion-ios-cart ml-1"></i></span></a>
                </p>
              </div>
            </div>
          </div>
        <?php } }?>
      </div>
<footer>
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
