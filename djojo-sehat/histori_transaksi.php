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
    ul {
        list-style: none;
        padding: 0px;
    }

    .btn {
        background: none;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease;
        min-width: 155px;
    }

    .btn:hover {
        background: none;
        color: #fff;
        border-color: #3498db;
        background-color: #3498db;
    }

    .btn-primary {
        border-radius: 25px;
        display: inline-block;
        padding: 14px 28px 13px 28px;
        line-height: 1;
        border: 2px solid #3498db;
        font-family: "Raleway", "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: bold;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #3498db;
    }

    .btn-primary.btn-filled {
        background: #3498db;
        color: #fff;
    }

    .btn-white {
        border-color: #fff;
        color: #fff;
    }

    .btn-white:hover {
        background: #fff;
        color: #333333;
        border-color: #fff;
    }

    .btn-white.btn-filled {
        background: #fff;
        color: #e74c3c;
    }

    .btn-grey {
        border-color: #777777;
        color: #333333;
    }

    .pricing-tables .col-md-3:first-child .pricing-table {
        border-radius: 25px 0px 0px 25px;
    }

    .pricing-tables .col-md-3:last-child .pricing-table {
        border-radius: 0px 25px 25px 0px;
        border-right: 2px solid rgba(255, 255, 255, 0.2);
    }

    .pricing-table {
        border-top: 2px solid rgba(255, 255, 255, 0.2);
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        border-left: 2px solid rgba(255, 255, 255, 0.2);
        text-align: center;
        padding-bottom: 40px;
    }

    .pricing-table .price {
        padding: 40px 0px;
        font-weight: 600;
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
    }

    .pricing-table .price .sub {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.3);
        position: relative;
        bottom: 10px;
    }

    .pricing-table .price .amount {
        color: #fff;
        font-size: 56px;
        display: inline-block;
        padding: 0px 8px;
    }

    .pricing-table .features {
        margin: 40px 0px;
    }

    .pricing-table .features li {
        color: #fff;
        font-size: 16px;
        text-align: center;
        margin-bottom: 16px;
    }

    .pricing-table .features li:last-child {
        margin-bottom: 0px;
    }

    .pricing-table .features li strong {
        font-weight: 600;
    }

    .pricing-table.emphasis {
        background-color: #e74c3c;
    }

    .pricing-2 .pricing-tables .col-md-3:first-child .pricing-table {
        border-radius: 25px 0px 0px 25px;
    }

    .pricing-2 .pricing-tables .col-md-3:last-child .pricing-table {
        border-radius: 0px 25px 25px 0px;
        border-right: 2px solid rgba(35, 35, 35, 0.2);
    }

    .pricing-2 .pricing-table {
        border-top: 2px solid rgba(35, 35, 35, 0.2);
        border-bottom: 2px solid rgba(35, 35, 35, 0.2);
        border-left: 2px solid rgba(35, 35, 35, 0.2);
        text-align: center;
        padding-bottom: 40px;
    }

    .pricing-2 .pricing-table .features {
        margin: 0px;
    }

    .pricing-2 .pricing-table .features li:first-child {
        border-top: none;
    }

    .pricing-2 .pricing-table .features li {
        color: #333333;
        border-top: 2px solid rgba(35, 35, 35, 0.2);
        padding: 24px 0px;
        margin: 0;
    }

    .pricing-2 .pricing-table .price {
        border-top: 2px solid rgba(35, 35, 35, 0.2);
        padding-bottom: 24px;
        border-bottom: none;
    }

    .pricing-2 .pricing-table .price .amount {
        color: #333333;
    }

    .pricing-2 .pricing-table .price .sub {
        color: #777777;
        opacity: 0.7;
    }

    .pricing-2 .pricing-table.emphasis {
        background-color: #2c3e50;
    }

    .pricing-2 .pricing-table.emphasis .features li {
        color: #fff;
        background-color: #2c3e50 !important;
    }

    .pricing-2 .pricing-table.emphasis .price .amount,
    .pricing-2 .pricing-table.emphasis .sub {
        color: #fff;
    }

    .pricing-2 .feature-list {
        padding-bottom: 0px;
    }

    .pricing-2 .pricing-table .features li:nth-child(even) {
        background: #f4f4f4;
    }

    .pricing-tables .no-pad {
        padding: 0px 15px;
    }

    .pricing-tables .no-pad-left {
        padding-left: 15px;
    }

    .pricing-tables .no-pad-right {
        padding-right: 15px;
    }

    .pricing-table {
        margin-bottom: 16px;
        border-radius: 25px !important;
        border: 2px solid rgba(255, 255, 255, 0.2) !important;
    }

    .pricing-2 .hidden-sm:first-child {
        display: none;
    }

    .pricing-2 .pricing-table.emphasis .features li {
        border-radius: 25px;
    }

    .pricing-2 .pricing-table .features li:first-child {
        font-size: 24px;
    }

    .pricing-tables .no-pad {
        padding: 0px 15px;
    }

    .pricing-tables .no-pad-left {
        padding-left: 15px;
    }

    .pricing-tables .no-pad-right {
        padding-right: 15px;
    }

    .pricing-table {
        margin-bottom: 30px;
        border-radius: 25px !important;
        border: 2px solid rgba(255, 255, 255, 0.2) !important;
    }
</style>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700'
    rel='stylesheet' type='text/css'>
    <br>
    <br>
    <br>
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
                AND trans_jual.id_member= '$sesen_id'");

if(mysqli_num_rows($ambil) > 0)
{
    while($hasil        = mysqli_fetch_array($ambil)){
    ?>
<div class="main-container">
    <section class="pricing-2">
        <div class="container">
            <div class="row pricing-tables">
                <div class="col-md-3 no-pad-right hidden-sm">
                    <div class="pricing-table feature-list">
                     
                    </div>
                </div>
                <div class="col-md-2 no-pad hidden-sm">
                    <div class="pricing-table">
                        <ul class="features">
                            <li><strong>No Invoice</strong></li>
                            <li><strong>Nama</strong></li>
                            <li><strong>Total Harga</strong></li>
                            <li><strong>Metode Pengiriman</strong></li>
                            <li><strong>Status Transaksi</strong></li>
                            <li><strong>No Resi Pengiriman</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 no-pad hidden-sm">
                    <div class="pricing-table">
                        <ul class="features">
                            <li><strong><?php echo $hasil['id_trans']; ?></strong></li>
                            <li><strong><?php echo $hasil['nama']; ?></strong></li>
                            <li><strong>Rp <?php echo number_format($hasil['total_bayar'], 0, ',', '.').',-';  ?>-</strong></li>
                            <li><strong><?php echo $hasil['metode_pengiriman']; ?></strong></li>
                            <li><strong><?php echo $hasil['status_pesanan']; ?></strong></li>
                            <li><strong><?php echo $hasil['no_resi_pengiriman']; ?></strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php }} ?>
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