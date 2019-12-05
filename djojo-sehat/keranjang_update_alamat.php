<?php
include 'config/koneksi.php';
include 'fungsi/cek_session_public.php';

if(isset($_SESSION['save']))
{
  $sql = "SELECT * FROM tb_member WHERE id_member = '$sesen_id'";
  $result = mysqli_query($koneksi, $sql);
  $data   = mysqli_fetch_array($result);

  $prov       = mysqli_real_escape_string($koneksi,$_POST['prov']);
  $kot        = mysqli_real_escape_string($koneksi,$_POST['kot']);
  $kec        = mysqli_real_escape_string($koneksi,$_POST['kec']);

 if (mysqli_num_rows($result == 0)){
    echo "<script language='javascript'>alert('User Tidak Terdaftar');location.replace('./keranjang.html')</script>";
 }else{
    $create = mysqli_query($koneksi, "UPDATE INTO tb_member (
        prov,
        kot,
        kec)
VALUES ('$prov',
        '$kot',
        '$kec')");

        echo "<script language='javascript'>alert('Update berhasil');location.replace('./keranjang.html')</script>";
 }
}
?>