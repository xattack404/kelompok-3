<?php
include '../admin/cek_session.php';
if($sesen_akses != 'admin' )
{
echo "<script>alert('Anda tidak berhak masuk ke halaman ini, harap login menjadi Super Admin terlebih dahulu');location.replace('index.php')</script>";
session_destroy();
}
?>