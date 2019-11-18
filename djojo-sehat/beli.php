<?php session_start();
include "config/koneksi.php";
include "faktur.php";
include "fungsi/base_url.php";
include "fungsi/cek_login_public.php";
include "fungsi/cek_session_public.php";

$id_barang = mysqli_real_escape_string($koneksi,$_GET['id_barang']);

$cari_barang  = "SELECT * FROM tb_barang WHERE id_barang = '$id' ";
$hasil_barang = mysqli_query($koneksi, $cari_barang);
$data_barang  = mysqli_fetch_array($hasil_barang);

$nama_barang  = $data_barang['nama_barang'];
$berat        = $data_barang['berat'];
$harga        = $data_barang['harga_jual'];
$stok         = $data_barang['stok'];

if(mysqli_num_rows($hasil_barang) > 0)
{
  // pengecekan stok barang
  if($stok == 0)
  {
    echo "<script>alert('Mohon maaf, stok sedang kosong');location.replace('$base_url')</script>";
  }
    else
    {
      $cari_cart   = "SELECT * FROM tb_keranjang WHERE id_member = '$sesen_id'
                          AND id_barang = '$id_produk' AND id_keranjang = '$faktur' ";
      $hasil_cart  = mysqli_query($koneksi,$cari_cart);
      $data_cart   = mysqli_fetch_array($hasil_cart);

      if(mysqli_num_rows($hasil_transaksi) == 0)
      {
        $query1 = "INSERT INTO tb_keranjang (id_keranjang,
                                                id_member,
                                                id_barang,
                                                jumlah,
                                                subtotal)
                                        VALUES ('$faktur',
                                                '$sesen_id',
                                                '$id_barang',
                                                '1',
                                                '$harga')";

        if(mysqli_query($koneksi, $query1))
        {
          header("location: $base_url"."keranjang.html");
        }
          else
          {
            echo "Error updating record: " . mysqli_error($koneksi);
          }
      }
        else
        {
          $jmllama          = $data_cart['jumlah'];
          $jmltambah        = $jmllama + 1;
          $subtotaltambah   = $jmltambah * $harga;

          $jmlberatlama     = $data_barang ['berat'];
          $jmlberattambah   = $jmlberatlama * $jmltambah;

          $query = "UPDATE transaksi_detail SET jumlah        = '$jmltambah',
                                                subtotal      = '$subtotaltambah'
                                          WHERE notransaksi   = '$faktur' AND id_barang = '$id_barang'";

          if(mysqli_query($koneksi, $query))
          {
            header("location: $base_url"."keranjang.html");
          }
            else
            {
              echo "Error updating record: " . mysqli_error($koneksi);
            }
        }
    }
}
  else
  {
    echo "<script>alert('Barang yang ingin Anda beli tidak ada');location.replace('$base_url')</script>";
  }
?>
