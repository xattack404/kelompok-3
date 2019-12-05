<?php
include 'config/koneksi.php';
include 'fungsi/cek_session_public.php';

if(isset($_POST['save']))
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
        judul_alamat,
        nama,
        alamat, 
        kecamatan,
        kabupaten_kota,
        Provinsi,
        kodepos,
        no_hp)
VALUES ('$id',
        '$judul',
        '$nama',
        '$alamat',
        '$kec',
        '$kot',
        '$prov',
        '$kopos',
        '$hp')");

 }

?>