<?php session_start();          // Memulai session
include 'config/koneksi.php';           // Panggil koneksi ke database
include 'fungsi/base_url.php';  // Panggil fungsi base_url
include 'fungsi/navigasi.php';  // Panggil data navigasi
include 'fungsi/setting.php';   // Panggil data author
// include 'register_form.php';

// pengecekan session
if(isset($_SESSION['email']))
{
  // Jika user telah login dan ingin masuk ke halaman ini kembali, maka akan diarahkan ke halaman index/ home
  die ("<script>alert('Anda telah login'); location.replace('$base_url')</script>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php echo $register['judul'] ?> | <?php echo $namatoko ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $register['seo_deskripsi'] ?>" />
  <meta name="keywords" content="<?php echo $register['seo_keywords'] ?>" />
  <meta name="author" content="<?php echo $author ?>" />
  <!-- CSS Bootstrap -->
  <link href="<?php echo $base_url ?>template/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo $base_url ?>template/css/shop-item.css" rel="stylesheet">
  <!-- JS -->
  <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
  <!-- Favicon -->
  <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon" />
  !--<link href="<?php echo $base_url ?>template/css/search.css" rel="stylesheet">
</head>

<body>
  <?php include 'navbar.php'; ?>

  <!-- Awal Konten Utama -->
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-sm-push-3">
            <!-- <h3><?php echo $register['judul']; ?></h3> -->
            <hr />
            
          </div>


      <?php
      // include 'sidebar.php';
       ?>
    
      </div>
        
        <hr/>
    <?php include 'register_form.php'; ?>
    <!-- Awal Footer -->
    <?php include 'footer.php'; ?>
    <!-- Akhir Footer -->

  </div>
  <!-- Akhir Konten Utama -->

  <!-- Memanggil JS -->
  <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
  <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      //apabila terjadi event onchange terhadap object <select id=propinsi>
      $("#prov").change(function () {
        var prov = $("#prov").val();
        $.ajax({
          url: "fungsi/ambilkota.php",
          data: "prov=" + prov,
          cache: false,
          success: function (msg) {
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kot").html(msg);
          }
        });
      });

      $("#kot").change(function () {
        var kot = $("#kot").val();
        $.ajax({
          url: "fungsi/ambilkecamatan.php",
          data: "kot=" + kot,
          cache: false,
          success: function (msg) {
            $("#kec").html(msg);
          }
        });
      });
    });
  </script>
</body>

</html>
