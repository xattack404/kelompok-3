<?php session_start();
include '../config/koneksi.php';                    // Panggil koneksi ke database
include 'cek_login.php';          // Panggil fungsi cek sudah login/belum
include 'cek_session.php';        // Panggil fungsi cek session
include '../fungsi/cek_aksi_tambah.php';    // Panggil fungsi boleh tambah data atau tidak
include '../fungsi/cek_hal_superadmin.php'; // Panggil fungsi hanya superadmin yang boleh melakukan aksi

if(isset($_POST['submit']))
{
  $nama       = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $username   = mysqli_real_escape_string($koneksi,$_POST['username']);
  $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $usertype   = mysqli_real_escape_string($koneksi,$_POST['akses']);
  $access     = mysqli_real_escape_string($koneksi,$_POST['id_posisi']);

  $cekdata = "SELECT username FROM tb_login WHERE username = '$username' ";
  $ada     = mysqli_query($koneksi, $cekdata);
  if(mysqli_num_rows($ada) > 0)
  { 
    echo "<script>alert('ERROR: Username telah terdaftar, silahkan pakai Username lain!');history.go(-1)</script>";
  }
    else
    {
      // Proses insert data dari form ke db
      $sql = "INSERT INTO tb_login (nama,
                                username,
                                password,
                                id_posisi,
                                akses)
                        VALUES ('$nama',
                                '$username',
                                '$password',
                                '$access',
                                '$usertype',
                                now(),
                                now())";

      if(mysqli_query($koneksi, $sql)) 
      {
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('user_list.php')</script>";
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