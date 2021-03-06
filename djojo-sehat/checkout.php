<?php session_start();                                      // Memulai session
include 'config/koneksi.php';                                       // Memanggil koneksi ke database
include 'faktur.php';                                       // Memanggil faktur
include 'fungsi/base_url.php';                      // Memanggil fungsi base_url
include 'fungsi/cek_session_public.php';    // Memanggil fungsi cek_session_public
include 'fungsi/cek_login_public.php';      // Memanggil fungsi cek_login_public
include 'keranjang_total_berat.php';
 
// Cek keranjang berdasarkan sesen dan id keranjang
$cek_barang     = mysqli_query($koneksi,"SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_barang.judul, 
                                                tb_barang.jumlah as stok,
                                                tb_barang.berat,tb_barang.harga_jual,tb_member.id_member,
                                                tb_member.nama,tb_alamat.alamat,tb_alamat.kecamatan,
                                                tb_alamat.kabupaten_kota,tb_alamat.provinsi,
                                                tb_alamat.kode_pos,tb_alamat.no_hp,tb_keranjang.id_keranjang,
                                                tb_keranjang.id_member, tb_keranjang.id_barang,
                                                tb_keranjang.jumlah, tb_keranjang.subtotal,kec.nama_kec,
                                                kabkot.nama_kabkot
                                                ,kabkot.jne_reg,prov.nama_prov
                            FROM tb_keranjang
                            LEFT JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang
                            LEFT JOIN tb_member ON tb_member.id_member = tb_keranjang.id_member
                            LEFT JOIN tb_alamat ON tb_alamat.id_member = tb_member.id_member
                            LEFT JOIN kec ON kec.id_kec = tb_alamat.kecamatan
                            LEFT JOIN kabkot ON kabkot.id_kabkot = kec.id_kabkot AND kabkot.id_kabkot = tb_alamat.kabupaten_kota
                            LEFT JOIN prov ON prov.id_prov = kabkot.id_prov AND prov.id_prov = tb_alamat.provinsi
                        WHERE  tb_keranjang.id_member = '$sesen_id'");
   
 //mengambil data yang di perlukan kedalam Variable
$data_barang    = mysqli_fetch_array($cek_barang);
$id             =   $data_barang['id_barang'];
$jmlh           =   $data_barang['jumlah'];
$stok           =   $data_barang['stok'];
$ongkir         =   $data_barang['jne_reg'];
$totalongkir    =   $total_berat_genap * $ongkir;

 
//memnentukan total harga barang dan ongkir
 
$sub_query      = "SELECT sum(subtotal) AS subtotal FROM tb_keranjang
                   INNER JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang
                   WHERE tb_keranjang.id_member = '$sesen_id'";
                        $hasil              = mysqli_query($koneksi,$sub_query);
                        $data               = mysqli_fetch_assoc($hasil);
                        $subtotal       = $data['subtotal'];
                        $grand_total    = $totalongkir + $subtotal;
 
// Jika tidak ditemukan maka akan kembali ke halaman awal
if(mysqli_num_rows($cek_barang) == 0)
{
    header("location:keranjang.html");
   
}  
// Input data ke transaksi bedaasar id user
     else
     {
        // Proses Input
        $query = "INSERT INTO trans_jual (id_trans,
                                          id_member,
                                          id_pengiriman,
                                          id_barang,
                                          jumlah,
                                          berat,
                                          total_bayar,
                                          bukti_bayar,
                                          tanggal,
                                          status)
                                VALUES   ('',
                                          '$sesen_id',
                                           '1',
                                           '$id',
                                           '$jmlh',
                                           '$total_berat_genap',
                                           '$grand_total',
                                           '',
                                           now(),
                                           '2' ) ";
 
        // Jika berhasil, maka akan Masukan data ke detail jual
        if(mysqli_query($koneksi,$query))
       {
        //metode INSERT_ID digunakan untuk menagkap id yang sama karena tabel terelasi dengan tbl lain
        $id_trans = $koneksi->insert_id;
        $cek_cart =mysqli_query($koneksi, "SELECT * FROM tb_keranjang where id_member='$sesen_id'");
       
        while($row = mysqli_fetch_array($cek_cart)){
            $id_barang= $row['id_barang'];
            $id_member = $sesen_id;
            $jumlah = $row['jumlah'];
            $subtotal = $row['subtotal'];
            $berat = $row['jumlah_berat'];
            $kurangi_stok   =   $stok - $jumlah;
            $query2 = "INSERT INTO detail_jual (id_trans,
                                                id_barang,
                                                id_member,
                                                jumlah,
                                                jumlah_berat,
                                                subtotal)
                                    VALUES      ('$id_trans',
                                                '$id_barang',
                                                '$id_member',
                                                '$jumlah',
                                                '$berat',
                                                '$subtotal' )";

            //Kurangi Stok pada tabel barang, bedasarkan id barang di keranjang
            mysqli_query($koneksi, $query2);
            $query3 = "UPDATE tb_barang SET jumlah ='$kurangi_stok' WHERE id_barang = '$id_barang' ";
            mysqli_query($koneksi, $query3);
        }
	  }
     }
	 		
     $hapus_cart  = "DELETE FROM tb_keranjang WHERE id_member = '$sesen_id' ";

       if(mysqli_query($koneksi,$hapus_cart))
     {
        header("location: $base_url"."transaksi_selesai.html"); 
     }
	// Jika gagal, maka akan muncul alert
	else
	{
		echo "<script>alert('Mohon maaf, Transaksi gagal. Mohon ulangi kembali');location.replace('keranjang.html')</script>";
	}
     
?>