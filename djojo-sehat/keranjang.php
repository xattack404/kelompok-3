
<?php session_start();                    // Memulai session
include 'config/koneksi.php';             // Panggil koneksi ke database
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/tgl_indo.php';            // Panggil fungsi tanggal indonesia
include 'fungsi/setting.php';             // Panggil data setting
include 'fungsi/navigasi.php';            // Panggil data navigasi
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $keranjang['judul'] ?> | <?php echo $namatoko ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $keranjang['seo_deskripsi'] ?>" />
    <meta name="keywords" content="<?php echo $keranjang['seo_keyword'] ?>" />
    <meta name="author" content="<?php echo $author ?>" />
    <!-- CSS Bootstrap -->
    <link href="<?php echo $base_url ?>template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>template/css/nomoretable.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $base_url ?>template/Register/css/style.css"/>
    <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
    <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
    <!-- Favicon -->
    <link href="<?php echo $base_url ?>images/fav.ico" rel="shortcut icon"/>
  </head>
  <body>
	<div class="modal" id ="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alamat Lain</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <select name="prov" class="form-control" id="prov">
    <?  $prov = "SELECT * FROM prov ORDER BY nama_prov";
                $result = mysqli_query($koneksi, $prov);
                $data = mysqli_num_rows($result);
                $arr = mysqli_fetch_array($data);
							   echo "<option value='$sesen_provinsi'>$data[nama_prov]</option>\n";?>
							    <?php
                $prov = "SELECT * FROM prov ORDER BY nama_prov";
                $result = mysqli_query($koneksi, $prov);
                if (mysqli_num_rows($result) > 0)
                {
                  while ($data = mysqli_fetch_array($result))
                  {
                    echo "<option value='$data[id_prov]'>$data[nama_prov]</option>\n";
                  }
                }
                  else
                  {
                    echo "Belum ada data";
                  }
                ?>
							</select>
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
							<div class="form-group">
									<select name="kot" class="form-control" id="kot">
											<option value="">Kabupaten / Kota</option>
										</select>
										<span class="select-btn">
											  <i class="zmdi zmdi-chevron-down"></i>
										</span>
							</div>
					<div class="form-group">
						<select name="kec" class="form-control" id="kec">
						    <option value="country">Kecamatan</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="keranjang_update_alamat.php"><button type="button" name ="save" class="btn btn-primary">Save changes</button></a>
      </div>
    </div>
  </div>
</div>
    <?php 
    include 'navbar.php'; 
    ?>
  <div style ="padding:20px;">
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-sm-push-3">
          <div class="thumbnail">
            <div class="col-md-12">
              <h3><?php echo $keranjang['judul']; ?></h3>
              <hr/>
            </div>
            <div class="caption-full">
              <?php include 'keranjang_data.php'; ?>
            </div>
          </div>
        </div>

        <?php include 'sidebar.php'; ?>

      </div>

      <hr/>

      <?php include 'footer.php'; ?>

    </div>
    </div>
    <!-- Membuat fungsi input pada qty barang hanya boleh diisi dengan angka -->
    <script>
    function isNumberKey(evt)
    {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
      return true;
    }
    </script>
    <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
    <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
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
  <script type="text/javascript">
    $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=propinsi>
      $("#prov").change(function(){
        var prov = $("#prov").val();
        $.ajax({
            url: "fungsi/ambilkota.php",
            data: "prov="+prov,
            cache: false,
            success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#kot").html(msg);
            }
        });
      });
      $("#kot").change(function(){
        var kot = $("#kot").val();
        $.ajax({
            url: "fungsi/ambilkecamatan.php",
            data: "kot="+kot,
            cache: false,
            success: function(msg){
                $("#kec").html(msg);
            }
        });
      });
      $(':input:not([type="submit"])').each(function() {
          $(this).focus(function() {
          $(this).addClass('hilite');
          }).blur(function() {
          $(this).removeClass('hilite');});
        });
      }); 

      $(document).ready(function(){
        $('#nama').on('keyup',function(){
          console.log($(this).val());
        });
      });

    </script>
  </body>
</html>