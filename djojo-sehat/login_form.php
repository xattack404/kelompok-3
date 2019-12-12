<?php
include 'fungsi/base_url.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>template/Register/css/login.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>template/Design/css/font-awesome.min.css">

<?php 
include 'navbar.php'; 
?>
<div class="wrapper" style="background: rgba(224,239,249,1);
background: -moz-linear-gradient(left, rgba(224,239,249,1) 0%, rgba(193,209,219,1) 21%, rgba(181,198,208,1) 29%, rgba(216,225,231,1) 72%, rgba(229,236,240,1) 86%, rgba(242,246,248,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(224,239,249,1)), color-stop(21%, rgba(193,209,219,1)), color-stop(29%, rgba(181,198,208,1)), color-stop(72%, rgba(216,225,231,1)), color-stop(86%, rgba(229,236,240,1)), color-stop(100%, rgba(242,246,248,1)));
background: -webkit-linear-gradient(left, rgba(224,239,249,1) 0%, rgba(193,209,219,1) 21%, rgba(181,198,208,1) 29%, rgba(216,225,231,1) 72%, rgba(229,236,240,1) 86%, rgba(242,246,248,1) 100%);
background: -o-linear-gradient(left, rgba(224,239,249,1) 0%, rgba(193,209,219,1) 21%, rgba(181,198,208,1) 29%, rgba(216,225,231,1) 72%, rgba(229,236,240,1) 86%, rgba(242,246,248,1) 100%);
background: -ms-linear-gradient(left, rgba(224,239,249,1) 0%, rgba(193,209,219,1) 21%, rgba(181,198,208,1) 29%, rgba(216,225,231,1) 72%, rgba(229,236,240,1) 86%, rgba(242,246,248,1) 100%);
background: linear-gradient(to right, rgba(224,239,249,1) 0%, rgba(193,209,219,1) 21%, rgba(181,198,208,1) 29%, rgba(216,225,231,1) 72%, rgba(229,236,240,1) 86%, rgba(242,246,248,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e0eff9', endColorstr='#f2f6f8', GradientType=1 );">
  <form class="login" action="login.php" method="post" id="form-login">
    <p class="title">Log in</p>
    <input placeholder="Email" type="email" name="email" id="email" autofocus />
    <i class="fa fa-user" ></i>
    <p class ="email" style="color:red;"></p>
    <input type="password" name="password" id="password" placeholder="Password" />
    <i class="fa fa-key"></i>
    <p class ="pass" style="color:red;"></p>
    <a href="#">Forgot your password?</a>
    <button type="submit" name="submit" >
      <i class="spinner" name="submit"></i>
      <span class="state"  name="submit">Log in</span>
    </button>
  </form>
  </p>
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
  
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/popper.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/bootstrap.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.stellar.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/owl.carousel.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/aos.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/scrollax.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/google-map.js"></script>
  <script src="<?php echo $base_url ?>template/Design/Design/js/main.js"></script>
  <script>

//validasi email
var email;
$('#email').on('keyup', function(){
  var valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (valid.test(this.value) !== true){
    $('.email').text('Isi Email Dengan Benar !');
    email = false;
  }
  else if (valid.test(this.value) == true){
    $('.email').text('');
    email = true;
  }
  if ($(this).val().length == 0){
    $('.email').text('');
  }
});
</script>
<script>
$('#password').on('keypress',function(){
	if(this.value.length < 5){
		$('.pass').text('Password Harus terdiri dari Minimal 6 karakter !');
	}else{
		$('.pass').text('');
	}
});
  $('#password').on('keyup',function(){
    if ($(this).val().length == 0){
    $('.pass').text('');
    }
  });
</script>