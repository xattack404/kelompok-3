<?php
// include 'config/koneksi.php';           // Panggil koneksi ke database
// include 'fungsi/base_url.php';  // Panggil fungsi base_url
// include 'fungsi/navigasi.php';  // Panggil data navigasi
// include 'fungsi/setting.php'; 
if (isset($_POST['register'])) {
	if (register($_POST) > 0) {
		echo "<script>
				alert ('pendaftaran anda berhasil');
				</script>
				";
	}else{
		echo mysqli_error($koneksi);
	}
}

 ?>
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
	<link rel="stylesheet" href="<?php echo $base_url ?>template/Register/css/loginsingnup.css"/>
	<script src="<?php echo $base_url ?>template/Register/js/animated.js"></script>
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Register/css/radio.css"/>
</head>
<body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="" method="post" id="form-register">
				<div class="form-left">
					<h2>Daftar Akun Baru</h2>
							<div class="form-row">
								<input type="text" name="nama" id="nama" size="30" class="company" placeholder="Nama Lengkap" required>
							</div>
							<div class="form-row">
								<label>Jenis Kelamin</label>
							</div>
							<div class="form-group">
							<div class="form-row form-row-1" >
								<label class="container">Laki-Laki
									<input type="radio" name="jenis_kelamin" value="Laki-laki">
									<span class="checkmark"></span>
								  </label>
								</div>
								<div class="form-row form-row-2">
								  <label class="container">Perempuan<input type="radio" name="jenis_kelamin" value="Perempuan" checked="checked">
									<span class="checkmark"></span>
								  </label>
								</div>
							</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="password" name="password" id="password" class="input-text" placeholder="Password" required>
						</div>
						<div class="form-row form-row-2">
							<input type="password" name="password2" id="cek()" class="input-text" placeholder="Confirm Password" required>
						</div>
					</div>
				</div>
				<div class="form-right">
					<h2>Detail Alamat</h2>
					<div class="form-row">
						<input type="text" name="alamat" class="street" id="alamat" placeholder="Alamat" required>
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
							</div>
						<div class="form-row form-row-2">
							<input type="number" name="telepon" class="phone" id="telepon" placeholder="No Telepon" required>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="email" id="email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Email">
					</div>
					<div class="form-checkbox">
						<label class="container"><p>I do accept the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
						  	<input type="checkbox" name="checkbox">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register" value="Register">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
<?php 
include 'config/koneksi.php';
function register($data){
  $nama   = mysqli_real_escape_string($koneksi, $data['nama']);
  $email   = mysqli_real_escape_string($koneksi, $data['email']);
  $jenis_kelamin   = mysqli_real_escape_string($koneksi, $data['jenis_kelamin']);
  $password = mysqli_real_escape_string($koneksi, $data['password']);
  $password2 = mysqli_real_escape_string($koneksi, $data['password2']);
  $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
  $provinsi = mysqli_real_escape_string($koneksi, $data['provinsi']);
  $kota = mysqli_real_escape_string($koneksi, $data['kota']);
  $kec = mysqli_real_escape_string($koneksi, $data['kec']);
  $kode_pos = mysqli_real_escape_string($koneksi, $data['kode_pos']);
  $no_hp = mysqli_real_escape_string($koneksi, $data['no_hp']);
  $email = mysqli_real_escape_string($koneksi, $data['email']);

  $result = mysqli_query($koneksi, "SELECT email FROM tb_member WHERE email = '$email'");
  if (mysqli_fetch_assoc($result)) {
    echo "
        <script>
        alert ('mohon maaf email yang anda masukan sudah terdaftar!')
        </script>";
    return false;
  }
  //cek passqord sama dengan konfirmasinya

  if ($password !== $password2) {
    echo "
        <script>
        alert ('konfirmasi password tidak sesuai');
        </script>
        ";
    return false;
  }
  $password = password_hash($password, PASSWORD_DEFAULT);
  $status = 0;
  $sql = "INSERT INTO tb_member (id_member,
                                             nama,
                                             alamat,
                                             jenis_kelamin,
                                             kecamatan,
                                             kabupaten_kota,
                                             provinsi,
                                             kode_pos,
                                             email,
                                             no_hp,
                                             password,
                                             status)
                                    VALUES('',
                                          '$nama',
                                          '$alamat',
                                          '$jenis_kelamin',
                                          '$kec',
                                          '$kota',
                                          '$provinsi',
                                          '$kode_pos',
                                          '$email',
                                          '$no_hp',
                                          '$password',
                                          '$status') ";
  mysqli_query($koneksi, $sql);
  return mysqli_affected_rows($koneksi);
  // tulis ('behasil daftar');
}
 ?>
</html>

