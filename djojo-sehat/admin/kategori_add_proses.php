<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include 'cek_session.php';      // Panggil fungsi cek session
include '../fungsi/cek_aksi_tambah.php';  // Panggil fungsi boleh tamabah data atau tidak
include '../fungsi/judul_seo.php';        // Panggil fungsi judul_seo untuk merubah teks dalam format tanpa spasi dan simbol
require "template/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;


if(isset($_POST['submit']))
{
  $uuid = Uuid::uuid4()->toString();
  $judul_kat    = mysqli_real_escape_string($koneksi, $_POST['judul_kat']);

  $cekdata = "SELECT nama_kategori FROM tb_kategori WHERE nama_kategori = '$judul_kat' ";
  $ada     = mysqli_query($koneksi, $cekdata);
  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: Judul telah terdaftar, silahkan pakai Judul lain!');history.go(-1)</script>";
  }
    else
    {
      // Proses insert data dari form ke db
      $sql = "INSERT INTO tb_kategori (id_kategori, nama_kategori) VALUES ('$uuid', '$judul_kat')";

      if(mysqli_query($koneksi, $sql)) 
      {
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('kategori_list.php')</script>";
      } 
        else 
        {
          echo "Error updating record: " . mysqli_error($koneksi);
        }
    }
}
  else
  {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
  }
?>