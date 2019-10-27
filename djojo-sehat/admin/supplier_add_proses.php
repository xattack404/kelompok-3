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
  $nama       = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $alamat     = mysqli_real_escape_string($koneksi,$_POST['alamat']);
  $no_Hp      = mysqli_real_escape_string($koneksi,$_POST['hp']);
  $cekdata    = "SELECT nama FROM tb_supplier WHERE nama = '$nama' ";
  $ada        = mysqli_query($koneksi, $cekdata);
  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: Nama telah terdaftar !');history.go(-1)</script>";
  }
    else
    {
      // Proses insert data dari form ke db
      $sql = "INSERT INTO tb_supplier (id_supplier, 
                                    nama_supplier,
                                    alamat,
                                    no_hp)
                        VALUES  ('$uuid',
                                '$nama',
                                '$alamat',
                                '$no_Hp')";

      if(mysqli_query($koneksi, $sql)) 
      {
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('supplier_list.php')</script>";
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