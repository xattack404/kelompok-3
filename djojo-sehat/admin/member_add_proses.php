<?php session_start();
include '../config/koneksi.php';                    // Panggil koneksi ke database
include 'cek_login.php';          // Panggil fungsi cek sudah login/belum
include 'cek_session.php';        // Panggil fungsi cek session
include '../fungsi/cek_aksi_tambah.php';    // Panggil fungsi boleh tambah data atau tidak
include '../fungsi/cek_hal_superadmin.php'; // Panggil fungsi hanya superadmin yang boleh melakukan aksi


if(isset($_POST['submit']))
{
  
  $nama       = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $alamat       = mysqli_real_escape_string($koneksi,$_POST['alamat']);
  $jenis_kelamin       = mysqli_real_escape_string($koneksi,$_POST['jenis_kelamin']);
  $kecamatan       = mysqli_real_escape_string($koneksi,$_POST['kecamatan']);
  $kabupaten       = mysqli_real_escape_string($koneksi,$_POST['kabupaten']);
  var_dump($kabupaten);
  $provinsi      = mysqli_real_escape_string($koneksi,$_POST['provinsi']);
  $kode_pos       = mysqli_real_escape_string($koneksi,$_POST['kd_pos']);
  $email       = mysqli_real_escape_string($koneksi,$_POST['email']);
  $no_hp       = mysqli_real_escape_string($koneksi,$_POST['no_hp']);
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
                                    jenis_kelamin, 
                                    kecamatan, 
                                    kabupaten_kota,
                                    provinsi,
                                    kode_pos,
                                    email,
                                    no_hp,
                                    password)
                        VALUES  ('',
                                '$nama',
                                '$alamat',
                                '$jenis_kelamin',
                                '$kecamatan',
                                '$kabupaten',
                                '$provinsi',
                                '$kode_pos',
                                '$email',
                                '$no_hp',
                                '$password')";

      if(mysqli_query($koneksi, $sql)) 
      {
        ///echo "<script>alert('Input data berhasil! Klik ok untuk melanjutkan');location.replace('member_list.php')</script>";
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