<?php session_start();                    // Memulai session
include 'config/koneksi.php';                     // Panggil koneksi ke database
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/navigasi.php';            // Panggil data navigasi
include 'fungsi/setting.php';             // Panggil data setting
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $katalog['judul'] ?> | <?php echo $namatoko ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $katalog['seo_deskripsi'] ?>" />
    <meta name="keywords" content="<?php echo $katalog['seo_keywords'] ?>" />
    <meta name="author" content="<?php echo $author ?>" />    
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
   <?php
  $query = "SELECT * FROM tb_member WHERE id_member ='$sesen_id'";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_array($result);
 ?>
<div style="margin-top:20px;"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-sm-push-3">
         <p style="font-size: 22px;"><i class="fa fa-user"></i> <?= $row['nama'] ?></p>
          <div class="thumbnail">
            <div class="col-md-12">
            </div>
            <div class="caption-full">
              <div class="row">
                <?php include 'profile.php'; ?>
              </div>
            </div>
          </div>
        </div>

        <?php include 'sidebar.php'; ?>

      </div>
      
      <hr/>

      <?php include 'footer.php'; ?>

    </div>
    
    <!-- Memanggil file JS -->
    <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
  <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
  <script src="<?php echo $base_url ?>template/js/jquery-3.4.1.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/bootstrap.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/jquery.slicknav.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/owl.carousel.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/jquery.nice-select.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/mixitup.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/main.js"></script>
  <script>
  $("#files").change(function() {
  filename = this.files[0].name
  console.log(filename);
});
  $('#jk').hide();$('#nama').hide();$('#email').hide();$('#no_hp').hide();$('#ubah_semua').hide();
  function jk(){
    $('#jk').show();
    $('#btn-jk').hide();

  }
  function nama(){
    $('#nama').show();
    $('#btn-nama').hide();

  }function email(){
    $('#email').show();
    $('#btn-email').hide();

  }function no_hp(){
    $('#no_hp').show();
    $('#btn-no_hp').hide();

  }
  function ubahall(){
    $('#ubah_semua').show();
    $('#biodata').hide();

  }
</script> 
  </body>
</html>