<?php

include 'config/koneksi.php';
include 'fungsi/base_url.php';

if(isset($_POST['submit']))
{
  $nama       = mysqli_real_escape_string($conn,$_POST['nama']);
  $username   = mysqli_real_escape_string($conn,$_POST['username']);
  $email      = mysqli_real_escape_string($conn,$_POST['email']);
  $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $telepon    = mysqli_real_escape_string($conn,$_POST['telepon']);
  $alamat     = mysqli_real_escape_string($conn,$_POST['alamat']);
  $kopos      = mysqli_real_escape_string($conn,$_POST['kopos']);
  $prov       = mysqli_real_escape_string($conn,$_POST['prov']);
  $kot        = mysqli_real_escape_string($conn,$_POST['kot']);
  $kec        = mysqli_real_escape_string($conn,$_POST['kec']);
}

?>