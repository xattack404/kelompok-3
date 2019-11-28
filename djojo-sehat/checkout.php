<?php session_start(); 										// Memulai session
include 'config/koneksi.php'; 										// Memanggil koneksi ke database
include 'faktur.php'; 										// Memanggil faktur
include 'fungsi/base_url.php';  					// Memanggil fungsi base_url
include 'fungsi/cek_session_public.php'; 	// Memanggil fungsi cek_session_public
include 'fungsi/cek_login_public.php';  	// Memanggil fungsi cek_login_public

// Cek keranjang berdasarkan sesen dan id keranjang
$cek_faktur 	= mysqli_query($koneksi,"SELECT * FROM tb_keranjang WHERE id_keranjang ='$faktur' AND id_member = '$sesen_id'");
// Jika tidak ditemukan maka akan muncul alert/ pemberitahuan
if(mysqli_num_rows($cek_faktur) == 0)
{
	header("location:keranjang.html");
}
	
	// Input data ke transaksi bedaasar id user
	else
	{
		// Proses update
		$query = "INSERT INTO trans_jual ";
		// Jika berhasil, maka akan diarahkan ke halaman transaksi selesai
		if(mysqli_query($koneksi,$query)) 
	  {
	  	header("location:$base_url"."trns.html");
	  }
	  	// Jika gagal, maka akan muncul alert
	  	else 
	  	{
	  		echo "<script>alert('Mohon maaf, Transaksi gagal. Mohon ulangi kembali');location.replace('keranjang.html')</script>";
	  	} 
	}
?>