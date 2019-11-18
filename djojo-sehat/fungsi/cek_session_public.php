<?php
if(isset($_SESSION['username']))
{
  $sesen_id         = $_SESSION['id_customer'];
  $sesen_email      = $_SESSION['email'];
  $sesen_nama       = $_SESSION['nama'];
  $sesen_kecamatan  = $_SESSION['kecamatan'];
  $sesen_kota       = $_SESSION['kabupaten_kota'];
  $sesen_provinsi   = $_SESSION['provinsi'];
  
}
?>
