    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/aos.css">

    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/style.css">


  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<div class="goto-here" style="margin-bottom:50px">
    <div class="py-1 bg-black" style="height:30px">
      <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
          <div class="col-lg-12 d-block">
            <div class="row d-flex">
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                <?php
                error_reporting(0);
                  if(empty($_SESSION['nama']) && (empty($_SESSION['email']))){
                    echo"
                      <span class='text'>Anda Belum login</span>
                    ";
                  }else{
                     $sql    = "SELECT * FROM tb_alamat WHERE id_member = '$_SESSION[id_member]' ";
                     $result = mysqli_query($koneksi, $sql);
                     $data   = mysqli_fetch_array($result);
                     if (empty($data[no_hp])){
                      echo "<span class='text'>No hp Belum Terdaftar</span>";
                     }else{
                     echo "
                    <span class='text'>$data[no_hp]</span>
                     ";}
                  }
                ?>
              </div>
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                <?php
                  if(empty($_SESSION['nama']) && (empty($_SESSION['email']))){
                    echo"
                      <span class='text'>Anda Belum login</span>
                    ";
                  }else{
                     echo "
                    <span class='text'>$_SESSION[email]</span>
                     ";
                  }
                ?>
              </div>
              <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                <span class="text"><?= date('D - M d / Y'); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" style="margin-top:5px" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="../index.html">Djojo Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="<?php echo $base_url ?>index.html" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="<?php echo $base_url ?>katalog.html" class="nav-link">Produk</a></li>
            <li class="nav-item"><a href="<?php echo $base_url ?>konfirmasi.html" class="nav-link">Konfirmasi</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tentang Kami</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="<?php echo $base_url ?>page/cara_order.html">Cara Order</a>
                <a class="dropdown-item" href="<?php echo $base_url ?>page/ketentuan.html">Ketentuan</a>
                <a class="dropdown-item" href="<?php echo $base_url ?>page/kontak.html">Kontak</a>
                <a class="dropdown-item" href="<?php echo $base_url ?>page/profil.html">Profil</a>
              </div>
            </li>
            <?php
      include 'fungsi/cek_session_public.php';
      if(!empty($_SESSION['nama']) && (!empty($_SESSION['email'])))
      {
        echo "
        <li class='nav-item dropdown' style='margin-top:-1px;'>
          <a href='#' class='nav-link dropdown-toggle'> Hai, ".$sesen_nama." 
          </a>
          <div class='dropdown-menu' aria-labelledby='dropdown04'>
              <a href='$base_url"."profile.php' class='dropdown-item'>profile</a>
              <a href='$base_url"."konsultasi.php'class='dropdown-item'>Konsultasi</a>
              <a href='$base_url"."histori_transaksi.php'class='dropdown-item'>Histori Transaksi</a>
              <a href='$base_url"."logout'class='dropdown-item'>Logout</a>
              </div></li>";
      }
        else
        {
          echo"
          <li class='nav-item'>
          <a href='register_form.php' class='nav-link'>Register / Login</a></li>";
        }
      ?>
            <li class="nav-item cta cta-colored"><a href="keranjang.php" class="nav-link"><span class="icon-shopping_cart"></span>
            <?php
            if(!empty($_SESSION['nama']) && (!empty($_SESSION['email']))){
            $cek_keranjang =  mysqli_query($koneksi,"SELECT tb_keranjang.id_keranjang, tb_keranjang.id_member, tb_keranjang.id_barang,
                            tb_keranjang.jumlah,tb_keranjang.jumlah_berat, tb_keranjang.subtotal,
                            tb_barang.id_barang, tb_barang.nama_barang, tb_barang.judul,
                            tb_barang.harga_jual, tb_barang.berat
                          FROM tb_keranjang
                          LEFT JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang
                          WHERE tb_keranjang.id_member = '$sesen_id'");

            $jumlah = mysqli_num_rows($cek_keranjang);
            echo"[$jumlah]";  
          }else{
            echo "[0]";
          }
            
            ?></a></li>
          </ul>
        </div>
      </div>
  </div>
    </nav>
    <!-- END nav -->
