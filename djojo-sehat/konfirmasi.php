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
    <link href="<?php echo $base_url ?>template/css/shop-item.css" rel="stylesheet">
    <!-- JS -->
    <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
    <!-- Favicon -->
    <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon"/>

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
    <!-- Fungsi JS untuk membuat form hanya bisa diisi oleh angka saja -->

  </head>
  <body>
    <?php include 'navbar.php'; ?>

    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-sm-push-3">
          <div class="thumbnail">
            <div class="col-md-12">
              <h3>Konfirmasi Pembayaran Anda</h3>
              <hr/>
            </div>
            <div class="caption-full">
              <form method="post" id="form-register" action="konfirmasi_kirim.php" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-body">
                        <div class="row">
                        <div class="col-xs-4"><label>No. Invoice</label>
                         <select name="no" id="no" class="form-control" required>
                            <option value="">--Pilih No. Invoice--</option>
                            <?php
                            $query = "SELECT id_trans FROM trans_jual WHERE id_member ='$sesen_id' AND status= 2 ORDER BY id_trans ASC ";
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
                      </div><!-- /.box-body -->
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
        </div>

        <?php include 'sidebar.php'; ?>
        
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
    </script> -->

  </body>
</html>