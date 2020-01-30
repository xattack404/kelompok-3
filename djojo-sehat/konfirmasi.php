<?php session_start();                    // Memulai session
include 'config/koneksi.php';                     // Panggil koneksi ke database
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/setting.php';             // Panggil data Nama Toko Online
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include "fungsi/imgpreview.php"; // Preview gambar yang akan diupload
include "fungsi/tinymce.php";    // Editor teks Tinymce + Ajax File/ Photo Manager
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Konfirmasi Pembayaran | <?php echo $namatoko ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Konfirmasi Pembayaran" />
    <meta name="keywords" content="konfirmasi pembayaran" />
    <meta name="author" content="<?php echo $author ?>" />    
    <!-- CSS Bootstrap -->
    <link href="<?php echo $base_url ?>template/css/bootstrap.min.css" rel="stylesheet">
    <!-- JS -->
    <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
    <!-- Favicon -->
    <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon"/>


  </head>
  <body class="goto-here">
    <?php include 'navbar.php'; ?>

  <div class="hero-wrap hero-bread" style="background-image: url('<?= $base_url ?>images/produk/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Konfirmasi Pembayaran</span></p>
            <h1 class="mb-0 bread">Konfirmasi Pembayaran</h1>


          </div>
        </div>
      </div>
    </div>

<form method="post" id="form-register" action="konfirmasi_kirim.php" enctype="multipart/form-data">
  <section class="ftco-section">
    <div class="container">

        <?php include "sidebar.php" ?>
      <div class="row justify-content-center">
        <div class="col-xl-10 ftco-animate">
          <form action="#" class="billing-form">
            <h3 class="mb-4 billing-heading">Detail Konfirmasi</h3>
            <div class="row align-items-end">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="No Invoice">No Invoice</label>
                  <div class="select-wrap">
                    <select name="no" id="no" class="form-control">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <option value="">No.Invoice</option>
                      <?php
                      $query = "SELECT id_trans FROM trans_jual WHERE id_member ='$sesen_id' AND status = 2 ORDER BY id_trans ASC ";
                      $sql = mysqli_query($koneksi, $query);
                      while($data = mysqli_fetch_array($sql)){
                      echo '<option value="'.$data['id_trans'].'">'.$data['id_trans'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="namapengirim">Nama Pengirim</label>
                  <input type="text" class="form-control" value="<?= $sesen_nama ?>" id="nama_pengirim" name="nama_pengirim" readonly required placeholder="">
                </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="foto">* Foto Baru</label>
                  <label for="choose" class="btn btn-primary py-3 px-4"> Pilih Foto 
                  <input type="file" onchange="tampilkanPreview(this,'preview')" id="gbr" name="gbr" style="opacity: 0;margin-top: -22px" required></label>
                  <br><b>Preview Gambar</b><br>
                  <img id="preview" src="<?= $base_url?>images/close.gif" alt="" style="max-width: 665px" />
                </div>
              </div>
              <div class="w-100"></div>
              <div class="w-100"></div>
              <p>
                    <button class="btn btn-primary py-3 px-4" style="margin-left:10px;width:100px"  type="submit" name="submit">Submit</button>
                    <button class="btn btn-primary py-3 px-4" id="a" style="width:100px;" type="submit" name="submit">Reset</button>
                  </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</form>
<!-- 

    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-sm-push-3">
          <div class="thumbnail">
            <div class="col-md-12">
              <h3>Konfirmasi Pembayaran Anda</h3>
              <hr/>
            </div>
            <div class="caption-full">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-body">
                        <div class="row">
                        <div class="col-xs-4"><label>No. Invoice</label>
                         <select name="no" id="no" class="form-control" required>
                            <option value="">--Pilih No. Invoice--</option>
                            <?php
                            $query = "SELECT id_trans FROM trans_jual WHERE id_member ='$sesen_id' AND status = 2 ORDER BY id_trans ASC ";
                            $sql = mysqli_query($koneksi, $query);
                            while($data = mysqli_fetch_array($sql)){
                              echo '<option value="'.$data['id_trans'].'">'.$data['id_trans'].'</option>';
                            }
                            ?>
                        </select>
                        </div>
                          <div class="col-xs-5"><label>Nama Pengirim</label>
                            <input class="form-control" value="<?= $sesen_nama ?>" name="nama_pengirim" type="text" id="nama_pengirim" readonly required/>
                          </div>
                        </div><br/>
                        
                        <div class="form-group"><label>* Foto Baru</label><br />
                          <input type="file" name="gbr" id="gbr" onchange="tampilkanPreview(this,'preview')" required />
                          <br><b>Preview Gambar</b><br>
                          <img id="preview" src="" alt="" width="35%" />
                        </div>
                      </div> /.box-body 
                      <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div> -->

        
      </div>
      
      <hr/>

      <?php include 'footer.php'; ?>

    </div>
    <?php
    include "fungsi/imgpreview.php"; // Preview gambar yang akan diupload
    include "fungsi/tinymce.php";    // Editor teks Tinymce + Ajax File/ Photo Manager
    ?>

   <!--  <script type="text/javascript">
    <!-- Fungsi JS untuk membuat form hanya bisa diisi oleh angka saja -->
    <script type="text/javascript">
    function isNumberKey(evt)
    {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
      return true;
    }
    </script> 

  </body> <!-- Memanggil file JS -->
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
  <script>
    $(document).ready(function(){
        $('#a').mouseenter(function(){
            $(this).css("background-color","red");
        });
        $('#a').mouseleave(function(){
            $(this).css("background-color","#dbcc8f");
        });
    });
  </script>
</html>