<?php
      include 'login_form.php';
      //include 'register_form.php';
?>
<style>
.search {
  position: relative;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 30px;
  height: 10px;
}
.search .search-box{
  position: relative;
  margin-top:-45px;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 40px;
  height: 40px;
  background: transparent;
  border-radius: 50%;
  transition: all 1s;
  z-index: 4;
  box-shadow: 0 0 25px 0 rgba(0, 0, 0, 0.4);
}
.search .search-box:hover{
  cursor: pointer;
}
.search .search-box::before {
  content: "";
      position: absolute;
      margin: auto;
      top: 22px;
      right: 0;
      bottom: 0;
      left: 22px;
      width: 12px;
      height: 2px;
      background: white;
      transform: rotate(45deg);
      transition: all .5s;
}
.search .search-box::after{
  content: "";
      position: absolute;
      margin: auto;
      top: -5px;
      right: 0;
      bottom: 0;
      left: -5px;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      border: 2px solid white;
      transition: all .5s;
}
.search input {
  font-family: 'Inconsolata', monospace;
    position: relative;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 50px;
    outline: none;
    border: none;
    background: white;
    color: black;
    padding: 0 80px 0 20px;
    border-radius: 30px;
    box-shadow: 0 0 25px 0 crimson,
                0 20px 25px 0 rgba(0, 0, 0, 0.2);
    transition: all 1s;
    opacity: 0;
    z-index: 5;
    font-weight: bolder;
    letter-spacing: 0.1em;
}
.search input:hover{
  cursor: pointer;
}
.search input:focus {
  margin-left:700px;
      width: 300px;
      opacity: 1;
      cursor: text;
}
.search input:focus ~ .search-box{
      background: black;
      z-index: 6;
      margin-left:970px;
}
.search input:focus ~ .search-box:before{
  top: 0;
        left: 0;
        width: 25px;
}
.search input:focus ~ .search-box:after{
  top: 0;
        left: 0;
        width: 25px;
        height: 2px;
        border: none;
        background: white;
        border-radius: 0%;
        transform: rotate(-45deg);
}

  </style>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- nama toko -->
      <a class="navbar-brand" href="<?php echo $base_url ?>"><?php echo $namatoko ?></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <!-- form cari -->
        <li>
        <div class="search">
  <input type="text" placeholder="Search..." />
  <div class="search-box"></div>
</div>
        <li>
          <a style="color:white;" href='<?php echo $base_url ?>index.html'>
            <span class='glyphicon glyphicon-home' style='color:white;' aria-hidden='true'></span> Home
          </a>
        </li>
        <li>
          <a style="color:white;" href='<?php echo $base_url ?>katalog.html'>
            <span class='glyphicon glyphicon-book' aria-hidden='true'></span> Katalog
          </a>
        </li>
        <li>
          <a style="color:white;" href='<?php echo $base_url ?>keranjang.html'>
            <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Keranjang
          </a>
        </li>
        <li>
          <a style="color:white;" href='<?php echo $base_url ?>konsultasi.html'>
            <span class='glyphicon glyphicon-comment' aria-hidden='true'></span> Konsultasi
          </a>
        </li>
        <li>
          <a style="color:white;" href='<?php echo $base_url ?>konfirmasi.html'>
            <span class='glyphicon glyphicon-bullhorn' aria-hidden='true'></span> Konfirmasi
          </a>
        </li>
        <li class="dropdown">
          <a style="color:white;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
            aria-expanded="false">
            <span class='glyphicon glyphicon-blackboard' aria-hidden='true'></span> Tentang Kami<span
              class="caret"></span>
          </a>
          <ul class="dropdown-menu"style="background-color:black;">
            <li>
              <a style="color:white;" href='<?php echo $base_url ?>page/cara_order.html'>
                <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Cara Order
              </a>
            </li>
            <li>
              <a style="color:white;" href='<?php echo $base_url ?>page/ketentuan.html'>
                <span class='glyphicon glyphicon-flag' aria-hidden='true'></span> Ketentuan Belanja
              </a>
            </li>
            <li>
              <a style="color:white;" href='<?php echo $base_url ?>page/kontak.html'>
                <span class='glyphicon glyphicon-phone' aria-hidden='true'></span> Kontak
              </a>
            </li>
            <li>
              <a style="color:white;" href='<?php echo $base_url ?>page/profil.html'>
                <span class='glyphicon glyphicon-user' aria-hidden='true'></span> Profil
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

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
          echo "<button type='button' class='btn btn-primary ml-5' style ='margin-top:7px;margin-left:10px;border:none;background-color:transparent;' data-toggle='modal' data-target='#login_modal'><span class='glyphicon glyphicon-user' aria-hidden='true'></span>
          Login
        </button>";
        }
      ?>
      </ul>
    </div>
  </div>
</nav>
