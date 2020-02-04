<?php
include 'config/koneksi.php';
include 'fungsi/base_url.php';
//require 'phpmailer/PHPMailerAutoload.php';

if(isset($_POST['submit']))
{
  $nama       = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $email      = mysqli_real_escape_string($koneksi,$_POST['email']);
  $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $create = mysqli_query($koneksi, "INSERT INTO tb_member (
                                            id_member,
                                            nama,
                                            email,
                                            password)
                                    VALUES ('',
                                            '$nama',
                                            '$email',
                                            '$password')");
          echo "<script>alert('Registrasi berhasil');location.replace('$base_url')</script>";

        
      }
?>
