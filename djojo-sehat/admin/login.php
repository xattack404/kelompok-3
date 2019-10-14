<?php session_start();
include "../config/koneksi.php";

if(isset($_POST['submit']))
{
  $errors 	= array();
  $username = mysqli_real_escape_string($koneksi,$_POST['username']);
  $password = mysqli_real_escape_string($koneksi,$_POST['password']);

  if (empty($username) && empty($password))
  {
    echo "<script language='javascript'>alert('Isikan USERNAME dan PASSWORD'); location.replace('index.php')</script>";
  }
  elseif (empty($username))
  {
    echo "<script language='javascript'>alert('Isikan USERNAME'); location.replace('index.php')</script>";
  }
  elseif (empty($password))
  {
    echo "<script language='javascript'>alert('Isikan PASSWORD'); location.replace('index.php')</script>";
  }

  $sql    = "SELECT * FROM tb_login WHERE username = '$username'";
  $result = mysqli_query($koneksi, $sql);
  $data   = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) > 0)
  {
    if(password_verify($password, $data['password']))
    {
      if(empty($errors))
      {
        // Menyimpan session login
        $_SESSION['id_login']    = $data['id_login'];   // id user
        $_SESSION['username']    = $data['username'];      // username user
        $_SESSION['nama']	       = $data['nama'];  // nama user
        $_SESSION['id_posisi']   = $data['id_posisi'];  // tipe user
        $_SESSION['akses']       = $data['akses'];    // hak akses user

        if($data['akses'] == 'admin')
        {
          echo "<script language='javascript'>alert('Anda berhasil Login sebagai Admin'); location.replace('home.php')</script>";
        }
        
      }
    }
      else
      {
        echo "<script>alert('PASSWORD SALAH!');history.go(-1)</script>";
      }
  }
    else
    {
      echo "<script>alert('USERNAME yang Anda masukkan tidak terdaftar!');history.go(-1)</script>";
    }
}
  else
  {
    echo "<script>alert('Pencet dulu tombolnya!');history.go(-1)</script>";
  }
?>
