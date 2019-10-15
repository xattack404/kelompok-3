<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include 'cek_session.php';      // Panggil fungsi cek session
include '../fungsi/cek_aksi_tambah.php';  // Panggil fungsi boleh tamabah data atau tidak
include '../fungsi/judul_seo.php';        // Panggil fungsi judul_seo untuk merubah teks dalam format tanpa spasi dan simbol

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


  $cekdata = "SELECT nama_barang FROM tb_barang WHERE nama_barang = '$nama' ";
  $ada     = mysqli_query($koneksi, $cekdata);
  if(mysqli_num_rows($ada) > 0)
  {
    echo "<script>alert('ERROR: Judul telah terdaftar, silahkan pakai Judul lain!');history.go(-1)</script>";
  }
    else
    {
      $allowed_ext  = array('jpg', 'jpeg', 'png', 'gif');
      $file_name    = $_FILES['img']['name']; // File adalah name dari tombol input pada form
      $file_ext     = strtolower(end(explode('.', $file_name)));
      $file_tmp     = $_FILES['img']['tmp_name'];
      $lokasi       = '../images/produk/'.$nama.'.'.$file_ext;
      $img          = $nama.'.'.$file_ext;

      if(in_array($file_ext, $allowed_ext) === true)
      {
        move_uploaded_file($file_tmp, $lokasi);
        // Proses insert data dari form ke db
        $sql = "INSERT INTO tb_barang (id_barang,
                                      nama_barang,
                                      judul,
                                      jenis,
                                      id_satuan,
                                      jumlah,
                                      berat,
                                      deskripsi,
                                      harga_beli,
                                      harga_jual,
                                      foto_barang,
                                      kategori)
                            VALUES ('$id',
                                    '$nama',
                                    '$judul',
                                    '$jenis',
                                    '$satuan',
                                    '$jumlah',
                                    '$berat',
                                    '$deskripsi',
                                    '$harga_beli',
                                    '$harga_jual',
                                    '$img',
                                    '$kategori')";
        if(mysqli_query($koneksi, $sql))
        {
          echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('produk_list.php')</script>";
        }
          else
          {
            echo "Error updating record: " . mysqli_error($koneksi);
          }
      }
        else
        {
          echo "<script>alert('Jenis file tidak sesuai!');history.go(-1)</script>";
        }
    }
}
  else
  {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
  }
?>
