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
  $no_hp      = mysqli_real_escape_string($koneksi,$_POST['no_hp']);
 
  
  // Proses update data dari form ke db
  $sql = "UPDATE tb_supplier SET nama_supplier   = '$nama',
                              alamat      = '$alamat',
                              no_hp       = '$no_hp'
                        WHERE id_supplier   = '$id'";

  if(mysqli_query($koneksi, $sql)) 
  {
   echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('supplier_list.php')</script>";
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