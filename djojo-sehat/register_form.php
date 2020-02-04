<html>
<head>
	<meta charset="utf-8">
	<title>Refister</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>template/Register/fonts/all.min.css">
	<!-- Main Style Css -->
  <script src="<?php echo $base_url ?>template/js/jquery-3.4.1.min.js"></script>

</head>
<?php include 'navbar.php'; ?>
<body>
	<link rel="stylesheet" href="<?php echo $base_url ?>template/Register/css/style.css"/>
	
	
<section class="forms-section">
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login" style="color:black">
        Login
        <span class="underline"></span>
      </button>
      <form class="form form-login" action="login.php" method="post">
        <fieldset>
          <legend>Please, enter your email and password for login.</legend>
          <div class="input-block">
            <label for="login-email">E-mail</label>
            <input id="email-login" name="email-login" type="email" required>
            <p class="email-login" style="color: red"></p>
          </div>
          <div class="input-block">
            <label for="login-password">Password</label>
            <input id="password-login" name="password-login" type="password" required>
            <p class="password-login" style="color: red"></p>
          </div>
        </fieldset>
        <button type="submit" name="submit" class="btn-login">Login</button>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup" style="color: black">
        Register
        <span class="underline"></span>
      </button>
      <form class="form form-signup" action="send.php" method="post">
        <fieldset>
          <legend>Please, enter your email, password and password confirmation for sign up.</legend>
          <div class="input-block">
            <label for="signup-email">Nama</label>
            <input type="text" name="nama" id="nama" required>
            <p class="nama" style="color: red"></p>
          </div>
          <div class="input-block">
            <label for="signup-email">Email</label>
            <input type="email" name="email" id="email" required>
            <p class="email" style="color:red"></p>
          </div>
          <div class="input-block">
            <label for="signup-password">Password</label>
            <input type="password" id="password" name="password" required>
            <p class="password" style="color: red"></p>
          </div>
          <div class="input-block">
            <label for="signup-password-confirm">Confirm password</label>
            <input id="password2" type="password" required>
            <p class="password2" style="color: red"></p>
          </div>
        </fieldset>
        <button type="submit" name="submit" class="btn-signup">Continue</button>
      </form>
    </div>
  </div>
</section>
</body>
</html>
<script>
const switchers = [...document.querySelectorAll('.switcher')]

switchers.forEach(item => {
	item.addEventListener('click', function() {
		switchers.forEach(item => item.parentElement.classList.remove('is-active'))
		this.parentElement.classList.add('is-active')
	})
})

</script>
<script>
		// Validasi Nama lengkap
		$('#nama').on('keyup',function(){
			var regex = /^[a-z A-Z]+$/;
			if (regex.test(this.value) !== true){
				this.value =this.value.replace(/[^a-zA-Z]+/, '');
			}else if ($(this).val().length < 5){
				$('.nama').text(' Anda Yakin Nama Anda Terdiri Dari ' + $(this).val().length + ' Huruf ');
			}else{
				$('.nama').text('');
			}
			if ($(this).val().length == 0){
				$('.nama').text('Nama Harus Di isi !');
			}
		});
</script>
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
	// validasi nomor telepon
$('#telepon').on('keypress',function(){
	if (this.value.length == 13){
		return false;
	}
});
	$('#telepon').on('keyup', function(){
				var regex = /^[0-9]$/;
				if (regex.test(this.value) !== true) {
				this.value = this.value.replace(/[^0-9]+/, '');
				}
				else{
				$('.telepon').text('');
				}
				});
</script>
<script>
	// validasi kode pos
$('#kopos').on('keypress',function(){
	if (this.value.length == 5){
		return false;
	}
});
	$('#kopos').on('keyup',function(){
		var regex = /^[0-9]$/;
		if (regex.test(this.value) !==true){
			this.value = this.value.replace(/^[0-9]$/, '');
		}else{
			$('.kopos').text('');
		}
	});
</script>
<script>
$('#alamat').on('keypress',function(){
	if (this.value.length == 50){
		return false;
	}
});
$('#alamat').on('keyup', function(){
				var regex = /^[@., a-zA-Z0-9]$/;
				if (regex.test(this.value) !== true) {
				this.value = this.value.replace(/[^@., a-zA-Z0-9]+/, '');
				}
				else{
				$('.alamat').text('');
				}
				});
</script>
<script>
var pass;
$('#password').on('keypress',function(){
	if(this.value.length < 5){
		$('.password').text('Password Harus terdiri dari Minimal 6 karakter !');
		pass =false;
	}else{
		$('.password').text('');
		pass =true;
	}
});
</script>
<script>
var passvalid;
$('#password2').on('keyup',function(){
	if ($(this).val() != $('#password').val()){
		$('.password2').text('Password Tidak Sama !');
		passvalid = false;
	}else{
		$('.password2').text('');
		passvalid =true;
	}
});
</script>
<script>
//validasi email
var email;
$('#email-login').on('keyup', function(){
  var valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (valid.test(this.value) !== true){
    $('.email-login').text('Isi Email Dengan Benar !');
    email = false;
  }
  else if (valid.test(this.value) == true){
    $('.email-login').text('');
    email = true;
  }
  if ($(this).val().length == 0){
    $('.email-login').text('');
  }
});
</script>
<script>
$('#password-login').on('keypress',function(){
	if(this.value.length < 5){
		$('.password-login').text('Password Harus terdiri dari Minimal 6 karakter !');
	}else{
		$('.password-login').text('');
	}
});
  $('#password-login').on('keyup',function(){
    if ($(this).val().length == 0){
    $('.password-login').text('');
    }
  });
</script>