<?php session_start();                                      // Memulai session
include 'config/koneksi.php';                                       // Memanggil koneksi ke database
include 'faktur.php';                                       // Memanggil faktur
include 'fungsi/base_url.php';                      // Memanggil fungsi base_url
include 'fungsi/cek_session_public.php';    // Memanggil fungsi cek_session_public
include 'fungsi/cek_login_public.php';      // Memanggil fungsi cek_login_public
include 'keranjang_total_berat.php';
 
// Cek keranjang berdasarkan sesen dan id keranjang
$cek_barang     = mysqli_query($koneksi,"SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_barang.judul,
                                                tb_barang.berat,tb_barang.harga_jual,tb_member.id_member,
                                                tb_member.nama,tb_member.alamat,tb_member.kecamatan,
                                                tb_member.kabupaten_kota,tb_member.provinsi,
                                                tb_member.kode_pos,tb_member.no_hp,tb_keranjang.id_keranjang,
                                                tb_keranjang.id_member, tb_keranjang.id_barang,
                                                tb_keranjang.jumlah, tb_keranjang.subtotal,kec.nama_kec,
                                                kabkot.nama_kabkot,kabkot.jne_reg,prov.nama_prov
                            FROM tb_keranjang
                            LEFT JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang
                            LEFT JOIN tb_member ON tb_member.id_member = tb_keranjang.id_member
                            LEFT JOIN kec ON kec.id_kec = tb_member.kecamatan
                            LEFT JOIN kabkot ON kabkot.id_kabkot = kec.id_kabkot AND kabkot.id_kabkot = tb_member.kabupaten_kota
                            LEFT JOIN prov ON prov.id_prov = kabkot.id_prov AND prov.id_prov = tb_member.provinsi
                        WHERE  tb_keranjang.id_member = '$sesen_id'");
   
 
$data_barang    = mysqli_fetch_array($cek_barang);
$id             =   $data_barang['id_barang'];
$jmlh           =   $data_barang['jumlah'];
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
 
// Jika tidak ditemukan maka akan muncul alert/ pemberitahuan
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
                                           '1' ) ";
 
        // Jika berhasil, maka akan diarahkan ke halaman transaksi selesai
        if(mysqli_query($koneksi,$query))
       {
        $id_trans = $koneksi->insert_id;
        $cek_cart =mysqli_query($koneksi, "SELECT * FROM tb_keranjang where id_member='$sesen_id'");
       
        while($row = mysqli_fetch_array($cek_cart)){
            $id_barang= $row['id_barang'];
            $jumlah = $row['jumlah'];
            $subtotal = $row['subtotal'];
            $query2 = "INSERT INTO detail_jual (id_trans,
                                                id_barang,
                                                jumlah,
                                                subtotal)
                                    VALUES      ('$id_trans',
                                                '$id_barang',
                                                '$jumlah',
                                                '$subtotal' )";
            mysqli_query($koneksi, $query2);
        }
	  }
     }
	 		
          $query3 = "UPDATE tb_barang SET jumlah = WHERE id_member = '$sesen_id' ";
       if(mysqli_query($koneksi,$query3))
      {
          echo "<script>alert('Mohon maaf, Transaksi gagal. Mohon ulangi kembali');location.replace('keranjang.html')</script>";
 
      }
    //      // Jika gagal, maka akan muncul alert
    //      else
    //      {
    //          echo "<script>alert('Mohon maaf, Transaksi gagal. Mohon ulangi kembali');location.replace('keranjang.html')</script>";
    //      }
    // }
?>