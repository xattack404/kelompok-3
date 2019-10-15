<?php 
include '../admin/cek_session.php';
if($sesen_akses != "admin")
{
echo "<script>alert('Anda tidak memiliki hak untuk menghapus data!'); location.replace('../index.php')</script>";
session_destroy();
}
?>