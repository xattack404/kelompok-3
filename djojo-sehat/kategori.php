<?php session_start(); 
include 'config/koneksi.php';                     // Panggil koneksi ke database
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/setting.php';             // Panggil data setting
include 'fungsi/tgl_indo.php';            // Panggil fungsi tanggal indonesia
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public

$id_kat = mysqli_real_escape_string($koneksi,$_GET['id_kategori']);

$query     = "SELECT a.id_barang, a.nama_barang, a.harga_jual, a.foto_barang, a.judul,
              b.nama_kategori AS nama_kategori
              FROM tb_barang a 
              LEFT JOIN tb_kategori b on b.id_kategori = a.kategori
              WHERE id_kategori = '$id_kat' 
              ORDER BY a.id_barang DESC";
$hasil     = mysqli_query($koneksi,$query);
$hasil1    = mysqli_query($koneksi,$query);
$numrows   = mysqli_num_rows($hasil);
$kategori  = mysqli_fetch_array($hasil);
if($numrows == 0){echo "<script>alert('Belum ada data');location.replace('$base_url')</script>";}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kategori: <?php echo $kategori['nama_kategori'] ?>" />
    <meta name="keywords" content="kategori: <?php echo $kategori['nama_kategori'] ?>" />
    <meta name="author" content="<?php echo $author ?>" />
    <title>Kategori: <?php echo $kategori['nama_kategori'] ?> | <?php echo $namatoko ?></title>

    <!-- CSS Bootstrap -->
    <link href="<?php echo $base_url ?>template/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon"/>
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
    <!-- Fungsi JS untuk membuat form hanya bisa diisi oleh angka saja -->
  </head>
  <body>
    <?php include 'navbar.php'; ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-sm-push-3">
          <div class="thumbnail">
            <div class="col-md-12">
              <h3>Kategori: <?php echo $kategori['nama_kategori']; ?></h3>
              <hr/>
            </div>
            <div class="caption-full">
              <h5 align="center">Ada <?php echo $numrows; ?> barang di kategori ini</h5>
              <?php include 'kategori_data.php'; ?>
            </div>
          </div>
        </div>

        <?php include 'sidebar.php'; ?>

      </div>

      <hr/>

      <?php include 'footer.php'; ?>

    </div>
  </body>
</html>