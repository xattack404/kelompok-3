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
    <div class="features-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-12">
                <div class="single-box-item first-box">
                  <img src="<?php echo $base_url ?>images/produk/Baju TIdur.png" style="height:300px;" alt="">
                  <div class="box-text">
                    <span class="trend-year">2019</span>
                    <h2>Jewelry</h2>
                    <span class="trend-alert">Trend Alert</span>
                    <a href="#" class="primary-btn">See More</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="single-box-item second-box">
                  <img src="<?php echo $base_url ?>images/produk/Baju TIdur.jpg" style="height:300px;" alt="">
                  <div class="box-text">
                    <span class="trend-year">2019 Trend</span>
                    <h2>Footwear</h2>
                    <span class="trend-alert">Bold & Black</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="single-box-item large-box">
              <img src="<?php echo $base_url ?>images/produk/lensa-tele-zoom-12x.jpg" alt="">
              <div class="box-text">
                <span class="trend-year">2019</span>
                <h2>Collection</h2>
                <div class="trend-alert">Trend Alert</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Features Section End -->

  <!-- Latest Product Begin -->
  <section class="latest-products spad">
    <div class="container">
      <div class="product-filter">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="section-title">
              <h2>Latest Products</h2>
            </div>
            <ul class="product-controls">
              <li data-filter="*">All</li>
              <li data-filter=".dresses">Dresses</li>
              <li data-filter=".bags">Bags</li>
              <li data-filter=".shoes">Shoes</li>
              <li data-filter=".accesories">Accesories</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row" id="product-list">
        <div class="col-lg-3 col-sm-6 mix all dresses bags">
          <div class="single-product-item">
            <figure>
            <marquee direction="up" height="175" width="160" scrollamount="3" scrolldelay="1" onMouseOut="this.start()" onMouseOver="this.stop()">
            <?php
    include 'config/koneksi.php';
    $sql    = "SELECT * FROM bseller JOIN produk ON bseller.judul_bs = produk.id_produk ORDER BY no_urut ASC LIMIT 8";
    $result = mysqli_query($koneksi, $sql);
    $no = 1;
    if (mysqli_num_rows($result) > 0)
    {
      while ($data = mysqli_fetch_array($result)) // Ganti id_barang apabila ingin merubah menjadi seo url ke judul_seo
      {
        echo "<b><font face='arial' size='2' color=red'>".$data['no_urut']."</font></b>
              <a href='$base_url"."produk/".$data['judul_seo'].".html' class='info'>
                <br><font color='blue'>".$data['nama_produk']."</font><br>
                <img id='image' src='$base_url"."images/produk/".$data['img']." ' title='".$data['nama_produk']."' alt='".$data['nama_produk']."' style='width:150px; height:150px;' valign='top'/>
              </a>
              <br/>
              <br/>
              <br/>
              ";
          $no++;
      }
    }
    else
    {
      echo "<div id='description'>Belum ada data.</div>";
    }
    ?>
    </p>
            </marquee>
            <div class="product-text">
              <h6></h6>
              <p></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mix all dresses bags">
          <div class="single-product-item">
            <figure>
            <?php
  // kategori
  $sql = "SELECT * FROM kategori ORDER BY judul_kat ASC"; // Memanggil kategori/ top kategori
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0)
  {
    echo '<ul class="list-group">';
    while ($row = mysqli_fetch_assoc($result))
    {
      $id_kat = $row['id_kat'];
      // subkat
      $sql2 = "SELECT * FROM subkat WHERE id_kat='$id_kat'"; // Memanggil subkategori/ middle kategori
      $result2 = mysqli_query($koneksi, $sql2);
      echo '<li class="list-group-item"><b>'.$row['judul_kat'].'</b>';
        echo '<ul class="list-group">';
          while($row2 = mysqli_fetch_assoc($result2))
          {
            $id_subkat = $row2['id_subkat'];
            // supersubkat
            $sql3 = "SELECT * FROM supersubkat WHERE id_subkat ='$id_subkat'"; // Memanggil supersubkategori/ bottom kategori
            $result3 = mysqli_query($koneksi, $sql3);
            echo '<li class="list-group-item">'.$row2['judul_subkat'];
                echo '<ul class="list-group">';
                  while($row3 = mysqli_fetch_assoc($result3))
                  {
                    echo "<li class='list-group-item'><a href='$base_url"."kategori/$row3[kategori_seo]'>".$row3['judul_supersubkat']."</a></li>";
                  }
                echo '</ul>';
            echo '</li>';
          }
        echo '</ul>';
      echo '</li>';
    }
    echo '</ul>';
  }
  ?>

            </figure>
            <div class="product-text">
              <h6></h6>
              <p></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mix all shoes accesories">
          <div class="single-product-item">
            <figure>
            <?php
  $query = "SELECT isi FROM navigasi WHERE id_nav = 4 ";
  $hasil = mysqli_query($koneksi, $query);
  $data  = mysqli_fetch_array($hasil);
  if(mysqli_num_rows($hasil) > 0)
  {
    echo $data['isi'];
  }
  else{echo "Belum ada data";}
?>
            </figure>
            <div class="product-text">
              <h6></h6>
              <p></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mix all shoes accesories">
          <div class="single-product-item">
            <figure>
            <?php 
$query = "SELECT isi FROM navigasi WHERE id_nav = 6";
$hasil = mysqli_query($koneksi, $query);
$data  = mysqli_fetch_array($hasil);
if(mysqli_num_rows($hasil) > 0)
{echo $data['isi'];}
else{echo "Belum ada data";}
?>
            </figure>
            <div class="product-text">
              <h6></h6>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
