<?php session_start(); ob_start();
include 'config/koneksi.php';                     // Panggil koneksi ke database
include 'faktur_selesai.php';             // Panggil data faktur yang telah selesai
include 'fungsi/base_url.php';            // Panggil fungsi base_url
include 'fungsi/cek_session_public.php';  // Panggil fungsi cek session public
include 'fungsi/cek_login_public.php'; 		// Panggil fungsi cek login public
include 'fungsi/setting.php';             // Panggil data Nama Toko Online
include 'fungsi/tgl_indo.php';            // Panggil fungsi tanggal indonesia

$notransaksi 	 = 	$faktur_selesai;
// Membuat join query 3 tabel: transaksi, transaksi_detail dan produk
$hasil_invoice = 	mysqli_query($koneksi,"SELECT detail_jual.id_trans, detail_jual.id_member, 
                                                  detail_jual.id_barang,detail_jual.jumlah,
                                                  detail_jual.jumlah_berat, detail_jual.subtotal,
                                                  tb_barang.id_barang, tb_barang.nama_barang, tb_barang.judul,
                                                  tb_barang.harga_jual, tb_barang.berat
                                            FROM detail_jual
                                        LEFT JOIN tb_barang ON tb_barang.id_barang = detail_jual.id_barang
                                        WHERE detail_jual.id_trans = '$faktur_selesai'
                                        AND detail_jual.id_member = '$sesen_id' ");
if(mysqli_num_rows($hasil_invoice) == 0)
{die ("<script>alert('Invoice yang Anda cari tidak ditemukan');location.replace('$base_url')</script>");}
?>

<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Invoice #<?php echo $notransaksi; ?></title>
    <style type="text/css">
		.tabel2 {
		  width: 100%;
		  border-collapse: collapse;
		  border-spacing: 0;
		}
		.tabel2 tr.odd td {
		    background-color: #f9f9f9;
		}
		.tabel2 th, .tabel2 td {
	    padding: 4px 5px;
	    line-height: 20px;
	    text-align: left;
	    vertical-align: top;
	    border: 1px solid #dddddd;
		}
		</style>
  </head>
  <body>
		<table>
		  <tr>
		    <td>
		      <font style="font-size: 25px; text-align: left"><br/><b><?php echo $namatoko ?></b></font><br/>
		      <font style="font-size: 15px; text-align: left">
		        <br/><?php echo $alamat_toko ?>
		      </font>
		    </td>
		  </tr>
		</table>

		<hr/>

		<h3 align="center">NO. INVOICE: #<?php echo $notransaksi; ?></h3>

		<table class="tabel2" align="right">
		  <thead>
		    <tr>
		      <td style="text-align: center; background: #ddd"><b>No.</b></td>
		      <td style="text-align: center; background: #ddd"><b>NAMA PRODUK</b></td>
		      <td style="text-align: center; background: #ddd"><b>BERAT</b></td>
		      <td style="text-align: center; background: #ddd"><b>JUMLAH BERAT</b></td>
		      <td style="text-align: center; background: #ddd"><b>HARGA</b></td>
		      <td style="text-align: center; background: #ddd"><b>QTY</b></td>
		      <td style="text-align: center; background: #ddd"><b>SUBTOTAL</b></td>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
        $i   = 1;
        while ($data_invoice = mysqli_fetch_array($hasil_invoice))
        {
        	$harga = number_format($data_invoice['harga_jual'], 0, ',', '.');
        	$subtotal 		= number_format($data_invoice['subtotal'], 0, ',', '.')
        ?>
          <tr>
            <td style='text-align: center; width:20px'><?php echo $i ?></td>
            <td style='text-align: left; width:200px'><?php echo $data_invoice['nama_barang'] ?></td>
            <td style='text-align: center; width:50px'><?php echo $data_invoice['berat'] ?></td>
            <td style='text-align: center; width:50px'><?php echo $data_invoice['jumlah_berat'] ?></td>
            <td style='text-align: right; width:65px'><?php echo $harga.',-' ?></td>
            <td style='text-align: center; width:50px'><?php echo $data_invoice['jumlah'] ?></td>
            <td style='text-align: right; width:70px'><?php echo $subtotal.',-' ?></td>
          </tr>
        <?php $i++; } ?>
		  </tbody>
		</table>

<?php
include 'keranjang_total_berat_selesai.php';
$keranjang =  mysqli_query($koneksi," SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_barang.judul,
                                             tb_barang.berat,tb_barang.harga_jual,tb_member.id_member,
                                             tb_member.nama,tb_member.alamat,tb_member.kecamatan,
                                             tb_member.kabupaten_kota,tb_member.provinsi,tb_member.kode_pos,
                                             tb_member.no_hp,
                                             trans_jual.id_trans,trans_jual.id_member,trans_jual.status,
                                             detail_jual.jumlah,detail_jual.jumlah_berat,detail_jual.subtotal,
                                             kec.nama_kec,
                                             kabkot.nama_kabkot,kabkot.jne_reg,
                                             prov.nama_prov
                                     FROM detail_jual
                                     LEFT JOIN trans_jual ON trans_jual.id_trans = detail_jual.id_trans
                                     LEFT JOIN tb_barang ON tb_barang.id_barang  = detail_jual.id_barang
                                     LEFT JOIN tb_member ON tb_member.id_member  = trans_jual.id_member
                                     LEFT JOIN kec ON kec.id_kec = tb_member.kecamatan
                                     LEFT JOIN kabkot ON kabkot.id_kabkot = kec.id_kabkot 
                                     AND kabkot.id_kabkot = tb_member.kabupaten_kota
                                     LEFT JOIN prov ON prov.id_prov = kabkot.id_prov AND prov.id_prov = tb_member.provinsi
                                     AND trans_jual.id_member= '$sesen_id'
                                     AND trans_jual.status = 2");
$array        = mysqli_fetch_array($keranjang);
$ongkir       = $array['jne_reg'];
$nama_kota_kec= $array['nama_kabkot'].', '.$array['nama_kec'];
if(mysqli_num_rows($keranjang) > 0)
{
?>

		<table class="tabel2" align="right">
		  <thead>
		    <tr>
		      <td style="background: #ddd"></td>
		      <td style="background: #ddd"></td>
		      <td style="background: #ddd"></td>
		      <td style="background: #ddd"></td>
		    </tr>
		  </thead>
		  <tbody>
        <tr>
				  <td style='text-align: left; width:131px'><b>Ongkir Per Kg</b></td>
				  <td colspan="2" style='text-align: left; width:100px'><?php echo $nama_kota_kec ?></td>
				  <td style='text-align: right; width:70px'><?php echo number_format($ongkir, 0, ',', '.').',-' ?></td>
				</tr>
				<tr>
				  <td colspan="3" style='text-align: left; width:131px'><b>Total Berat</b></td>
				  <td style='text-align: right; width:70px'><?php echo $total_berat ?> kg</td>
				</tr>
				<tr>
				  <td style='text-align: left; width:131px'><b>Total Ongkir</b></td>
				  <td style='text-align: left; width:100px'><?php echo $total_berat_genap ?> kg x <?php echo number_format($ongkir, 0, ',', '.').',-' ?></td>
				  <td style='text-align: center; width:50px'>Rp </td>
				  <td style='text-align: right; width:70px'>
					  <?php $totalongkir = $total_berat_genap * $ongkir;
	          echo number_format($totalongkir, 0, ',', '.').',-';
	          ?>
	        </td>
				</tr>
        <tr>
				  <td colspan="2" style='text-align: left; width:131px'><b>Grand Total</b></td>
				  <td style='text-align: center; width:50px'><b>Rp</b></td>
				  <td style='text-align: right; width:70px'><b>
				  	<?php
	          $query        = "SELECT sum(subtotal) AS subtotal FROM detail_jual
                                INNER JOIN tb_barang ON tb_barang.id_barang = detail_jual.id_barang
                                INNER JOIN trans_jual ON trans_jual.id_trans = detail_jual.id_trans
                                WHERE detail_jual.id_trans = '$faktur_selesai'
                                AND detail_jual.id_member = '$sesen_id'
                                AND trans_jual.status = 2  ";
	          $hasil        = mysqli_query($koneksi,$query);
	          $data         = mysqli_fetch_assoc($hasil);
	          $subtotal     = $data['subtotal'];
	          $grand_total  = $totalongkir + $subtotal;
	          echo number_format($grand_total, 0, ',', '.').',-';
	          ?></b>
				  </td>
				</tr>
		  </tbody>
		</table>

		<hr/>

		<?php } ?>

		<p>Total biaya yang harus Anda bayar adalah sebesar <strong>Rp <?php echo number_format($grand_total, 0, ',', '.').',-'; ?></strong></p>
		<p>Apabila telah melakukan pembayaran, mohon konfirmasi ke halaman berikut: <a href="<?php echo $base_url.'konfirmasi.html' ?>">klik disini</a></p>
		<hr/>
		<p>Pembayaran ditujukan ke rekening kami di bawah ini: </p>
		<p><?php echo $bank ?></p>
		<hr/>
		<p>Setelah proses verifikasi pembayaran Anda selesai, maka kami akan mengirimkan barang ke:<br/>
		<?php
		  echo "<b>Atas Nama</b>: $array[nama]<br/>
		        <b>No. HP</b>: $array[no_hp]<br/>
		        <b>Alamat</b>: $array[alamat], $array[nama_kec], $array[nama_kabkot], $array[nama_prov], $array[kode_pos]";
		?>
		</p>
		<hr/>
		<p align="center"><b>Terima Kasih telah berbelanja bersama kami, <?php echo $namatoko ?></b></p>
		<hr/>
	</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->

<?php
// ob_get_clean = salah 1 fungsi dalam PHP
$content = ob_get_clean();
// Memanggil class HTML2PDF dari direktori html2pdf pada project kita
include 'html2pdf/html2pdf.class.php';
try
{
  // Mengatur invoice dalam format HTML2PDF
  // Keterangan: L = Landscape/ P = Portrait, A4 = ukuran kertas, en = bahasa, false = kode HTML2PDF, UTF-8 = metode pengkodean karakter
  $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(10, 5, 10, 0));
  // Mengatur invoice dalam posisi full page
  $html2pdf->pdf->SetDisplayMode('fullpage');
  // Menuliskan bagian content menjadi format HTML
  $html2pdf->writeHTML($content);
  // Mencetak nama file invoice
  $html2pdf->Output('invoice.pdf');
}
// Kodingan HTML2PDF
catch(HTML2PDF_exception $e)
{
  echo $e;
  exit;
}
?>
