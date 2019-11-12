<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_ubah.php';    // Panggil fungsi boleh ubah data atau tidak
include 'cek_session.php';      // Panggil fungsi cek session

if(isset($_POST['submit']))
{
  $id_nav         = mysqli_real_escape_string($koneksi, $_POST['id_navigasi']);
  $seo_deskripsi  = mysqli_real_escape_string($koneksi, $_POST['seo_deskripsi']);
  $seo_keywords   = mysqli_real_escape_string($koneksi, $_POST['seo_keyword']);
  $isi            = mysqli_real_escape_string($koneksi, $_POST['isi']);

  $sql = "UPDATE tb_navigasi SET id_navigasi    = '$id_nav',
                                isi             = '$isi',
                              seo_deskripsi     = '$seo_deskripsi',
                              seo_keyword       = '$seo_keywords'
                       WHERE  id_navigasi       = '$id_nav' ";
                            
  if(mysqli_query($koneksi, $sql)) 
  {
    echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('navigasi.php?id_navigasi=$id_nav')</script>";
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