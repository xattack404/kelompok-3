<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_ubah.php';    // Panggil fungsi boleh ubah data atau tidak

$id    = mysqli_real_escape_string($koneksi, $_GET['id_slider']);

$cekdata = "SELECT active FROM tb_slider WHERE active = 1 ";
$ada     = mysqli_query($koneksi, $cekdata);
if(mysqli_num_rows($ada) >= 0)
{ 
  $sql = mysqli_query($koneksi,"UPDATE tb_slider SET active = 0 WHERE active = 1 ");

  $sql = "UPDATE tb_slider SET active = 1 WHERE id_slider  = '$id' ";
                            
  if(mysqli_query($koneksi, $sql)) 
  {
    echo "<script>alert('Set Active berhasil! Klik ok untuk melanjutkan');location.replace('slider_list.php')</script>";
  } 
    else 
    {
      echo "Error updating record: " . mysqli_error($koneksi);
    }
}
?>