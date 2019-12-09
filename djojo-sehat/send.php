<?php
include 'config/koneksi.php';
include 'fungsi/base_url.php';

if(isset($_POST['register']))
{
  $nama       = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $email      = mysqli_real_escape_string($koneksi,$_POST['email']);
  $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // cek data
  $sql        = "SELECT email FROM tb_member WHERE email = '$email'";
  $cek_email  = mysqli_query($koneksi,$sql);
  if(mysqli_num_rows($cek_email) > 0)
  {
    // Alert/ pemberitahuan email yang dipakai telah ada/ tidak
    echo "<script>alert('Email telah terpakai, silahkan gunakan email yang lain!');history.go(-1)</script>";
  }
  else
  {
    if(empty($nama))
    {
      echo "<script>alert('Nama harus diisi!');history.go(-1)</script>";
    }
    elseif(empty($email))
    {
      echo "<script>alert('email harus diisi!');history.go(-1)</script>";
    }
    elseif(empty($password))
    {
      echo "<script>alert('password harus diisi!');history.go(-1)</script>";
    }
      else
      {
          // Proses insert data customer
          $create = mysqli_query($koneksi, "INSERT INTO tb_member (
                                            id_member,
                                            nama,
                                            alamat,
                                            jenis_kelamin,
                                            kecamatan,
                                            kabupaten_kota,
                                            provinsi,
                                            kode_pos,
                                            email,
                                            no_hp,
                                            password)
                                    VALUES ('',
                                            '$nama',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '$email',
                                            '',
                                            '$password')");

          echo "<script>alert('Registrasi berhasil');history.go(-1)</script>";
        }
      }//location.replace('$base_url')
  }
//}
?>
