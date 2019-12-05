<?php
include 'config/koneksi.php';
include 'fungsi/cek_session_public.php';

if(isset($_SESSION['save']))
{
  $id      = mysqli_real_escape_string($koneksi,$_POST['id']);
  $nama      = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $judul       = mysqli_real_escape_string($koneksi,$_POST['judul']);
  $alamat       = mysqli_real_escape_string($koneksi,$_POST['alamat']);
  $kopos       = mysqli_real_escape_string($koneksi,$_POST['kopos']);
  $hp       = mysqli_real_escape_string($koneksi,$_POST['telepon']);
  $prov       = mysqli_real_escape_string($koneksi,$_POST['prov']);
  $kot        = mysqli_real_escape_string($koneksi,$_POST['kot']);
  $kec        = mysqli_real_escape_string($koneksi,$_POST['kec']);

    $create = mysqli_query($koneksi, "INSERT INTO detail_member (
        id_member,
        nama,
        judul_alamat,
        alamat,
        kodepos,
        no_hp,
        Provinsi,
        kabupaten_kota,
        kecamatan)
VALUES ('$id',
        '$nama',
        '$judul',
        '$alamat',
        '$kopos',
        '$telepon',
        '$prov',
        '$kot',
        '$kec')");

        echo "<script language='javascript'>alert('Update berhasil');location.replace('./keranjang.html')</script>";
 }

?>