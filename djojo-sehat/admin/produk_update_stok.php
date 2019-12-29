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

    $ambil_data = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE id_barang = $id_barang");
    $data = mysqli_fetch_array($ambil_data);
    $stok_lama   = $data['jumlah'];
    $harga_beli  = $data['harga_beli'];
    $id_supplier = $data['id_supplier'];
    $stok_akhir  = $stok_lama + $stok_baru;
    $subtotal = $harga_beli * $stok_baru;
    $grand_total = sum($subtotal);
      // Proses insert data dari form ke db
      $query = "INSERT INTO trans_beli (id_beli,
                                        id_supplier,
                                        id_barang,
                                        jumlah,
                                        total_bayar,
                                        tanggal)
                                VALUES ('',
                                      $id_supplier,
                                      $id_barang,
                                      $stok_baru,
                                      $grand_total,
                                      date() )";

      if(mysqli_query($koneksi, $query)) 
      {
        $id_beli = $koneksi->insert_id;
        while ($row = mysqli_fetch_array($ambil_data)) {
          mysqli_query($koneksi,"INSERT INTO detail_beli (id_beli, 
                                                      id_barang, 
                                                         jumlah, 
                                                       subtotal,
                                                     id_supplier)
                                              VALUES   
                                                    ($id_beli, 
                                                    $id_barang,
                                                    $stok_baru,
                                                      $subtotal,
                                                  $id_supplier)");

        mysqli_query($koneksi,"UPDATE tb_barang SET id_barang = '$id_barang',
                                                    jumlah    = '$stok_akhir'
                                              WHERE id_barang = '$id' ");

        }
        
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