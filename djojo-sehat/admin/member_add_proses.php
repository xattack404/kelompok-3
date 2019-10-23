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
  $id = mysqli_real_escape_string($koneksi,$_POST['id_member']);
  $nama       = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $alamat       = mysqli_real_escape_string($koneksi,$_POST['alamat']);
  $tempat_lahir       = mysqli_real_escape_string($koneksi,$_POST['tempat_lahir']);
  $tanggal_lahir       = mysqli_real_escape_string($koneksi,$_POST['tanggal_lahir']);
  $kecamatan       = mysqli_real_escape_string($koneksi,$_POST['kecamatan']);
  $kabupaten       = mysqli_real_escape_string($koneksi,$_POST['kabupaten']);
  $kode_pos       = mysqli_real_escape_string($koneksi,$_POST['kd_pos']);
  $email       = mysqli_real_escape_string($koneksi,$_POST['email']);
  $nohp       = mysqli_real_escape_string($koneksi,$_POST['hp']);
  $tampung    = mysqli_real_escape_string($koneksi,$_POST['password']);
  $password   = password_hash($tampung, PASSWORD_DEFAULT);
  
  //Melakukan cek data ke tabel agar tidak ada data yang sama
  $cekdata = "SELECT email FROM tb_member WHERE email = '$email' ";
  $ada     = mysqli_query($koneksi, $cekdata);
  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: Username telah terdaftar, silahkan pakai Username lain!');history.go(-1)</script>";
  }
    else
    {
      // Proses insert data dari form ke db
      $sql = "INSERT INTO tb_member (id_member,
                                    nama, 
                                    alamat,
                                    tempat_lahir, 
                                    tanggal_lahir, 
                                    kecamatan, 
                                    kabupaten_kota,
                                    kode_pos,
                                    email,
                                    no_hp,
                                    password)
                        VALUES  ('$id',
                                '$nama',
                                '$alamat',
                                '$tempat_lahir',
                                '$tanggal_lahir',
                                '$kecamatan',
                                '$kabupaten',
                                '$kode_pos',
                                '$email',
                                '$nohp',
                                '$tipe',
                                '$password')";

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