<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';                         // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_aksi_hapus.php';        	// Panggil fungsi boleh hapus data atau tidak
//ambil ID transaksi dari form tabel
$no_id   = mysqli_real_escape_string($koneksi, $_GET['id_trans']);
//melakukan update status transaksi menjadi DITOLAK bedasarkan ID Transaksi
$sql = "UPDATE trans_jual SET status=1 where id_trans='$no_id' ";
if (mysqli_query($koneksi, $sql)) 
{
  
  $cek =mysqli_query($koneksi, "SELECT * FROM detail_jual where id_trans='$no_id'");


  while($row = mysqli_fetch_array($cek)){
    $id_barang= $row['id_barang'];
      $cek_stok =mysqli_query($koneksi, "SELECT * FROM tb_barang Where id_barang='$id_barang'");
      $hasil = mysqli_fetch_array($cek_stok);
      $stok = $hasil['jumlah'];

      $jumlah_asal = $stok + $row['jumlah'];

      $query2 = $query2 = "UPDATE tb_barang SET jumlah ='$jumlah_asal' WHERE id_barang = '$id_barang'";

      //Kurangi Stok pada tabel barang, bedasarkan id barang di keranjang
      mysqli_query($koneksi, $query2);
  }
      echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('pesanan.php')</script>"; 

  
}
  else 
  {
      echo "Error updating record: " . mysqli_error($koneksi);
  }
?>