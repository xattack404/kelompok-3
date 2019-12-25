<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include 'cek_session.php';      // Panggil fungsi cek session
include '../fungsi/cek_aksi_tambah.php';  // Panggil fungsi boleh tamabah data atau tidak
include '../fungsi/judul_seo.php';        // Panggil fungsi judul_seo untuk merubah teks dalam format tanpa spasi dan simbol


if(isset($_POST['submit']))
{
 
  $stok_baru    = mysqli_real_escape_string($koneksi, $_POST['jmlh'.$i]);
  $id_barang    = mysqli_real_escape_string($koneksi, $_POST['id'.$i]);

      // Proses insert data dari form ke db
  $sql = "UPDATE tb_barang SET id_barang     = '$id_barang',
                               jumlah        = '$jumlah'

                            WHERE id_barang   = '$id' ";

      if(mysqli_query($koneksi, $sql)) 
      {
          $query = "INSERT INTO trans_beli (id_beli,
                                            id_supplier,
                                            id_barang,
                                            jumlah,
                                            total_bayar,
                                            dibayar,
                                            tanggal)
                                    VALUES ('',
                                                    "
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('produk_kurang.php')</script>";
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