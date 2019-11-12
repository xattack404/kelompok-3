<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';                     // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_ubah.php';    // Panggil fungsi boleh ubah data atau tidak
include '../fungsi/judul_seo.php';        // Panggil fungsi mengubah teks menjadi tanpa spasi dan simbol

if(isset($_POST['submit']))
{
  $id_konsultasi       = mysqli_real_escape_string($koneksi, $_POST['id_konsultasi']);
  $id_member       = mysqli_real_escape_string($koneksi, $_POST['id_member']);
  $id_topik       = mysqli_real_escape_string($koneksi, $_POST['id_topik']);
  $isi       = mysqli_real_escape_string($koneksi, $_POST['isi']);
  $balas       = mysqli_real_escape_string($koneksi, $_POST['balas']);
  $penjawab       = mysqli_real_escape_string($koneksi, $_POST['penjawab']);
  $sql = "UPDATE tb_konsultasi SET id_member = '$id_member', 
                                  id_topik = '$id_topik',
                                  isi_konsultasi = '$isi',
                                  balas_konsultasi = '$balas',
                                  id_login = '$penjawab'
                              WHERE id_konsultasi = '$id_konsultasi' ";
                            
  if(mysqli_query($koneksi, $sql))
  {
    echo "<script>alert('Balas konsultasi user berhasil! Klik ok untuk melanjutkan');location.replace('konsultasi_list.php')</script>";
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