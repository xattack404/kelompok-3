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
  <section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-bag"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
              </div>
            </div>      
          </div>
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support Customer</h3>
              </div>
            </div>    
          </div>
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-payment-security"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Secure Payments</h3>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
  <!-- Features Section End -->

  <!-- Latest Product Begin -->

  <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Produk Terbaru</h2>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
          
<?php
$data     = mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY id_barang DESC LIMIT 8");
$numrows  = mysqli_num_rows($data);
// Jika data ketemu, maka akan ditampilkan dengan While
if($numrows > 0)
{
  while($row = mysqli_fetch_assoc($data))
  {
    $harga_normal = number_format($row['harga_jual'], 0, ',', '.').",-";
?>
    			<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" style ="height:200px;width: 200px;" class="img-prod"><img class="img-fluid" src="<?php echo $base_url ?>images/produk/<?php echo $row['foto_barang']; ?>" alt="">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span>Fashion</span>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right mb-0">
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<a href="#"<h4><?php echo $row['nama_barang']; ?></h4></a>
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
  <?php }} ?>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>



    <section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
    	<div class="container">
				<div class="row no-gutters">
					<div class="col-lg-4">
						<div class="choose-wrap divider-one img p-5 d-flex align-items-end" style="background-image: url(images/choose-1.jpg);background-color:grey">

    					<div class="text text-center text-white px-2">
								<span class="subheading">Obat</span>
    						<p></p>
    						<p><a href="katalog.php" class="btn btn-black px-3 py-2">Shop now</a></p>
    					</div>
    				</div>
					</div>
					<div class="col-lg-8">
    				<div class="row no-gutters choose-wrap divider-two align-items-stretch">
    					<div class="col-md-12">
	    					<div class="choose-wrap full-wrap img align-self-stretch d-flex align-item-center justify-content-end" style="background-image: url(images/choose-2.jpg);background-color:lightgrey">
	    						<div class="col-md-7 d-flex align-items-center">
	    							<div class="text text-white px-5">
	    								<span class="subheading">Fashion</span>
			    						<p></p>
			    						<p><a href="katalog.php" class="btn btn-black px-3 py-2">Shop now</a></p>
			    					</div>
	    						</div>
	    					</div>
	    				</div>
    					<div class="col-md-12">
    						<div class="row no-gutters">
    							<div class="col-md-6">
		    						<div class="choose-wrap wrap img align-self-stretch bg-light d-flex align-items-center">
		    							<div class="text text-center px-5">
		    								<span class="subheading">Discont</span>
				    						<h2>Extra 50% Off</h2>
				    					</div>
		    						</div>
	    						</div>
	    						<div class="col-md-6">
		    						<div class="choose-wrap wrap img align-self-stretch d-flex align-items-center" style="background-color:grey;background-image: url(images/choose-3.jpg);">
		    							<div class="text text-center text-white px-5">
		    								<span class="subheading">Fashion</span>
				    						<h2>Best Sellers</h2>
				    					</div>
		    						</div>
	    						</div>
	    					</div>
    					</div>
    				</div>
    			</div>
  			</div>
    	</div>
    </section>
    <br><br>

    <section class="ftco-section ftco-deal bg-primary">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6">
    				<img src="images/prod-1.png" class="img-fluid" alt="">
    			</div>
    			<div class="col-md-6">
    				<div class="heading-section heading-section-white">
    					<span class="subheading"><h2>Produk Terlaris</span>
	          </div>
    				<div id="timer" class="d-flex mb-4">
						  <div class="time" id="days"></div>
						  <div class="time pl-4" id="hours"></div>
						  <div class="time pl-4" id="minutes"></div>
						  <div class="time pl-4" id="seconds"></div>
						</div>
						<div class="text-deal">
							<h2><a href="#"></a></h2>
							<p class="price"><span class="mr-2 price-dc"></span><span class="price-sale"></span></p>
							<ul class="thumb-deal d-flex mt-4">
								<li class="img" style="background-image: url(images/product-6.png);"></li>
								<li class="img" style="background-image: url(images/product-2.png);"></li>
								<li class="img" style="background-image: url(images/product-4.png);"></li>
							</ul>
						</div>
    			</div>
    		</div>
    	</div>
    </section>
<br>

    <section class="ftco-gallery">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-8 heading-section text-center mb-4 ftco-animate">
            <h2 class="mb-4">Follow Us On Instagram</h2>
            <p></p>
          </div>
    		</div>
    	</div>
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="<?php echo $base_url ?>images/admin.png" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo $base_url ?>images/admin.png);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="<?php echo $base_url ?>images/admin.png" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo $base_url ?>images/admin.png);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="<?php echo $base_url ?>images/admin.png" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo $base_url ?>images/admin.png);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="<?php echo $base_url ?>images/admin.png" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo $base_url ?>images/admin.png);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="<?php echo $base_url ?>images/admin.png" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo $base_url ?>images/admin.png);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="<?php echo $base_url ?>images/admin.png" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo $base_url ?>images/admin.png);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>
    
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