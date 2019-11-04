<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_ubah.php';    // Panggil fungsi boleh ubah data atau tidak
include 'cek_session.php';      // Panggil fungsi cek session

if(isset($_POST['submit']))
{
  $id_setting   = mysqli_real_escape_string($koneksi, $_POST['id_setting']);
  $isi_setting  = mysqli_real_escape_string($koneksi, $_POST['isi_setting']);

  $sql = "UPDATE tb_setting SET  id_setting    = '$id_setting',
                                 isi_setting   = '$isi_setting'
                          WHERE  id_setting    = '$id_setting' ";
                            
  if(mysqli_query($koneksi, $sql)) 
  {
    echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('setting.php?id_setting=$id_setting')</script>";
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