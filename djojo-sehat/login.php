<?php session_start();
include 'config/koneksi.php';
include 'fungsi/base_url.php';
// jika tombol submit ditekan
if(isset($_POST['submit']))
{
  $errors     = array();
  $email   = mysqli_real_escape_string($koneksi, $_POST['email']);
  $pass       = mysqli_real_escape_string($koneksi, $_POST['password']);

  if (empty($email) && empty($pass))
  {
    echo "<script language='javascript'>alert('Isikan EMAIL dan PASSWORD'); history.go(-1)</script>";
  }
  elseif (empty($email))
  {
    echo "<script language='javascript'>alert('Isikan EMAIL'); history.go(-1)</script>";
  }
  elseif (empty($pass))
  {
    echo "<script language='javascript'>alert('Isikan PASSWORD'); history.go(-1)</script>";
  }

  // cek data ke db

  $sql    = "SELECT * FROM tb_member WHERE email = '$email' ";


  $result = mysqli_query($koneksi, $sql);
  $data   = mysqli_fetch_array($result);

  if (mysqli_num_rows($result) == 0)
  {
  	echo "<script>alert('Email yang Anda masukkan tidak terdaftar!');history.go(-1)</script>";
  }
  elseif($data['status'] == 0)
  {
  	echo "<script>alert('Akun Anda belum diverifikasi, silahkan verifikasi via email dahulu!');history.go(-1)</script>";
	}
		else
		{
	    if(password_verify($pass, $data['password']))
	    {
	      if(empty($errors))
	      {
	        $_SESSION['id_member']         = $data['id_member'];
	        $_SESSION['email']             = $data['email'];
	        $_SESSION['nama']              = $data['nama'];
	        $_SESSION['kecamatan']         = $data['kecamatan'];
	        $_SESSION['kabupaten_kota']    = $data['kabupaten_kota'];
	        $_SESSION['provinsi']          = $data['provinsi'];

	        echo "<script language='javascript'>alert('Anda berhasil Login'); location.replace('$base_url')</script>";
          tulis("Berhasil Login");
	      }
	    }
	      else
	      {
	        echo "<script>alert('PASSWORD SALAH!');history.go(-1)</script>";
	      }
	  }
}
  else
  {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombolnya!');location.replace('$base_url')</script>";
  }
  function tulis($aktivitas){
    $fp = fopen('catatanyanglogin.txt', 'a+');
    $ip = $_SERVER['REMOTE_ADDR'];
    $nama = $_SERVER['HTTP_USER_AGENT'];
    $time = date("y-m-d H:i:s");
    fwrite($fp, $time.' : '.$ip.' '.$nama.' : '.$aktivitas."\n");
    fclose($fp);
  }
?>
