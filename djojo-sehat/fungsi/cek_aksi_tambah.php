<?php
include 'cek_session.php';
if($sesen_akses == "")
{
echo "<script>alert('Anda tidak memiliki hak akses apapun, silahkan hubungi Admin!'); location.replace('../index.php')</script>";
session_destroy();
}
?>