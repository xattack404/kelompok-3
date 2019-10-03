<?php 
require '../_config/config.php';

if (isset($_POST['daftar'])) {
	global $conn;

		$nama = htmlspecialchars($_POST['nama']);
		$username = strtolower(stripcslashes($_POST['username']));
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
		$no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
		
		// cek username di database
		$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
		if (mysqli_fetch_assoc($result)) {
			echo "
				<script>
				alert ('mohon maaf username sudah terdaftar!');
				</script>";
		return false;
		}
		// cek password yang diinputkan sama atau tidak
		if ($password !== $password2) {
			echo "
				<script>
				alert ('konfirmasi password tidak sesuai');
				</script>
				";
		return false;
		}
		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);
		// tambahkan user baru ke database
		mysqli_query($conn, "INSERT INTO tb_user VALUES ('', '$nama', '$username', '$password', '$email', '$no_hp')");
		echo "
				<script>
						alert('anda berhasil daftar!');
						document.location.href = 'login.php';
				</script>

				";

}






?>