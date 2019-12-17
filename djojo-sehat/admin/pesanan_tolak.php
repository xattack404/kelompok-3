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
  //membuat fungsi cek data pada tabel detail jual bedasar ID TRANS
  $cek =mysqli_query($koneksi, "SELECT * FROM detail_jual where id_trans='$no_id'");
  //mengaktifkan perulangan WHILE untuk mengambil semua data di tabel secara berulang kali
  while($row = mysqli_fetch_array($cek)){
    $id_barang= $row['id_barang'];
  //membuat fungsi cek data tb barang bedasar ID barang yang ada di tabel detail jual
      $cek_stok =mysqli_query($koneksi, "SELECT * FROM tb_barang Where id_barang='$id_barang'");
      $hasil = mysqli_fetch_array($cek_stok);
      $stok = $hasil['jumlah'];
  //fungsi mengembalikan stok ke awal karena batal transaksi
      $jumlah_asal = $stok + $row['jumlah'];
 //fungsi perbarui stok lama dengan yang baru
      $query2 = $query2 = "UPDATE tb_barang SET jumlah ='$jumlah_asal' WHERE id_barang = '$id_barang'";

      mysqli_query($koneksi, $query2);
  }
      echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('pesanan.php')</script>"; 

  
}
  else 
  {
      echo "Error updating record: " . mysqli_error($koneksi);
  }
?>