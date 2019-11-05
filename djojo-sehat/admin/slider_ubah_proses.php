<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';                         // Panggil fungsi cek sudah login/belum
include 'cek_session.php';                      // Panggil fungsi cek session
include '../fungsi/cek_aksi_ubah.php';         // Panggil fungsi boleh ubah data atau tidak

if(isset($_POST['submit']))
{
  $id_slider    = mysqli_real_escape_string($koneksi, $_POST['id_slider']);
  $judul_slider = mysqli_real_escape_string($koneksi, $_POST['judul_slider']);
  $link         = mysqli_real_escape_string($koneksi, $_POST['link']);

  $allowed_ext    = array('jpg', 'jpeg', 'png', 'gif');
  $file_name      = $_FILES['img']['name']; // File adalah name dari tombol input pada form
  $file_ext       = strtolower(end(explode('.', $file_name)));
  $file_tmp       = $_FILES['img']['tmp_name'];
  $lokasi         = '../images/slider/'.$judul_slider.'.'.$file_ext;
  $img            = $judul_slider.'.'.$file_ext;

  if(!empty($file_tmp))
  {
    if(in_array($file_ext, $allowed_ext) === true)
    {
      //Hapus photo yang lama jika ada
      $del  = "SELECT gambar FROM tb_slider WHERE id_slider = '$id_slider' LIMIT 1";
      $res  = mysqli_query($koneksi, $del);
      $d    = mysqli_fetch_object($res);
      if(file_exists($d->img))
      {
        // Memutuskan koneksi file yang lama
        unlink($d->img);
      }
      move_uploaded_file($file_tmp, $lokasi);
      // Update photo dengan yang baru
      $update = "UPDATE tb_slider SET gambar = '$img' WHERE id_slider = '$id_slider' ";
      $upd = mysqli_query($koneksi, $update);
    }
      else
      {
        echo "<script>alert('Format file tidak sesuai!');history.go(-1)</script>";
      }
  }

  $sql = "UPDATE tb_slider SET id_slider    = '$id_slider',
                            judul_slider    = '$judul_slider',
                            link            = '$link',
                            gambar          = '$img'
                            WHERE id_slider = '$id_slider' LIMIT 1";

  if(mysqli_query($koneksi, $sql))
  {
    echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('slider_list.php')</script>";
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
