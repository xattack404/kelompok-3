<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include 'cek_session.php';      // Panggil fungsi cek session
//include '../fungsi/setting.php';          // Panggil data setting
include '../fungsi/tgl_indo.php';         // Panggil fungsi merubah tanggal menjadi format seperti 2 Mei 2015
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Daftar Produk | <?php include "title.php" ?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../images/fav.ico" />
  <!-- JS -->
  <?php include 'js.php'; ?>
  <!-- Data Tables -->
  <link href="template/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="template/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="template/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <!-- Skrip Datatables -->
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).ready(function () {
      $('#example1').DataTable();
    });
      $('#select_all').on('click', function() {
        if (this.checked) {
          $('.check').each(function(){
            this.checked =true;
          })
        }else{
          $('.check').each(function(){
            this.checked = false;
          })
        }
      });
      $('.check').on('click', function(){
        if ($('.check:checked').length === $('.check').length){
          $('#select_all').prop('checked', true)
        }else{
          $('#select_all').prop('checked', false)
        }
      })
    });
    function tambahstok(){
      document.proses.action = 'produk_form_tambah_stok.php';
      document.proses.submit();
      // document.location.href = 'edit.php';
      

    }
  </script>
</head>

<body class="skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include 'header.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>Daftar Produk < 10</h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Produk</li>
          <li class="active"><a href="product_list.php">Daftar Produk</a></li>
        </ol>
      </section>

      <section class="content">
        <div class="box">
  <div class="box-body table-responsive padding">
  <form name="proses" method="post">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
          <th>
                <center>
                  <input type="checkbox" id="select_all" value="">
                </center>
          </th>
          <th style="text-align: center">No.</th>
          <th style="text-align: center">Nama Barang</th>
          <th style="text-align: center">Kategori</th>
         <!--  <th style="text-align: center">Harga</th> -->
          <th style="text-align: center">Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $sql = "SELECT a.id_barang, a.nama_barang, a.jumlah, a.harga_jual,
              b.nama_kategori as kategori 
              FROM tb_barang a 
              LEFT JOIN tb_kategori b on b.id_kategori = a.kategori WHERE jumlah <10
              ORDER BY a.id_barang ASC";
              
      $result = mysqli_query($koneksi, $sql);
      $no = 1;
      $i = 0;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {
          $harga_jual  = number_format($data['harga_jual'], 0, ',', '.');?>
          
          <tr>
            <input type="hidden" name="id_barang[]" value="<?= $data['id_barang'] ?>">
            <td align="center">
                    <input type="checkbox" name="checked[]" class="check" value="<?= $data['id_barang']?>">
                  </td>
            <td valign="top" align="center"><?= $no ?></td>
            <td class="text-left"><?= $data['nama_barang'] ?></td>
            <td class="text-center"><?= $data['kategori'] ?></td>
            <!-- <td class="text-right">Rp. <?= $harga_jual ?> </td> -->
            <td class="text-center"><?= $data['jumlah'] ?> </td>
          </tr>
        <?php 
          $no++;
          $i++;
        }
      }
      else {echo "Belum ada barang yang kurang dari 50";}
    ?>
    
      </tbody>
    </table>
    <div class="box pull-right">
    <button type="submit" onclick="tambahstok()" class="btn btn-success">Tambah stok sesuai yang dipilih!</button>
    </div>
    </form>
  </div>

</div>


      </section>
    </div>

    <?php include "footer.php" ?>

  </div>

</body>

</html>
