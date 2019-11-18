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
    <link href="<?php echo $base_url ?>template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>template/css/stylegaleri.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>template/fonts/font-awesome4.3.0/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>template/css/shop-item.css" rel="stylesheet"><link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/style.css" type="text/css">
    <!-- Favicon -->
    <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon"/>
  </head>
  <body>
    <?php include 'navbar.php'; ?>

    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-sm-push-3">
          <div class="thumbnail">
            <div class="col-md-12">
              <h3><?php echo $katalog['judul']; ?></h3>
              <hr/>
            </div>
            <div class="caption-full">
              <div class="row text-center">
                <?php include 'katalog_data.php'; ?>
              </div>
            </div>
            <?php $data     = mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY id_barang DESC LIMIT $start, $per_halaman");
              // $numrows  = mysqli_num_rows($data); ?>
                <div class="text-center" id="w<?= $row['id_barang'] ?>">
         
          </div>

        </div>


        <?php include 'sidebar.php'; ?>


      
      <hr/>

      <?php include 'footer.php'; ?>

    </div>
    
    <!-- Memanggil file JS -->
    <script src="<?php echo $base_url ?>template/js/jquery2.js"></script>
    <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(".tmb").click(function() {
        var id = $(this).attr('id'); // $(this) refers to button that was clicked
        var tableid = "#t"+id;
        var tombolid = "#"+id;
        var wadahid = "#w"+id;
        $(tableid).toggle(
          function(){
          if($(tableid).is(":visible")){
            $(tableid).show();
            $(tombolid).html("<i class='fa fa-eye-slash'></i> Sembunyikan Detail");
            $(wadahid).css('transition','0.5s');
            $(wadahid).css('width','600px');
          } else {
            
            $(tombolid).html("<i class='fa fa-eye'></i> Detail");
            $(wadahid).css('width','200px');
            $(tableid).hide();
          }
        }
        );
         
    });
  </script>
  </body>
</html>