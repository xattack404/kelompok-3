<?php session_start();                    // Memulai session
include 'config/koneksi.php';                     // Panggil koneksi ke database
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/navigasi.php';            // Panggil data navigasi
include 'fungsi/setting.php';             // Panggil data setting

// Mengambil nilai berdasarkan id_barang dengan metode GET
$judul = mysqli_real_escape_string($koneksi,$_GET['id_barang']);

$query        = "SELECT * FROM tb_barang WHERE judul='$judul'";
$hasil        = mysqli_query($koneksi,$query);
$produk       = mysqli_fetch_array($hasil);
$query2        = "SELECT tb_barang.id_barang,
                         tb_barang.kategori,
                         tb_kategori.id_kategori,
                         tb_kategori.nama_kategori
                  FROM tb_barang 
                  LEFT JOIN tb_kategori ON tb_kategori.id_kategori = tb_barang.kategori
                  WHERE judul='$judul'";
$hasil2        = mysqli_query($koneksi,$query2);
$produk2       = mysqli_fetch_array($hasil2);
$harga = number_format($produk['harga_jual'], 0, ',', '.').",-";
$id_barang = $produk['id_barang'];

// Jika data tidak ditemukan maka akan muncul alert belum ada data
if(mysqli_num_rows($hasil) == 0)
{echo "<script>location.replace('$base_url')</script>";}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $katalog['judul']; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $katalog['deskripsi'] ?>" />
    <meta name="author" content="<?php echo $namatoko ?>" />
    <!-- Facebook SEO -->
    <meta property="og:title" content="<?php echo $produk['nama_barang']; ?> | <?php echo $namatoko ?>" />
    <meta property="og:url" content="<?php echo $base_url; echo "katalog/"; echo $katalog['judul']; echo ".html" ?>" />
    <meta property="og:image" content="<?php echo $base_url; echo "images/produk/"; echo $produk['foto_gambar']; ?>" />
    <meta property="og:description" content="Dapatkan <?php echo $katalog['nama_barang']; ?> dan barang lainnya dengan harga yang terjangkau, berkualitas, dan bergaransi hanya di <?php echo $namatoko ?>" />
    <!-- CSS Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="<?php echo $base_url ?>template/css/bootstrap.min.css" type="text/css">
  <!-- Favicon -->
  <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon" />
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
      <?php include 'produk_data.php'; ?>

      <hr/>

      <?php include 'footer.php'; ?>

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
    <script type="text/javascript">
      $(document).ready(function() {
        $("#fancybox").fancybox();
      });
    </script>
  </body>
</html>
