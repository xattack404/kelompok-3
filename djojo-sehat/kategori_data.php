 <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-10 order-md-last">
            <?php include "modul/mod_kategori.php" ?>
            <div class="row">
<?php
  while($row = mysqli_fetch_array($hasil1)) 
  {
    $harga = $row['harga_jual'];
    
?>

<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                <div class="product d-flex flex-column" style="max-height: 354.98px;max-width: 236.65px">
                  <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="img-prod"><img class="img-fluid" src="<?php echo $base_url ?>images/produk/<?php echo $row['foto_barang']; ?>" alt="<?php echo $row['nama_barang']; ?>">
                  </a>
                  <div class="text py-3 pb-4 px-3">
                    <div class="d-flex">
                      <div class="cat">
                        <span>Lifestyle</span>
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
                    <h3><a href="#"><?php echo $row['nama_barang']; ?></a></h3>
                    <div class="pricing">
                      <p class="price"><span><?php echo "Rp " .number_format($harga, 0, ',', '.').",-" ?></span></p>
                    </div>
                    <p class="bottom-area d-flex px-3">
                      <a href="<?php echo $base_url ?>beli/<?php echo $row['id_barang']; ?>" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                      <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="buy-now text-center py-2">Detail<span><i class="ion-ios-cart ml-1"></i></span></a>
                    </p>


                  </div>
                </div>
              </div>
  
<?php } ?>
</div>
  
          </div>
        </div>
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