    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/animate.css">
    
    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/aos.css">

    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/flaticon.css">
    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/icomoon.css">
    <link rel="stylesheet" href="<?= $base_url ?>template/Design/Design/css/style.css">
  <div class="goto-here">
		<div class="py-1 bg-black">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+6200 0000 0000</span>
					    </div>
                <?php
                include 'fungsi/cek_session_public.php';
      if(!empty($_SESSION['nama']) && (!empty($_SESSION['email'])))
      {
        echo "
        <div class='col-md pr-4 d-flex topper align-items-center'>
					    	<div class='icon mr-2 d-flex justify-content-center align-items-center'><span class='icon-paper-plane'></span></div>
                <span class='text'>$sesen_email</span>
        ";
      }
        else
        {
          echo"
          <div class='col-md pr-4 d-flex topper align-items-center'>
					    	<div class='icon mr-2 d-flex justify-content-center align-items-center'><span class='icon-paper-plane'></span></div>
                <span class='text'>Default@gmail.com</span>";
        }
      ?>

					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">JNE &amp; JNT DELIVERY </span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Djojo Sehat</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			  <li class="nav-item active"><a href="./index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="./katalog.html" class="nav-link">Produk</a></li>
            <li class="nav-item"><a href="./keranjang.html" class="nav-link">Konfirmasi</a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tentang Kami</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="page/cara_order.html">Cara Order</a>
                <a class="dropdown-item" href="page/ketentuan.html">Ketentuan Belanja</a>
                <a class="dropdown-item" href="page/kontak.html">Kontak</a>
                <a class="dropdown-item" href="page/profile.html">Profile</a>
              </div></li>


              <?php
                include 'fungsi/cek_session_public.php';
      if(!empty($_SESSION['nama']) && (!empty($_SESSION['email'])))
      {
        echo "
        <li class= 'nav-item dropdown'>
          <a href='#' class ='nav-link dropdown-toggle' id='dropdown04' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Hai, ".$sesen_nama." 
          </a>
          <div class='dropdown-menu' aria-labelledby='dropdown04'>
              <a class='dropdown-item' href='$base_url"."profile'>profile</a>
              <a class='dropdown-item' href='$base_url"."konsultasi.php'>Konsultasi</a>
              <a class='dropdown-item' href='$base_url"."logout'>Logout</a>
            </div></li>";
      }
        else
        {
          echo"
          <li class='nav-item'>
          <a href='register_form.php' class='nav-link'>Register</a></li>
          <li class='nav-item'>
                    <a href='login_form.php' class='nav-link'>Sign in</a></li>";
        }
      ?>
	          <li class="nav-item cta cta-colored"><a href="./keranjang.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
	        </ul>
	      </div>
	    </div>
    </nav>
</div>
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    


