<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';                     // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_ubah.php';    // Panggil fungsi boleh ubah data atau tidak
include '../fungsi/judul_seo.php';        // Panggil fungsi mengubah teks menjadi tanpa spasi dan simbol


if(isset($_POST['submit']))
{
  $id    = mysqli_real_escape_string($koneksi,$_POST['id']);
  $nama       = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $alamat       = mysqli_real_escape_string($koneksi,$_POST['alamat']);
  $tempat_lahir       = mysqli_real_escape_string($koneksi,$_POST['tempat_lahir']);
  $tanggal_lahir       = mysqli_real_escape_string($koneksi,$_POST['tanggal_lahir']);
  $kecamatan       = mysqli_real_escape_string($koneksi,$_POST['kecamatan']);
  $kabupaten       = mysqli_real_escape_string($koneksi,$_POST['kabupaten']);
  $provinsi      = mysqli_real_escape_string($koneksi,$_POST['provinsi']);
  $kode_pos       = mysqli_real_escape_string($koneksi,$_POST['kd_pos']);
  $email       = mysqli_real_escape_string($koneksi,$_POST['email']);
  $no_hp       = mysqli_real_escape_string($koneksi,$_POST['hp']);
  $tampung    = mysqli_real_escape_string($koneksi,$_POST['password']);
  
  // Proses update data dari form ke db
  $sql = "UPDATE tb_member SET id_member    = '$id',
                              nama        = '$nama',
                              alamat    = '$alamat',
                              tempat_lahir   = '$tempat_lahir',
                              tanggal_lahir       = '$tanggal_lahir',
                              kecamatan       = '$kecamatan',
                              kabupaten       = '$kabupaten',
                              provinsi       = '$provinsi',
                              kode_pos       = '$kode_pos',
                              email       = '$email',
                              no_hp       = '$no_hp',
                              password       = '$tampung'
                        WHERE id_login    = '$id'";

  if(mysqli_query($koneksi, $sql)) 
  {
   echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('member_list.php')</script>";
  } 
    else 
    {
      echo "Error updating record: " . mysqli_error($koneksi);
    }
}
  else
  {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
  }
?>