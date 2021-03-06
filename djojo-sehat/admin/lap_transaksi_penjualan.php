<?php
session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include 'cek_session.php'; 
require('template/pdf/fpdf.php');

if (isset($_POST['tampilkan'])) {
	$cek = $_POST['cek'];
	$tgl_awal = $_POST['tgl_awal'];
	$tgl_akhir = $_POST['tgl_akhir'];
	// var_dump($tgl_awal);

	if ($cek == 1) {
		$query1= "SELECT  tb_member.nama, trans_jual.id_trans, trans_jual.tanggal, detail_jual.jumlah, detail_jual.subtotal, detail_jual.id_barang, detail_jual.jumlah_berat, tb_pengiriman.metode_pengiriman FROM trans_jual  LEFT JOIN detail_jual on detail_jual.id_trans = trans_jual.id_trans  LEFT JOIN tb_member on tb_member.id_member = trans_jual.id_member LEFT JOIN tb_pengiriman on tb_pengiriman.id_pengiriman = trans_jual.id_pengiriman";
		$total = "SELECT sum(subtotal) as subtotal, sum(jumlah_berat) as berat, sum(jumlah) as jumlahe FROM detail_jual";
		// $query2 = "SELECT tb_member.nama_toko, trans_jual.id_trans, trans_jual.tanggal FROM trans_jual LEFT JOIN tb_member on tb_member.id_member = trans_jual.member WHERE id_trans ='$id_trans";
	}
	if($cek==2){
		$query1= "SELECT  tb_member.nama, trans_jual.id_trans, trans_jual.tanggal, detail_jual.jumlah, detail_jual.subtotal, detail_jual.id_barang, detail_jual.jumlah_berat, tb_pengiriman.metode_pengiriman FROM trans_jual  LEFT JOIN detail_jual on detail_jual.id_trans = trans_jual.id_trans  LEFT JOIN tb_member on tb_member.id_member = trans_jual.id_member LEFT JOIN tb_pengiriman on tb_pengiriman.id_pengiriman = trans_jual.id_pengiriman WHERE tanggal>='$tgl_awal' AND tanggal <='$tgl_akhir'";
		$total = "SELECT sum(subtotal) as subtotal, sum(jumlah_berat) as berat, sum(detail_jual.jumlah) as jumlahe FROM detail_jual INNER JOIN trans_jual ON trans_jual.id_trans = detail_jual.id_trans WHERE trans_jual.tanggal>='$tgl_awal' AND trans_jual.tanggal <='$tgl_akhir' ORDER BY tanggal asc";
	}
}


$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);

$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Djojo-store',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 082331833848',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : djojo-store.localhost.com email : djojo-store@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Transaksi Penjualan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'No Faktur', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Nama member', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Jumlah', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'harga', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Berat', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Harga Total', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Metode Pengiriman', 1, 1, 'C');	

$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($koneksi, $query1);
$totale = mysqli_query($koneksi, $total);
$hasil = mysqli_fetch_array($totale);
while($lihat=mysqli_fetch_array($query)){
	$id_barang = $lihat['id_barang'];
	$sala = "SELECT * FROM tb_barang WHERE id_barang='$id_barang' ";
	$sele = mysqli_query($koneksi, $sala);
	$hasilnya = mysqli_fetch_array($sele);
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['tanggal'] , 1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['id_trans'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['nama'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $hasilnya['nama_barang'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['jumlah'], 1, 0,'C');
	$pdf->Cell(3, 0.8, "Rp. ".number_format($hasilnya['harga_jual']).",-", 1, 0, 'R');
	$pdf->Cell(2, 0.8, $lihat['jumlah_berat'], 1, 0,'R');
	$pdf->Cell(3, 0.8, "Rp. ".number_format($lihat['subtotal']).",-", 1, 0,'R');
	$pdf->Cell(4, 0.8, $lihat['metode_pengiriman'], 1, 1,'R');

	$no++;
}
$pdf->SetFont('Arial','B',10);
$pdf->Cell(13, 0.8, "TOTAL", 1, 0,'R');
$pdf->Cell(2, 0.8, $hasil['jumlahe'], 1, 0,'R');
$pdf->Cell(5, 0.8, $hasil['berat'], 1, 0,'R');
$pdf->Cell(3, 0.8, "Rp. ".number_format($hasil['subtotal']).",-",1, 1,'R');

# footer
$pdf->Ln();$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->SetX(19.5);
$pdf->MultiCell(19,0.5,"Bondowoso".date('d/M/Y')."",0,'L');
$pdf->SetX(19.5);
$pdf->MultiCell(19,0.5, '',0,'C');
$pdf->SetX(19.5);
$pdf->MultiCell(19,0.5, '',0,'C');
$pdf->SetX(19.5);
$pdf->MultiCell(19,0.5, '',0,'L');
$pdf->SetX(19.5);
$pdf->MultiCell(19,0.5, '_________________________',0,'L');
$pdf->SetX(19.5);
$pdf->MultiCell(19,0.5, 'N0 : ',0,'L');
$pdf->Output("laporan_transaksi_penjualan".date("Y-m-d").".pdf","I");

?>

