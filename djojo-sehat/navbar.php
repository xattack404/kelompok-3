<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
  rel="stylesheet">
<link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/nice-select.css" type="text/css">
<link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/magnific-popup.css" type="text/css">
<link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/style.css" type="text/css">
<header style="background: rgba(224,239,249,1);
background: -moz-linear-gradient(left, rgba(224,239,249,1) 0%, rgba(193,209,219,1) 21%, rgba(181,198,208,1) 29%, rgba(216,225,231,1) 72%, rgba(229,236,240,1) 86%, rgba(242,246,248,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(224,239,249,1)), color-stop(21%, rgba(193,209,219,1)), color-stop(29%, rgba(181,198,208,1)), color-stop(72%, rgba(216,225,231,1)), color-stop(86%, rgba(229,236,240,1)), color-stop(100%, rgba(242,246,248,1)));
background: -webkit-linear-gradient(left, rgba(224,239,249,1) 0%, rgba(193,209,219,1) 21%, rgba(181,198,208,1) 29%, rgba(216,225,231,1) 72%, rgba(229,236,240,1) 86%, rgba(242,246,248,1) 100%);
background: -o-linear-gradient(left, rgba(224,239,249,1) 0%, rgba(193,209,219,1) 21%, rgba(181,198,208,1) 29%, rgba(216,225,231,1) 72%, rgba(229,236,240,1) 86%, rgba(242,246,248,1) 100%);
background: -ms-linear-gradient(left, rgba(224,239,249,1) 0%, rgba(193,209,219,1) 21%, rgba(181,198,208,1) 29%, rgba(216,225,231,1) 72%, rgba(229,236,240,1) 86%, rgba(242,246,248,1) 100%);
background: linear-gradient(to right, rgba(224,239,249,1) 0%, rgba(193,209,219,1) 21%, rgba(181,198,208,1) 29%, rgba(216,225,231,1) 72%, rgba(229,236,240,1) 86%, rgba(242,246,248,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e0eff9', endColorstr='#f2f6f8', GradientType=1 );" class="header-section">
  <div id="preloder">
    <div class="loader"></div>
  </div>
  <div class="container-fluid">
    <div class="inner-header">
      <div class="logo" style="margin-top:10px;">
        <a href="./index.html"><h5>Djojo Store</a>
      </div>
      <div class="header-right">
        <img src="<?php echo $base_url ?>template/Design/icons/search.png" alt="" class="search-trigger">
        <a href="keranjang.php">
        <img src="<?php echo $base_url ?>template/Design/icons/cart-1.png"  alt=" Keranjang Belanja "><?php $Keranjang ?></a>
        <a href="histori_transaksi.php">
        <img src="<?php echo $base_url ?>template/Design/icons/bag.png"  alt="Histori Transaksi"></a>
      </div>
      <?php
      include 'fungsi/cek_session_public.php';
      if(!empty($_SESSION['nama']) && (!empty($_SESSION['email'])))
      {
        echo "
        <nav class='main-menu mobile-menu' style='margin-top:-1px;'>
        <ul>
        <li>
          <a href='#'> Hai, ".$sesen_nama." 
          </a>
          <ul class='sub-menu'>
            <li>
              <a href='$base_url"."profile'>profile</a>
              <a href='$base_url"."konsultasi.php'>Konsultasi</a>
              <a href='$base_url"."logout'>Logout</a>
            </li>
          </ul>
        </li></ul></nav>";
      }
        else
        {
          echo"
          <div class='user-access'>
          <a href='register_form.php'>Register</a>
                    <a href='login_form.php' class='in' style='color:black;'>Sign in</a>
                    </div>";
        }
      ?>

      <nav class="main-menu mobile-menu">
        <ul>
          <li><a href="<?php echo $base_url ?>index.html">Home</a></li>
          <li><a href="<?php echo $base_url ?>katalog.html">Produk</a>
          </li>
          </li>
          <li><a href="<?php echo $base_url ?>konfirmasi.html">Konfirmasi</a></li>
          <li><a href="#"> Tentang Kami</a>
            <ul class="sub-menu">
              <li>
                <a href='<?php echo $base_url ?>page/cara_order.html'> Cara Order
                </a>
              </li>
              <li>
                <a href='<?php echo $base_url ?>page/ketentuan.html'>
                  Ketentuan Belanja
                </a>
              </li>
              <li>
                <a href='<?php echo $base_url ?>page/kontak.html'>
                  Kontak
                </a>
              </li>
              <li>
                <a href='<?php echo $base_url ?>page/profil.html'>
                  Profil
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>
<?php
      /*if(!empty($_SESSION['username']) && empty($_SESSION['akses']))
      {
        echo "
        <li>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
            <span class='glyphicon glyphicon-user' aria-hidden='true'></span> Hai, ".$sesen_nama." <span class='caret'></span>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a href='$base_url"."logout'>
                <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span> Logout
              </a>
            </li>
          </ul>
        </li>";
      }
        else
        {
        }*/
      ?>
<div class="header-info">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4">
        <div class="header-item">
        </div>
      </div>
      <div class="col-sm-4 text-left text-lg-center">
        <div class="header-item">
        </div>
      </div>
      <div class="col-sm-4 text-left text-lg-right">
        <div class="header-item">
        </div>
      </div>
    </div>
  </div>
</div>