<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';                     // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_ubah.php';    // Panggil fungsi boleh ubah data atau tidak
include '../fungsi/judul_seo.php';        // Panggil fungsi mengubah teks menjadi tanpa spasi dan simbol


if(isset($_POST['submit']))
{
  $id    = mysqli_real_escape_string($koneksi,$_POST['id']);
  $nama       = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $username   = mysqli_real_escape_string($koneksi,$_POST['username']);
  $no_hp      = mysqli_real_escape_string($koneksi,$_POST['no_hp']);
  $tipe       = mysqli_real_escape_string($koneksi,$_POST['tipe']);
  $access     = mysqli_real_escape_string($koneksi,$_POST['access']);
  
  // Proses update data dari form ke db
  $sql = "UPDATE tb_login SET id_login    = '$id',
                              nama        = '$nama',
                              username    = '$username',
                              id_posisi   = '$tipe',
                              akses       = '$access',
                              no_hp       = '$no_hp'
                        WHERE id_login    = '$id'";

  if(mysqli_query($koneksi, $sql)) 
  {
   echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('user_list.php')</script>";
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