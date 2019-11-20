<?php 
session_start();



function register($_POST){
  $nama   = mysqli_real_escape_string($koneksi, $_POST['nama']);
  $email   = mysqli_real_escape_string($koneksi, $_POST['email']);
  $jenis_kelamin   = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
  $password = mysqli_real_escape_string($koneksi, $_POST['password']);
  $password2 = mysqli_real_escape_string($koneksi, $_POST['password2']);
  $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
  $provinsi = mysqli_real_escape_string($koneksi, $_POST['provinsi']);
  $kota = mysqli_real_escape_string($koneksi, $_POST['kota']);
  $kec = mysqli_real_escape_string($koneksi, $_POST['kec']);
  $kode_pos = mysqli_real_escape_string($koneksi, $_POST['kode_pos']);
  $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
  $email = mysqli_real_escape_string($koneksi, $_POST['email']);

  $result = mysqli_query($koneksi, "SELECT email FROM tb_member WHERE email = '$email'");
  if (mysqli_fetch_assoc($result)) {
    echo "
        <script>
        alert ('mohon maaf email yang anda masukan sudah terdaftar!')
        </script>";
    return false;
  }
  //cek passqord sama dengan konfirmasinya

  if ($password !== $password2) {
    echo "
        <script>
        alert ('konfirmasi password tidak sesuai');
        </script>
        ";
    return false;
  }
  $password = password_hash($password, PASSWORD_DEFAULT);
  $status = 0;
  $sql = "INSERT INTO tb_member (id_member,
                                             nama,
                                             alamat,
                                             jenis_kelamin,
                                             kecamatan,
                                             kabupaten_kota,
                                             provinsi,
                                             kode_pos,
                                             email,
                                             no_hp,
                                             password,
                                             status)
                                    VALUES('',
                                          '$nama',
                                          '$alamat',
                                          '$jenis_kelamin',
                                          '$kec',
                                          '$kota',
                                          '$provinsi',
                                          '$kode_pos',
                                          '$email',
                                          '$no_hp',
                                          '$password',
                                          '$status') ";
  mysqli_query($koneksi, $sql);
  return mysqli_affected_rows($koneksi);
  // tulis ('behasil daftar');
}

  // function tulis($aktivitas){
  //   $fp = fopen('catatanyanglogin.txt', 'a+');
  //   $ip = $_SERVER['REMOTE_ADDR'];
  //   $nama = $_SERVER['HTTP_USER_AGENT'];
  //   $time = date("y-m-d H:i:s");
  //   fwrite($fp, $time.' : '.$ip.' '.$nama.' : '.$aktivitas."\n");
  //   fclose($fp);
  // }
?>
