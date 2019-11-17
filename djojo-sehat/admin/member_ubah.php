<?php session_start();
include '../config/koneksi.php';                // Panggil koneksi ke database
include 'cek_login.php';      // Panggil fungsi cek sudah login/belum
include 'cek_session.php';    // Panggil fungsi cek session
include '../fungsi/cek_aksi_ubah.php';
//Panggil fungsi boleh ubah data atau tidak 
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Ubah Data Member | <?php include "title.php" ?></title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../images/fav.ico" />
  <!-- JS -->
  <?php include 'js.php'; ?>
</head>

<body class="skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include "header.php"; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>Ubah Data Member</h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Member</li>
          <li class="active">Ubah Data Member</li>
        </ol>
      </section>

      <section class="content">
        <?php include "member_ubah_form.php" ?>
      </section>
    </div>

    <?php include "footer.php" ?>

  </div>

</body>
  <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
    <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
  <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=propinsi>
      $("#prov").change(function(){
        var prov = $("#prov").val();
        $.ajax({
            url: "../fungsi/ambilkota.php",
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
            url: "../fungsi/ambilkecamatan.php",
            data: "kot="+kot,
            cache: false,
            success: function(msg){
                $("#kec").html(msg);
            }
        });
      });
      $('#alamat').keyup(function() {
          var len = this.value.length;
          if (len >= 100) {
              this.value = this.value.substring(0, 150);
          }
          $('#hitung').text(100 - len);
          });
      // $(':input:not([type="submit"])').each(function() {
      //     $(this).focus(function() {
      //     $(this).addClass('hilite');
      //     }).blur(function() {
      //     $(this).removeClass('hilite');});
      //   });
      }); 
    </script>
</html>