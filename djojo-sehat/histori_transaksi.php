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
include 'navbar.php';

    ?>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<style>

  @import url(https://fonts.googleapis.com/css?family=Lato:400,700,900);
html {
  box-sizing: border-box;
  height: 100%;
}

*, *:before, *:after {
  box-sizing: inherit;
}

body {
  background-color: #211f23;
  background-repeat: no-repeat;
  *zoom: 1;
  filter: progid:DXImageTransform.Microsoft.gradient(gradientType=1, startColorstr='#FF53455B', endColorstr='#FF201E22');
  background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHJhZGlhbEdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY3g9IjUwJSIgY3k9IjAlIiByPSI3MCUiPjxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiM1MzQ1NWIiLz48c3RvcCBvZmZzZXQ9IjcwJSIgc3RvcC1jb2xvcj0iIzIwMWUyMiIvPjwvcmFkaWFsR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
  background-size: 100%;
  background-image: -moz-radial-gradient(top, circle, #53455b 0%, #201e22 70%);
  background-image: -webkit-radial-gradient(top, circle, #53455b 0%, #201e22 70%);
  background-image: radial-gradient(circle at top, #53455b 0%, #201e22 70%);
  color: #fff;
  font-family: 'Lato', sans-serif;
  font-size: 80%;
  min-height: 100%;
  line-height: 1.5;
}

.container {
  margin:auto;
  width: 100%;
  max-width: 1200px;
}

.group:after {
  content: "";
  display: table;
  clear: both;
}

.grid-1-5 {
  border: 2px solid #5d4e65;
  min-height: 300px;
  padding: 1.25em;
  position: relative;
  text-align: center;
  transition: all .2s ease-in-out;
}
@media screen and (min-width: 700px) {
  .grid-1-5 {
    float: left;
    width: 50%;
  }
  .grid-1-5:nth-child(odd) {
    clear: left;
  }
}
@media screen and (min-width: 800px) {
  .grid-1-5 {
    width: 33.3333333%;
  }
  .grid-1-5:nth-child(3n+1) {
    clear: left;
  }
  .grid-1-5:nth-child(odd) {
    clear: none;
  }
}
@media screen and (min-width: 1120px) {
  .grid-1-5 {
    width: 20%;
  }
  .grid-1-5:nth-child(odd), .grid-1-5:nth-child(3n+1) {
    clear: none;
  }
}

.grid-1-5:hover {
  background-color: #53455b;
  *zoom: 1;
  filter: progid:DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF53455B', endColorstr='#FF201D22');
  background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzUzNDU1YiIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzIwMWQyMiIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
  background-size: 100%;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #53455b), color-stop(100%, #201d22));
  background-image: -moz-linear-gradient(top, #53455b 0%, #201d22 100%);
  background-image: -webkit-linear-gradient(top, #53455b 0%, #201d22 100%);
  background-image: linear-gradient(to bottom, #53455b 0%, #201d22 100%);
  border-top: 2px solid #ec7a37;
  border-bottom: 2px solid #ff4f69;
  box-shadow: 0px 0px 10px 0px #323232;
  transform: scale(1.025);
  z-index: 2;
}
.grid-1-5:hover:before, .grid-1-5:hover:after {
  content: "";
  position: absolute;
  background-color: #f67d35;
  *zoom: 1;
  filter: progid:DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFF67D35', endColorstr='#FFFF4F68');
  background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2Y2N2QzNSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2ZmNGY2OCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
  background-size: 100%;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #f67d35), color-stop(100%, #ff4f68));
  background-image: -moz-linear-gradient(top, #f67d35 0%, #ff4f68 100%);
  background-image: -webkit-linear-gradient(top, #f67d35 0%, #ff4f68 100%);
  background-image: linear-gradient(to bottom, #f67d35 0%, #ff4f68 100%);
  top: -2px;
  bottom: -2px;
  width: 2px;
}
.grid-1-5:hover:before {
  left: -2px;
}
.grid-1-5:hover:after {
  right: -2px;
}
.grid-1-5:hover .button {
  background-color: #ee7a36;
  *zoom: 1;
  filter: progid:DXImageTransform.Microsoft.gradient(gradientType=1, startColorstr='#FFEE7A36', endColorstr='#FFEB495D');
  background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuNSIgeDI9IjEuMCIgeTI9IjAuNSI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2VlN2EzNiIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2ViNDk1ZCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
  background-size: 100%;
  background-image: -webkit-gradient(linear, 0% 50%, 100% 50%, color-stop(0%, #ee7a36), color-stop(100%, #eb495d));
  background-image: -moz-linear-gradient(left, #ee7a36 0%, #eb495d 100%);
  background-image: -webkit-linear-gradient(left, #ee7a36 0%, #eb495d 100%);
  background-image: linear-gradient(to right, #ee7a36 0%, #eb495d 100%);
}

h2, h3, p, ul {
  margin: 0;
}

h2 {
  font-size: 1em;
  font-weight: 400;
  margin: 0 0 0.5em;
}

h3 {
  font-size: 1.5em;
  letter-spacing: 0.0625em;
  margin: 0 0 0.3333333333333333em;
}

p {
  font-size: 0.875em;
}

p, ul {
  margin: 0 0 1.5em;
}

ul {
  color: #796583;
  font-size: 0.75em;
  list-style-type: none;
  padding: 0;
}
ul li {
  margin: 0 0 0.8333333333333333em;
}

.button {
  background-color: #9c83aa;
  border-radius: 20px;
  color: #fff;
  font-size: 1em;
  font-weight: 700;
  padding: 0.75em 1.5em;
  position: absolute;
  bottom: 1.25em;
  left: 50%;
  margin-left: -60px;
  text-decoration: none;
  width: 120px;
}

.uppercase, .button, h2 {
  text-transform: uppercase;
}

sup, .small {
  font-size: 0.6125em;
}
</style>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700'
    rel='stylesheet' type='text/css'>
    <br>
    <br>
    <br>
<div class="container group">
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

if(mysqli_num_rows($ambil) > 0)
{
    while($hasil        = mysqli_fetch_array($ambil)){
    ?>
<script>
    var id_trans = <?= $hasil['id_trans']?>;
    var nama = "<?= $hasil[nama]?>";
    var total_bayar = <?= number_format($hasil['total_bayar'], 0, ',', '.').'';  ?>;
    var metode_pembayaran = "<?= $hasil[metode_pengiriman] ?>";
    var status_pesanan = "<?= $hasil[status_pesanan] ?>";
    var no_resi_pengiriman = "<?= $hasil[no_resi_pengiriman] ?>"
    if (no_resi_pengiriman == "") {
        no_resi_pengiriman = "Data Belum Ada";
    }
</script>
    <div class="grid-1-5">
        <h2>Transaksi</h2>
    <p>ID INVOICE : <script>document.write(id_trans)</script></p>
    <ul>
        <li>Nama : <script>document.write(nama)</script></li>
        <li>Total Bayar : <script>document.write(total_bayar)</script>.000,-</li>
        <li>Metode Pembayaran : <script>document.write(metode_pembayaran)</script></li>
        <li>Status Pemesanan : <script>document.write(status_pesanan)</script></li>
        <li>No Resi : <script>document.write(no_resi_pengiriman)</script></li>
    </ul>
    <a href="histori_transaksi_detail.php?id_trans=<?= $hasil['id_trans']?>" class="button">Details</a>
    </div>




<?php }} ?>
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