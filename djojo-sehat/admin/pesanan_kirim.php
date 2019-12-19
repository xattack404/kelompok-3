<?php session_start();
include '../config/koneksi.php';      // Panggil koneksi ke database
include 'cek_login.php';              // Panggil fungsi cek sudah login/belum
include 'cek_session.php';            // Panggil fungsi cek session
include '../fungsi/setting.php';      // Panggil data 
include '../fungsi/base_url.php';     // Panggil http://localhost/djojosehat/....
include 'js.php';                     //Panggil Style Css
?>

<?php 
$id_trans=$_GET['id_trans'];
$id=$_GET['id_trans'];
$nama=$_GET['nama'];
$no_hp=$_GET['no_hp'];
$alamat=$_GET['alamat'];
$id_member=$_GET['id_member'];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pengiriman Barang | <?php include "title.php" ?></title>
  <script src="http://localhost/template/js/jquery-3.4.1.min.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../images/fav.ico" />
</head>
<body class="skin-blue sidebar-mini">
  <div class="wrapper">
  <?php include 'header.php'; ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Pengiriman Barang</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard">Home</i></a></li>
        <li>Kategory</li>
        <li class="active"><a href="pesanan.php">Daftar Pesanan Barang</a></li>
      </ol>
    </section>
    <section class="content">
  <form action="pesanan_kirim_proses.php" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-body">
            <div class="form-group">
              <input type="hidden" name="id_member" class="form-control"></input>
            </div>
            <div class="form-group">
              <label style="" class="id" for=""></label>
              <input type="text" class="form-control" placeholder="Id Invoice" name="id_invoice" id="id_invoice">
            </div>
            <div class="form-group">
              <label style="" for="" class="nama"></label>
              <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama">
            </div>
            <div class="form-group">
              <label style="" for="" class="alamat"></label>
            <input type="text" placeholder="Alamat" class="form-control" name="alamat" id="alamat">
            </div>
            <div class="form-group">
              <label style="" for="" class="no_hp"></label>
              <input type="text" class="form-control" placeholder="Nomer Handphone" name="no_hp" id="no_hp">
            </div>
            <div class="form-group">
              <label style="" for="" class="metode"></label>
              <select name="metode" id="metode" class="form-control"">
                <option value="">Metode Pengiriman</option>
<?php 
    $sql=mysqli_query($koneksi,"SELECT * FROM tb_pengiriman ORDER BY metode_pengiriman ASC");
     while ($data = mysqli_fetch_array($sql)) {
       echo '<option value="'.data['id_pengiriman'].'">'.$data['metode_pengiriman'].'</option>';
}
?>
              </select>
            </div>
            <div class="form-group">
              <label style="" for="" class="resi"></label>
              <input type="text" class="form-control" placeholder="Nomer Resi" name="resi" id="resi">
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </div>

    </div>

  </form>
  </section>
  </div>
  </div>
</body>
</html>
<script>
  $('#id_invoice').on('click', function () {
    $('.id').text("Id Invoice");
    $('#id_invoice').attr('readonly','true');
    $('#id_invoice').val(<?= "$id" ?>);

    $('.nama').text("Nama");
    $('#nama').attr('readonly','true');
    $('#nama').val("<?= $nama ?>");

    $('.alamat').text("Alamat");
    $('#alamat').attr('readonly','true');
    $('#alamat').val("<?= $alamat ?>");

    $('.no_hp').text("Nomer Handphone");
    $('#no_hp').attr('readonly','true');
    $('#no_hp').val("<?= $no_hp ?>");
  });;
</script>
<script>
    $('#resi').on('keyup', function () {
        var regex = /^[a-z A-Z 0-9]+$/;
        if (regex.test(this.value) !== true) {
            this.value = this.value.replace(/[^a-zA-Z0-9]+/, '');
        }
    });
</script>
<script>
  $('#metode').on('click', function () {
    $('.metode').text("Metode Pengiriman");
  });;
</script>
<script>
  $('#resi').on('click', function () {
      $('.resi').text("Nomer resi");
  });;
</script>