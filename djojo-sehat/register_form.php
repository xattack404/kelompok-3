<html>
<head>
	<meta charset="utf-8">
	<title>Form-v10 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>template/Register/css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>template/Register/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="<?php echo $base_url ?>template/Register/css/style.css"/>
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Register/css/radio.css"/>
  <script src="<?php echo $base_url ?>template/js/jquery-3.4.1.min.js"></script>

</head>
<body class="form-v10">
	<div class="page-content" style="background: rgba(76,76,76,1);
background: -moz-linear-gradient(-45deg, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 8%, rgba(102,102,102,1) 18%, rgba(71,71,71,1) 23%, rgba(44,44,44,1) 40%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 62%, rgba(43,43,43,1) 79%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(76,76,76,1)), color-stop(8%, rgba(89,89,89,1)), color-stop(18%, rgba(102,102,102,1)), color-stop(23%, rgba(71,71,71,1)), color-stop(40%, rgba(44,44,44,1)), color-stop(51%, rgba(0,0,0,1)), color-stop(62%, rgba(17,17,17,1)), color-stop(79%, rgba(43,43,43,1)), color-stop(91%, rgba(28,28,28,1)), color-stop(100%, rgba(19,19,19,1)));
background: -webkit-linear-gradient(-45deg, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 8%, rgba(102,102,102,1) 18%, rgba(71,71,71,1) 23%, rgba(44,44,44,1) 40%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 62%, rgba(43,43,43,1) 79%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
background: -o-linear-gradient(-45deg, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 8%, rgba(102,102,102,1) 18%, rgba(71,71,71,1) 23%, rgba(44,44,44,1) 40%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 62%, rgba(43,43,43,1) 79%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
background: -ms-linear-gradient(-45deg, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 8%, rgba(102,102,102,1) 18%, rgba(71,71,71,1) 23%, rgba(44,44,44,1) 40%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 62%, rgba(43,43,43,1) 79%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
background: linear-gradient(135deg, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 8%, rgba(102,102,102,1) 18%, rgba(71,71,71,1) 23%, rgba(44,44,44,1) 40%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 62%, rgba(43,43,43,1) 79%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=1 );">
		<div class="form-v10-content">
			<form class="form-detail" action="send.php" method="post" id="form-register">
				<div class="form-left">
					<h2>Daftar Akun Baru</h2>
							<div class="form-row">
								<input type="text" name="nama" id="nama" size="30" class="company" placeholder="Nama Lengkap" required>
								<p class="nama" style="color: red;"></p>
							</div>
							<div class="form-row">
								<label>Jenis Kelamin</label>
							</div>
							<div class="form-group">
							<div class="form-row form-row-1" >
								<label class="container">Laki-Laki
									<input type="radio" value ="Laki-Laki" name="jenis_kelamin">
									<span class="checkmark"></span>
								  </label>
								</div>
								<div class="form-row form-row-2">
								  <label class="container">Perempuan<input type="radio" value="Perempuan" name="jenis_kelamin">
									<span class="checkmark"></span>
								  </label>
								</div>
							</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="password" name="password" id="password" class="input-text" placeholder="Password" required>
							<p class="pass" style="color: red;"></p>
						</div>
						<div class="form-row form-row-2">
							<input type="password" name="password2" id="password2" class="input-text" placeholder="Confirm Password" required><p class="password1" style="color: red;"></p>
							<p class="pass2" style="color:red;"></p>
						</div>
					</div>
				</div>
				<div class="form-right" style="background: rgba(179,220,237,1);
background: -moz-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(179,220,237,1)), color-stop(50%, rgba(41,184,229,1)), color-stop(100%, rgba(188,224,238,1)));
background: -webkit-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
background: -o-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
background: -ms-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
background: linear-gradient(135deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b3dced', endColorstr='#bce0ee', GradientType=1 );">
					<h2>Detail Alamat</h2>
					<div class="form-row">
						<input type="text" name="alamat" class="street" id="alamat"  placeholder="Alamat" required>
						<p class="alamat" style="color: red;"></p>
					</div>
					<div class="form-row form-row-2">
							<select name="prov" id="prov">
							    <option value="">Provinsi</option>
							    <?php
                $prov = "SELECT * FROM prov ORDER BY nama_prov";
                $result = mysqli_query($koneksi, $prov);
                if (mysqli_num_rows($result) > 0)
                {
                  while ($data = mysqli_fetch_array($result))
                  {
                    echo "<option value='$data[id_prov]'>$data[nama_prov]</option>\n";
                  }
                }
                  else
                  {
                    echo "Belum ada data";
                  }
                ?>
							</select>
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
							<div class="form-row form-row-2">
									<select name="kot" id="kot">
											<option value="">Kabupaten / Kota</option>
										</select>
										<span class="select-btn">
											  <i class="zmdi zmdi-chevron-down"></i>
										</span>
							</div>
					<div class="form-row">
						<select name="kec" id="kec">
						    <option value="country">Kecamatan</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					
					<div class="form-group">
							<div class="form-row form-row-1">
								<input type="number" name="kopos" class="zip" id="kopos" size="30" placeholder="Kode Pos" required>
								<p class="kopos" style="color: red;"></p>
							</div>
						<div class="form-row form-row-2">
							<input type="number" name="telepon" class="phone" id="telepon" size="12" placeholder="No Telepon" pattern ="{12}" required>
							<p class="telepon" style="color: red;"></p>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="email" id="email" class="input-text" placeholder="Email" required>
						<p class="email" style="color: red;"></p>
					</div>
					<div class="form-checkbox">
					</div>
					<div class="form-row-last">
						<input type="submit" id = "submit" name="submit" class="register" value="Register">
					</div>
				</div>
			</form>
		</div>
	</div>
</html>
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
		$('.pass').text('Password Harus terdiri dari Minimal 6 karakter !');
		pass =false;
	}else{
		$('.pass').text('');
		pass =true;
	}
});
</script>
<script>
var passvalid;
$('#password2').on('keyup',function(){
	if ($(this).val() != $('#password').val()){
		$('.pass2').text('Password Tidak Sama !');
		passvalid = false;
	}else{
		$('.pass2').text('');
		passvalid =true;
	}
});
</script>