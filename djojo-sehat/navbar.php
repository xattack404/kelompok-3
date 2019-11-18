<?php
      include 'login_form.php';
      //include 'register_form.php';
?>
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="./index.html"><img src="<?php echo $base_url ?>template/Design/logo.png" alt=""></a>
                </div>
                <div class="header-right">
                    <img src="<?php echo $base_url ?>template/Design/icons/search.png" alt="" class="search-trigger">
                    <img src="<?php echo $base_url ?>template/Design/icons/man.png" alt="">
                    <a href="#">
                        <img src="<?php echo $base_url ?>template/Design/icons/bag.png" alt="">
                        <span>2</span>
                    </a>
                </div>
                <div class="user-access">
                    <a href="register_form.php">Register</a>
                    <a href="#" class="in">Sign in</a>
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a href="./index.html">Home</a></li>
                        <li><a href="./katalog.html">Katalog</a>
                            <ul class="sub-menu">
                                <li><a href="katalog.html">Product Page</a></li>
                                <li><a href="keranjang.html">Shopping Card</a></li>
                            </ul>
                        </li>
                        <li><a href="./konfirmasi.html">Konfirmasi</a></li>
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
        <?php
      if(!empty($_SESSION['username']) && empty($_SESSION['usertype']))
      {
        echo "
        <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
            <span class='glyphicon glyphicon-user' aria-hidden='true'></span> Hai, ".$sesen_username." <span class='caret'></span>
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
        }
      ?>
</header>