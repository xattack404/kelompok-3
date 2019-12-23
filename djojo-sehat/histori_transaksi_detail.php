<?php session_start();
include 'config/koneksi.php';              // Panggil koneksi ke database
include 'faktur.php';                      
include 'faktur_selesai.php';             // Panggil data faktur yang telah selesai
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/cek_login_public.php';    // Panggil fungsi cek login public
include 'fungsi/navigasi.php';            // Panggil data navigasi
include 'fungsi/setting.php';             // Panggil data setting
include 'fungsi/tgl_indo.php';            // Panggil fungsi tanggal indonesia
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Transaksi Selesai | <?php echo $namatoko ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="<?php echo $author ?>" />    
    <!-- CSS Bootstrap -->
    <link href="<?php echo $base_url ?>template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>template/css/nomoretable.css" rel="stylesheet">
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
  </head>
  <body>
    <?php
     include 'navbar.php'; 
    ?>
<?php 
 $id = $_GET['id_trans'];
 ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-sm-push-3">
          <div class="thumbnail">
            <div class="col-md-12">
              <h3>Transaksi Selesai</h3>
              <hr/>
            </div>
            <div class="caption-full">
              
<h4>NO. INVOICE: #<?php echo $id ?></h4>

<p align="right">
  <a href='invoice/<?php echo $id; ?>'>
    <button type='button' class='btn btn-primary'>
      <span class='glyphicon glyphicon-download' aria-hidden='true'></span> Download Invoice
    </button>
  </a>
</p>
<div id="no-more-tables">
  <?php
  include 'faktur_selesai.php';                     // Panggil data faktur
  // Membuat join query 3 tabel: transaksi, transaksi_detail dan produk
  $ambil =  mysqli_query($koneksi," SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_barang.judul,
                                          tb_barang.berat,tb_barang.harga_jual,tb_member.id_member,
                                          tb_member.nama,tb_member.alamat,tb_member.kecamatan,
                                          tb_member.kabupaten_kota,tb_member.provinsi,tb_member.kode_pos,
                                          tb_member.no_hp,tb_pengiriman.metode_pengiriman,detail_pengiriman.no_resi_pengiriman,
                                          trans_jual.id_trans,trans_jual.id_member,trans_jual.status,trans_jual.total_bayar,trans_jual.jumlah,trans_jual.total_bayar,
                                          tb_status.status_pesanan,
                                          kec.nama_kec,
                                          kabkot.nama_kabkot,kabkot.jne_reg,
                                          prov.nama_prov
              FROM trans_jual
              LEFT JOIN tb_pengiriman ON tb_pengiriman.id_pengiriman = trans_jual.id_pengiriman
              LEFT JOIN detail_pengiriman ON detail_pengiriman.id_trans = trans_jual.id_trans
              LEFT JOIN tb_status ON tb_status.id_status = trans_jual.status
              LEFT JOIN tb_barang ON tb_barang.id_barang  = trans_jual.id_barang
              LEFT JOIN tb_member ON tb_member.id_member  = trans_jual.id_member
              LEFT JOIN kec ON kec.id_kec = tb_member.kecamatan
              LEFT JOIN kabkot ON kabkot.id_kabkot = kec.id_kabkot 
                        AND kabkot.id_kabkot = tb_member.kabupaten_kota
              LEFT JOIN prov ON prov.id_prov = kabkot.id_prov AND prov.id_prov = tb_member.provinsi
                AND trans_jual.id_member= '$sesen_id' WHERE trans_jual.id_trans= '$id'");
  if(mysqli_num_rows($ambil) == 0)
  {echo "<center><h4>Keranjang belanja anda masih kosong</h4></center>";}
  else
  {
    echo "
    <table class='col-md-12 table-bordered table-striped table-condensed cf'>
      <thead class='cf'>
        <tr>
          <th>No.</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Berat</th>
          <th>J.Berat</th>
          <th>Qty</th>
          <th>Sub Total</th>
        </tr>
      </thead>";

    $no = 1;
    while($data_trans = mysqli_fetch_array($ambil))
    {
      $harga = number_format($data_trans['harga_jual'], 0, ',', '.');
      $subtotal     = number_format($data_trans['total_bayar'], 0, ',', '.');

      echo "
      <tbody>
        <tr>
          <td data-title='No.' align='center'>".$no."</td>
          <td data-title='Nama Produk' align='left'><a href='$base_url"."produk/$data_trans[judul].html'>$data_trans[nama_barang]</a></td>
          <td data-title='Harga Diskon' align='right'>$harga,-</td>
          <td data-title='Berat' align='center'>$data_trans[berat]</td>
          <td data-title='Jumlah Berat' align='center'>$data_trans[berat]</td>
          <td data-title='Jumlah barang' align='center'>$data_trans[jumlah]</td>
          <td data-title='Sub Total' align='right'>$subtotal,-</td>
        </tr>";
      $no++;
    }
  }
  ?>
</table>
</div>

<hr/>

<?php
$ambil =  mysqli_query($koneksi," SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_barang.judul,
                                          tb_barang.berat,tb_barang.harga_jual,tb_member.id_member,
                                          tb_member.nama,tb_member.alamat,tb_member.kecamatan,
                                          tb_member.kabupaten_kota,tb_member.provinsi,tb_member.kode_pos,
                                          tb_member.no_hp,
                                          trans_jual.id_trans,trans_jual.id_member,trans_jual.status,
                                          detail_jual.jumlah,detail_jual.jumlah_berat,detail_jual.subtotal,
                                          kec.nama_kec,
                                          kabkot.nama_kabkot,kabkot.jne_reg,
                                          prov.nama_prov
              FROM detail_jual
              LEFT JOIN trans_jual ON trans_jual.id_trans = detail_jual.id_trans
              LEFT JOIN tb_barang ON tb_barang.id_barang  = detail_jual.id_barang
              LEFT JOIN tb_member ON tb_member.id_member  = trans_jual.id_member
              LEFT JOIN kec ON kec.id_kec = tb_member.kecamatan
              LEFT JOIN kabkot ON kabkot.id_kabkot = kec.id_kabkot 
                        AND kabkot.id_kabkot = tb_member.kabupaten_kota
              LEFT JOIN prov ON prov.id_prov = kabkot.id_prov AND prov.id_prov = tb_member.provinsi
                AND trans_jual.id_member= '$sesen_id'
                AND trans_jual.status = 2 WHERE trans_jual.id_trans = $id");
$array        = mysqli_fetch_array($ambil);
$ongkir       = $array['jne_reg'];
$nama_kota_kec= $array['nama_kabkot'].', '.$array['nama_kec'];
if(mysqli_num_rows($ambil) > 0)
{
?>
  <table class="table">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Ongkos Kirim</th>
        <td align="right">Via JNE REG</td>
        <td><?php echo $nama_kota_kec ?></td>
        <td align="right">Rp</td>
        <td align="right"><?php echo number_format($ongkir, 0, ',', '.').',-' ?></td>
      </tr>
      <tr>
        <th scope="row">Total Berat</th>
        <td></td>
        <td></td>
        <td></td>
        <td align="right"><?php echo $total_berat ?> kg</td>
      </tr>
      <tr>
        <th scope="row">Total Ongkos Kirim</th>
        <td align="right"><?php echo $total_berat_genap ?> kg</td>
        <td>x Rp <?php echo number_format($ongkir, 0, ',', '.').',-' ?></td>
        <td align="right">Rp</td>
        <td align="right">
          <?php $totalongkir = $total_berat_genap * $ongkir;
          echo number_format($totalongkir, 0, ',', '.').',-';
          ?>
        </td>
      </tr>
      <tr>
        <th scope="row">Grand Total</th>
        <td></td>
        <td></td>
        <td align="right">Rp</td>
        <td align="right">
        <b>
          <?php
          $ambil =  mysqli_query($koneksi," SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_barang.judul,
                                          tb_barang.berat,tb_barang.harga_jual,tb_member.id_member,
                                          tb_member.nama,tb_member.alamat,tb_member.kecamatan,
                                          tb_member.kabupaten_kota,tb_member.provinsi,tb_member.kode_pos,
                                          tb_member.no_hp,tb_pengiriman.metode_pengiriman,detail_pengiriman.no_resi_pengiriman,
                                          trans_jual.id_trans,trans_jual.id_member,trans_jual.status,trans_jual.total_bayar,
                                          tb_status.status_pesanan,
                                          kec.nama_kec,
                                          kabkot.nama_kabkot,kabkot.jne_reg,
                                          prov.nama_prov
              FROM trans_jual
              LEFT JOIN tb_pengiriman ON tb_pengiriman.id_pengiriman = trans_jual.id_pengiriman
              LEFT JOIN detail_pengiriman ON detail_pengiriman.id_trans = trans_jual.id_trans
              LEFT JOIN tb_status ON tb_status.id_status = trans_jual.status
              LEFT JOIN tb_barang ON tb_barang.id_barang  = trans_jual.id_barang
              LEFT JOIN tb_member ON tb_member.id_member  = trans_jual.id_member
              LEFT JOIN kec ON kec.id_kec = tb_member.kecamatan
              LEFT JOIN kabkot ON kabkot.id_kabkot = kec.id_kabkot 
                        AND kabkot.id_kabkot = tb_member.kabupaten_kota
              LEFT JOIN prov ON prov.id_prov = kabkot.id_prov AND prov.id_prov = tb_member.provinsi
                AND trans_jual.id_member= '$sesen_id' WHERE trans_jual.id_member= '$sesen_id'");
          $hasil        = mysqli_query($koneksi,$ambil);
          $data         = mysqli_fetch_assoc($hasil);
          $subtotal     = $data['subtotal'];
          $grand_total  = $totalongkir + $subtotal;
          echo number_format($grand_total, 0, ',', '.').',-';
          ?>
        </b></td>
      </tr>
    </tbody>
   </table>

<?php } ?>

<hr/>

<p>Total biaya yang harus Anda bayar adalah sebesar <strong>Rp <?php echo number_format($grand_total, 0, ',', '.').',-';  ?></strong></p>
<p>Apabila telah melakukan pembayaran, mohon konfirmasi ke halaman berikut: <a href="<?php echo $base_url.'konfirmasi.html' ?>">klik disini</a></p>
<hr/>
<p>Pembayaran ditujukan ke rekening kami di bawah ini: </p>
<p><?php echo $bank ?></p>
<hr/>
<p>Setelah proses verifikasi pembayaran Anda selesai, maka kami akan mengirimkan barang ke:</p>

<p>
<?php
  echo "<b>Atas Nama</b>: $array[nama]<br/>
        <b>No. HP</b>: $array[no_hp]<br/>
        <b>Alamat</b>: $array[alamat], $array[nama_kec], $array[nama_kabkot], $array[nama_prov], $array[kopos]";
?>
</p>
<hr/>
<p align="center">Terima kasih telah berbelanja bersama kami, <?php echo $namatoko ?>.</p>

            </div>
          </div>
        </div>

        <?php include 'sidebar.php'; ?>
        
      </div>  
      
      <hr/>

      <?php include 'footer.php'; ?>

    </div>
    
  </body>
</html>
