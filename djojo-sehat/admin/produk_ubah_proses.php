<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';                     // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_ubah.php';    // Panggil fungsi boleh ubah data atau tidak
include '../fungsi/judul_seo.php';        // Panggil fungsi mengubah teks menjadi tanpa spasi dan simbol

error_reporting(0);
if(isset($_POST['submit']))
{
  $id             = mysqli_real_escape_string($koneksi, $_POST['id_brg']);
  $nama           = mysqli_real_escape_string($koneksi, $_POST['nama_brg']);
  $judul          = judul_seo($nama);
  $deskripsi      = mysqli_real_escape_string($koneksi, $_POST['deskripsi_brg']);
  $jenis          = mysqli_real_escape_string($koneksi, $_POST['jenis_brg']);
  $satuan         = mysqli_real_escape_string($koneksi, $_POST['satuan_brg']);
  $jumlah         = mysqli_real_escape_string($koneksi, $_POST['jumlah_brg']);
  $berat          = mysqli_real_escape_string($koneksi, $_POST['berat_brg']);
  $harga_beli     = mysqli_real_escape_string($koneksi, $_POST['hrg_beli']);
  $harga_jual     = mysqli_real_escape_string($koneksi, $_POST['hrg_jual']);
  $kategori       = mysqli_real_escape_string($koneksi, $_POST['kategori']);
  $supplier       = mysqli_real_escape_string($koneksi, $_POST['supplier']);

  $allowed_ext    = array('jpg', 'jpeg', 'png', 'gif');
  $file_name      = $_FILES['img']['name']; // File adalah name dari tombol input pada form
  $file_ext       = strtolower(end(explode('.', $file_name)));
  $file_tmp       = $_FILES['img']['tmp_name'];
  $lokasi         = '../images/produk/'.$judul.'.'.$file_ext;
  $img            = $judul.'.'.$file_ext;

  if(!empty($file_tmp))
  {
    if(in_array($file_ext, $allowed_ext) === true)
    {
      //Hapus photo yang lama jika ada
      $del  = "SELECT foto_barang FROM tb_barang WHERE id_barang = '$id' ";
      $res  = mysqli_query($koneksi, $del);
      $d    = mysqli_fetch_object($res);
      if(file_exists($d->$img))
      {
        // Memutuskan koneksi file yang lama
        unlink($d->$img);
      }
      move_uploaded_file($file_tmp, $lokasi);
      // Update photo dengan yang baru
      $update = "UPDATE tb_barang SET foto_barang = '$img' WHERE id_barang = '$id' ";
      $upd = mysqli_query($koneksi, $update);
    }
      else
      {
        echo "<script>alert('Format file tidak sesuai!');history.go(-1)</script>";
      }
  }

  $sql = "UPDATE tb_barang SET id_barang   = '$id',
                               nama_barang = '$nama',
                                   judul   = '$judul',
                                   jenis   = '$jenis',
                               id_satuan   = '$satuan',
                                  jumlah   = '$jumlah',
                                   berat   = '$berat',
                               deskripsi   = '$deskripsi',
                              harga_beli   = '$harga_beli',
                              harga_jual   = '$harga_jual',
                             foto_barang   = '$img',
                                kategori   = '$kategori',
                             id_supplier   = '$supplier'
                         WHERE id_barang   = '$id' ";


  if(mysqli_query($koneksi, $sql))
  {
    echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('produk_list.php')</script>";
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
