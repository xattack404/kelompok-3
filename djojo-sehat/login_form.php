<?php
include 'fungsi/base_url.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>template/Register/css/login.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>template/Design/css/font-awesome.min.css">
  <script src="<?php echo $base_url ?>template/Register/js/jquery.js"></script>

<?php 
include 'navbar.php'; 
?>
<div class="wrapper">
  <form class="login" name="form-login" action="login.php" method="post" id="form-login">
    <p class="title">Log in</p>
    <input placeholder="Email" type="email" name="email" id="email" oninput="cekemail()" autofocus/>
    <i class="fa fa-user"></i>
    <input type="password" name="password" id="password" placeholder="Password" />
    <i class="fa fa-key"></i>
    <a href="#">Forgot your password?</a>
    <button type="submit" name="submit" >
      <i class="spinner" name="submit"></i>
      <span class="state" name="submit">Log in</span>
    </button>
  </form>
  </p>
</div>
<script type="text/javascript">
 $(document).ready(function(cekemail){
// check change event of the text field
$("#email").keyup(function(){
// get text username text field value
var username = $("#email").val();
 
// check username name only if length is greater than or equal to 3
if(username.length >= 3)
{
$("#status").html('<img src="loader.gif" /> Checking availability...');
// check username
$.post("cek_email.php", {username: username}, function(data, status){
$("#status").html(data);
});
}
});
});
</script>
  <!-- Memanggil file JS -->
  <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
  <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/bootstrap.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/jquery.slicknav.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/owl.carousel.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/jquery.nice-select.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/mixitup.min.js"></script>
  <script src="<?php echo $base_url ?>template/Design/js/main.js"></script>
