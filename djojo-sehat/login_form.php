<?php
include 'fungsi/base_url.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>template/Register/css/login.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>template/Design/css/font-awesome.min.css">

<?php 
include 'navbar.php'; 
?>
<div class="wrapper">
  <form class="login" action="login.php" method="post" id="form-login">
    <p class="title">Log in</p>
    <input placeholder="Email" type="email" name="email" id="email" autofocus/>
    <i class="fa fa-user"></i>
    <input type="password" name="password" id="password" placeholder="Password" />
    <i class="fa fa-key"></i>
    <a href="#">Forgot your password?</a>
    <button type="submit" name="Login" value="Login">
      <i class="spinner" name="Login"></i>
      <span class="state" name="Login">Log in</span>
    </button>
  </form>
  </p>
</div>
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
  <script src="<?php echo $base_url ?>template/Register/js/login.js"></script>
