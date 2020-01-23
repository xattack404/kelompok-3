<div class="row text-center">
<?php
  while($row = mysqli_fetch_array($hasil1)) 
  {
    $harga = $row['harga_jual'];
    
?>

  <div class="col-md-4">
    <div class="thumbnail">
      <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="title">
        <h4><?php echo $row['nama_barang']; ?></h4>
      </a>
      <img alt="<?php echo $row['nama_barang']; ?>" src="<?php echo $base_url ?>images/produk/<?php echo $row['foto_barang']; ?>"/>
      <div class="caption">
        <h4><?php echo "Rp " .number_format($harga, 0, ',', '.').",-" ?></h4>
        <a href="<?php echo $base_url ?>beli/<?php echo $row['id_barang']; ?>" class="btn btn-primary">Beli</a> 
        <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="btn btn-default">Detail</a>
      </div>
    </div>
  </div>
  
<?php } ?>
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