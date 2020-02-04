<?php
include 'base_url.php';
// Jika sesen_email tidak ditemukan/ belum dibuat, maka akan diarahkan ke halaman home
if (!isset($sesen_email))
{ 
  die ("<script>alert('HARAP LOGIN DULU'); location.replace('$base_url"."register_form.html')</script>");
}
?>