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
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/header.css" type="text/css">
    <header style ="background-image:url(<?php echo $base_url ?>template/Design/ecommerce.jpg)" class="header-section">
    <div id="preloder">
    <div class="loader"></div>
  </div>    
    <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="./index.html"><img src="<?php echo $base_url ?>template/Design/logo.png" alt=""></a>
                </div>
                <div class="header-right">
                    <img src="<?php echo $base_url ?>template/Design/icons/search.png" alt="" class="search-trigger">
                </div>
                <div class="user-access">
                <?php
      if(!empty($_SESSION['username']) && empty($_SESSION['akses']))
      {
        echo "
        <li>
          <a href='#'> Hai, '.$sesen_nama.' 
          </a>
          <ul class='sub-menu'>
            <li>
              <a href='$base_url'.'logout'>Logout</a>
            </li>
          </ul>
        </li>";
      }
        else
        {
          echo"
          <a href='register_form.php'>Register</a>
                    <a href='$base_url"."login_form.html' class='in' style='color:black;'>Sign in</a>";
        }
      ?>
                    
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a href="./index.html">Home</a></li>
                        <li><a href="./katalog.html">Katalog</a>
                            <ul class="sub-menu">
                                <li><a href="katalog.html">Produk</a></li>
                                <li><a href="keranjang.html">Keranjang</a></li>
                                <li><a href="keranjang.html">Konfirmasi</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="./konsultasi.html">Konsultasi</a></li>
                        <li><a href="#"> Tentang Kami</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href='page/cara_order.html'> Cara Order
                                    </a>   
                                </li>
                                <li>
                                    <a href='page/ketentuan.html'>
                                        Ketentuan Belanja
                                    </a>
                                </li>
                                <li>
                                    <a href='page/kontak.html'>
                                        Kontak
                                    </a>
                                </li>
                                <li>
                                    <a href='page/profil.html'>
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
           <img src="<?php echo $base_url ?>template/Design/icons/delivery.png" alt="">
            <p>Free shipping on orders over $30 in USA</p>
          </div>
        </div>
        <div class="col-sm-4 text-left text-lg-center">
          <div class="header-item">
            <img src="<?php echo $base_url ?>template/Design/icons/voucher.png" alt="">
            <p>20% Student Discount</p>
          </div>
        </div>
        <div class="col-sm-4 text-left text-lg-right">
          <div class="header-item">
            <img src="<?php echo $base_url ?>template/Design/icons/sales.png" alt="">
            <p>30% off on dresses. Use code: 30OFF</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  