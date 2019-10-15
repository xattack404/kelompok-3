<?php
include '../admin/cek_session.php';
if($sesen_akses == "")
{
echo "<script>alert('Anda tidak memiliki hak akses apapun, silahkan hubungi Admin!'); location.replace('../index.php')</script>";
session_destroy();
}
if($sesen_akses == "admin2")
{
echo "<script>alert('Anda hanya bisa baca file!'); location.replace('../index.php')</script>";
session_destroy();
}
?>