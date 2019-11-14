<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';         // Panggil fungsi cek sudah login/belum
include 'cek_session.php';      // Panggil fungsi cek session
include '../fungsi/cek_aksi_tambah.php';  // Panggil fungsi boleh tambah data atau tidak
// include '../fungsi/cek_hal_superadmin.php'; // Panggil fungsi hanya superadmin yang boleh melakukan aksi
//include '../fungsi/setting.php';          // Panggil data setting
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Tambah Member Baru | <?php include "title.php" ?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
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
        <h1>Form Entry Member Baru</h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>User</li>
          <li class="active"><a href="member_add.php">Entry Member Baru</a></li>
        </ol>
      </section>

      <section class="content">
        <?php include "member_add_form.php" ?>
      </section>
    </div>

    <?php include "footer.php" ?>

  </div>
  <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
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
      // $(':input:not([type="submit"])').each(function() {
      //     $(this).focus(function() {
      //     $(this).addClass('hilite');
      //     }).blur(function() {
      //     $(this).removeClass('hilite');});
      //   });
      }); 
    </script>

</body>

</html>