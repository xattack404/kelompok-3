<?php session_start();
include "config/koneksi.php";
include "faktur.php";
include "fungsi/base_url.php";
include "fungsi/cek_session_public.php";
include "fungsi/cek_login_public.php";

//mengambil data barang bedasarkan ID member yang login
$cek    = "SELECT * FROM tb_keranjang WHERE id_member = '$sesen_id' ";
$hasil  = mysqli_query($koneksi,$cek);
$data   = mysqli_fetch_array($hasil);
$n      = $_POST['n'];

//fungsi takan berjalan ketika menekan tombol update pada form
if(isset($_POST['update']))
{
  if(mysqli_num_rows($hasil) == 0)
  {
    echo "<script>alert('Transaksi tidak ditemukan');location.replace('$base_url')</script>";
  }
    $faktur = $data['id_keranjang'];

    for ($i=1; $i<=$n; $i++)
    {

      $id_barang  = $_POST['id'.$i];
      //mengambil data barang bedasarkan id barang
      $cari2        = "SELECT * FROM tb_barang WHERE id_barang = '$id_barang' ";
      $hasil2       = mysqli_query($koneksi,$cari2);
      $data2        = mysqli_fetch_array($hasil2);

      $harga = $data2['harga_jual'];
      $stok         = $data2['jumlah'];
      //apabila data hasil pengecekan dari database lebih besar dari 0 atau data ada
      if(mysqli_num_rows($hasil2) > 0)
      {
        //maka hitung berat baru dan subtotal ubah setiap barang
        $jmlubah  = $_POST['jmlh'.$i];
        $beratnew = $jmlubah * $data2['berat'];
        $totubah  = $jmlubah * $harga;
        
   //apabila jumlah ubah lebih besar/kecil dari pada data jumlah yang ada di TBkeranjang maka update
        if($jmlubah != $data['jumlah'])
        {
          
          //$id = $_GET['id'];
            $query = "UPDATE tb_keranjang SET jumlah            = '$jmlubah',
                                              berat             = '$beratnew',
                                              subtotal          = '$totubah'
                                            WHERE   id_member   = '$sesen_id'
                                            AND   id_barang     = '$id_barang'";

            if(mysqli_query($koneksi, $query))
            {
              header("location:keranjang.html");
            }
            else
            {
              echo "Error updating record: " . mysqli_error($koneksi);
            }
          }
      }
        else
        {
          echo "<script>alert('Barang yang ingin Anda beli tidak ditemukan');location.replace('index.html')</script>";
        }
    }
}
  else
  {
    echo "<script>alert('Gak boleh tembak langsung ya!');location.replace('keranjang.html')</script>";
  }
?>
