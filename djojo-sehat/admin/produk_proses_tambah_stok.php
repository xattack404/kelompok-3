<?php 
session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';

if (isset($_POST['tambah'])) {
	$supplier = mysqli_real_escape_string($koneksi, $_POST['supplier']);
	 $tanggal = date('Y/m/d');
	$grandtotal = mysqli_real_escape_string($koneksi,$_POST['total_harga']);
	$total_jumlah = mysqli_real_escape_string($koneksi,$_POST['total_jumlah']);

	// var_dump($grandtotal, $total_jumlah, $supplier);
	 $query = "INSERT INTO trans_beli (id_beli,
                                        id_supplier,
                                        jumlah,
                                        total_bayar,
                                        tanggal)
                                VALUES ('',
                                      '$supplier',
                                      '$total_jumlah',
                                      '$grandtotal',
                                      '$tanggal')";
    if(mysqli_query($koneksi, $query)) {
       	$id_beli = $koneksi->insert_id;

		$total = $_POST['total'];
		// var_dump($total);

		for ($i=0; $i <$total ; $i++) {
			$id_barang = $_POST['id'][$i];
			$stok_baru = $_POST['jumlah'][$i];
			// untuk ambil stok lama 
			$ambil_data = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE id_barang = '$id_barang'");
		    $data = mysqli_fetch_array($ambil_data);
		    $stok_lama   = $data['jumlah'];
		    $stok_akhir  = $stok_lama + $stok_baru;
		    $harga_lama = $data['harga_beli'];
		    
			$harga_beli = $_POST['harga_beli'][$i];
			$subtotal = $_POST['sub_total'][$i];
			$sql = mysqli_query($koneksi, "INSERT INTO detail_beli (id_beli, id_barang, harga_beli, jumlah, subtotal) VALUES ('$id_beli', '$id_barang', '$harga_beli', '$stok_baru', '$subtotal')") or die(mysqli_query($koneksi));
			if ($harga_beli != $harga_lama) {
				mysqli_query($koneksi,"UPDATE tb_barang SET jumlah = '$stok_akhir', harga_beli='$harga_beli' WHERE id_barang = '$id_barang' ");
			}else{
			mysqli_query($koneksi,"UPDATE tb_barang SET jumlah = '$stok_akhir' WHERE id_barang = '$id_barang' ");
			}
			
		}
		if ($sql) {
			echo "<script>alert('".$total." produk berhasil menambahkan stok.');window.location='produk_kurang.php';</script>";
		}else{
			echo "<script>alert( 'data gagl ditambahkan ditambahkan. Coba lagi!');</script>";
		}
}else{
	echo "<script>alert( 'data gagl ditambahkan ditambahkan. Coba lagi!');history.go(-1);</script>";
}
}

?>