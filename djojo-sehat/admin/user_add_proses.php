<?php session_start();
include '../config/koneksi.php';                    // Panggil koneksi ke database
include 'cek_login.php';          // Panggil fungsi cek sudah login/belum
include 'cek_session.php';        // Panggil fungsi cek session
include '../fungsi/cek_aksi_tambah.php';    // Panggil fungsi boleh tambah data atau tidak
include '../fungsi/cek_hal_superadmin.php'; // Panggil fungsi hanya superadmin yang boleh melakukan aksi
require "template/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

if(isset($_POST['submit']))
{
  $uuid = Uuid::uuid4()->toString();
  $username   = mysqli_real_escape_string($koneksi,$_POST['username']);
  $nama       = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $no_hp   = mysqli_real_escape_string($koneksi,$_POST['no_hp']);
  $tampung       = mysqli_real_escape_string($koneksi,$_POST['password']);
  $password   = password_hash($tampung, PASSWORD_DEFAULT);
  $tipe   = mysqli_real_escape_string($koneksi,$_POST['tipe']);
  $access     = mysqli_real_escape_string($koneksi,$_POST['access']);
  $cekdata = "SELECT username FROM tb_login WHERE username = '$username' ";
  $ada     = mysqli_query($koneksi, $cekdata);
  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: Username telah terdaftar, silahkan pakai Username lain!');history.go(-1)</script>";
  }
    else
    {
      // Proses insert data dari form ke db
      $sql = "INSERT INTO tb_login (id_login,
                                    username, 
                                    nama,
                                    no_hp, 
                                    password, 
                                    id_posisi, 
                                    akses)
                        VALUES  ('$uuid',
                                '$username',
                                '$nama',
                                '$no_hp',
                                '$password',
                                '$tipe',
                                '$access')";

      if(mysqli_query($koneksi, $sql)) 
      {
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('user_list.php')</script>";
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