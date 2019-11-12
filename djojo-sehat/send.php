<?php
include 'config/koneksi.php';
include 'fungsi/base_url.php';
//require 'phpmailer/PHPMailerAutoload.php';

if(isset($_POST['submit']))
{
  $nama       = mysqli_real_escape_string($conn,$_POST['nama']);
  $username   = mysqli_real_escape_string($conn,$_POST['username']);
  $email      = mysqli_real_escape_string($conn,$_POST['email']);
  $tgl_lahir      = mysqli_real_escape_string($conn,$_POST['tanggal_lahir']);
  $tpt_lahir      = mysqli_real_escape_string($conn,$_POST['Tempat_lahir']);
  $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $telepon    = mysqli_real_escape_string($conn,$_POST['telepon']);
  $alamat     = mysqli_real_escape_string($conn,$_POST['alamat']);
  $kopos      = mysqli_real_escape_string($conn,$_POST['kopos']);
  $prov       = mysqli_real_escape_string($conn,$_POST['prov']);
  $kot        = mysqli_real_escape_string($conn,$_POST['kot']);
  $kec        = mysqli_real_escape_string($conn,$_POST['kec']);

  // cek data
  $sql        = "SELECT email, status FROM tb_member WHERE email = '$email' and status = 1 ";
  $cek_email  = mysqli_query($conn,$sql);
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
    elseif(empty($username))
    {
      echo "<script>alert('Username harus diisi!');history.go(-1)</script>";
    }
    elseif(empty($email))
    {
      echo "<script>alert('email harus diisi!');history.go(-1)</script>";
    }
    elseif(empty($password))
    {
      echo "<script>alert('password harus diisi!');history.go(-1)</script>";
    }
    elseif(empty($telepon))
    {
      echo "<script>alert('telepon harus diisi!');history.go(-1)</script>";
    }
      else
      {
        // Membuat kode unik untuk aktivasi akun dengan format md5
        $hash = md5(uniqid(rand(), true));

        // url: Membuat teks yang apabila di klik oleh user, maka akan masuk ke halaman aktivasi akun pada website
        $url      = $base_url.'activation.php?email='.urlencode($email)."&hash=$hash";

        $mail = new PHPMailer;

        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'emailyangdijadikansmtp@gmail.com';
        $mail->Password   = 'password';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('dariSiapaEmailIniDikirim@gmail.com', 'namanya siapa');
        $mail->addReplyTo('emailTujuanKetikaInginMembalasEmailYangDidapat@gmail.com', 'namanya siapa');

        // Menambahkan penerima
        $mail->addAddress($email);

        // Menambahkan beberapa penerima
        // $mail->addAddress('penerima2@contoh.com');
        // $mail->addAddress('penerima3@contoh.com');

        // Menambahkan cc atau bcc
        // $mail->addCC('cc@contoh.com');
        // $mail->addBCC('bcc@contoh.com');

        // Subjek email
        $mail->Subject = 'Aktivasi Akun Anda di namawebanda.com';

        // Mengatur format email ke HTML
        $mail->isHTML(true);

        // Konten/isi email
        $mailContent = "
          <h1>Terima kasih telah mendaftar di website kami, ".$nama.".</h1>
          <p>Terima kasih telah mendaftar di website kami, silahkan klik link berikut ini untuk memverifikasi akun Anda ".$url."</p>";
        $mail->Body = $mailContent;

        // Menambahakn lampiran
        // $mail->addAttachment('lmp/file1.pdf');
        // $mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

        // Kirim email
        if(!$mail->send())
        {
          echo "<script>alert('Registrasi gagal, silahkan coba lagi');history.go(-1)</script>";
          // echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        else
        {
          // Proses insert data customer
          $create = mysqli_query($conn, "INSERT INTO tb_member (
                                            nama,
                                            username,
                                            email,
                                            tanggal_lahir,
                                            tempat_lahir,
                                            password,
                                            telepon,
                                            alamat,
                                            kopos,
                                            provinsi,
                                            kota,
                                            kecamatan,
                                            hash,
                                            status)
                                    VALUES ('$nama',
                                            '$username',
                                            '$email',
                                            '$tgl_lahir',
                                            '$tpt_lahir',
                                            '$password',
                                            '$telepon',
                                            '$alamat',
                                            '$kopos',
                                            '$prov',
                                            '$kot',
                                            '$kec',
                                            '$hash',
                                            '0')");

          echo "<script>alert('Registrasi berhasil, silahkan cek email Anda untuk aktivasi.');history.go(-1)</script>";
        }
      }
  }
}
?>
