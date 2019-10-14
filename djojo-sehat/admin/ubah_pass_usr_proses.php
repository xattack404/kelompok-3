<?php session_start();
include '../config/koneksi.php';           // Panggil koneksi ke database
include 'cek_login.php';                  // Panggil fungsi cek sudah login/belum
include 'cek_session.php';               // Panggil fungsi cek session

if($sesen_akses == 'admin')
{
  if(isset($_POST['submit']))
  {
    $id_login        = $_POST['id_login'];
    $password       = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE tb_login SET password = '$password' WHERE id_login = '$id_login' ";

    if(mysqli_query($koneksi, $sql))
    {
      echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('ubah_pass_usr.php')</script>";
    }
      else
      {
        echo "Error updating record: " . mysqli_error($koneksi);
      }
  }
    else
    {
      echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
    }
}
  else
  {
    echo '<script>alert("Anda bukan Super Admin! Silahkan login menjadi Super Admin terlebih dahulu");location.replace("index.php")</script>';
  }
?>
