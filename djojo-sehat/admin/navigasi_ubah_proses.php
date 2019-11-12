<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include '../fungsi/cek_login.php';        // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_ubah.php';    // Panggil fungsi boleh ubah data atau tidak
include '../fungsi/cek_session.php';      // Panggil fungsi cek session

if(isset($_POST['submit']))
{
  $id_nav         = mysqli_real_escape_string($koneksi, $_POST['id_navigasi']);
  $seo_deskripsi  = mysqli_real_escape_string($koneksi, $_POST['seo_deskripsi']);
  $seo_keywords   = mysqli_real_escape_string($koneksi, $_POST['seo_keywords']);
  $isi            = mysqli_real_escape_string($koneksi, $_POST['isi']);

  $sql = "UPDATE navigasi SET id_nav        = '$id_nav',
                                isi         = '$isi',
                              seo_deskripsi = '$seo_deskripsi',
                              seo_keywords  = '$seo_keywords'
                       WHERE  id_navigasi   = '$id_nav' ";
                            
  if(mysqli_query($koneksi, $sql)) 
  {
    echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('navigasi.php?id_nav=$id_nav')</script>";
  } 
    else 
    {
      echo "Error updating record: " . mysqli_error($conn);
    }
}
  else
  {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
  } 
?>