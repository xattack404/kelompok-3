<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';                     // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_ubah.php';    // Panggil fungsi boleh ubah data atau tidak
include '../fungsi/judul_seo.php';        // Panggil fungsi mengubah teks menjadi tanpa spasi dan simbol

if(isset($_POST['submit']))
{
  $id_kat       = mysqli_real_escape_string($koneksi, $_POST['id_kat']);
  $judul_kat    = mysqli_real_escape_string($koneksi, $_POST['judul_kat']);

  $sql = "UPDATE tb_kategori SET id_kategori = '$id_kat', nama_kategori = '$judul_kat' WHERE id_kategori = '$id_kat' ";
                            
  if(mysqli_query($koneksi, $sql)) 
  {
    echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('kategori_list.php')</script>";
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