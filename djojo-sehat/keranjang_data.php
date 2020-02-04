<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					
	<form method="post" id="form1" action="keranjang_update.php">
<div id="no-more-tables">

		<?php
		// Panggil data faktur
		include 'faktur.php';
		// Membuat join query 2 tabel: transaksi, transaksi_detail dan produk
		$cek_keranjang = 	mysqli_query($koneksi,"SELECT tb_keranjang.id_keranjang, tb_keranjang.id_member, tb_keranjang.id_barang,
													  tb_keranjang.jumlah,tb_keranjang.jumlah_berat, tb_keranjang.subtotal,tb_barang.id_barang, tb_barang.nama_barang, tb_barang.judul,tb_barang.foto_barang,tb_barang.harga_jual, tb_barang.berat
													FROM tb_keranjang
													LEFT JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang
													WHERE tb_keranjang.id_member = '$sesen_id'");

		if(mysqli_num_rows($cek_keranjang) == 0)
		{echo "<center><h4>Keranjang belanja anda masih kosong</h4></center>";}

		else
		{
			echo "
			<table class='table'>
				<thead class='thead-primary'>
					<tr class='text-center'>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
					  <th>Nama Product</th>
					  <th>Harga</th>
					  <th>Berat</th>
					  <th>Qty</th>
					  <th>Aksi</th>
					</tr>
				</thead>";
			$i = 1;

			while ($data_keranjang = mysqli_fetch_array($cek_keranjang))
			{
				$harga 			= number_format($data_keranjang['harga_jual'], 0, ',', '.');
				$subtotal 		= number_format($data_keranjang['subtotal'], 0, ',', '.');

				echo "
				<tbody>
					<tr class='text-center'>
					<td class='product-remove' data-title='Aksi'><a href='keranjang_hapus.php?id=$data_keranjang[id_keranjang]'OnClick=\"return confirm('Apakah Anda yakin?');\"><span class='ion-ios-close'></span><button name='hapus' type='button' class='btn btn-primary py-3 px-4' aria-label='Left Align' title='Hapus' hidden></button></a></td>
					<td class='image-prod'>
					<img class='img' src='$base_url"."images/produk/"."$data_keranjang[foto_barang]'>
					</td>
			    	<td class='product-name' data-title='Nama Produk' align='left'><a href='$base_url"."produk/$data_keranjang[judul].html'>$data_keranjang[nama_barang]</a></td>
				    <td data-title='Harga ' class='price' align='right'>$harga,-</td>
				    <td data-title='Berat' class='quantity' align='center'>$data_keranjang[berat]</td>
				    <td data-title='Qty' class='quantity' align='center'>
				    <div class='input-group mb-3'>
				      <input type='hidden' name='id".$i."' value='$data_keranjang[id_barang]'/>
				      <input type='text' class='quantity form-control input-number' name='jmlh".$i."' value='$data_keranjang[jumlah]' size='3' onkeypress='return isNumberKey(event)'/></div>
				    </td>
				    <td data-title='Aksi' class ='product-remove' align='center'>
				      <a href='keranjang_update.php?id=$data_keranjang[id_barang]' alt='Update'><span class='ion-ios-disc'></span>
				      	<button name='update' alt='update' hidden type='submit' class='btn btn-warning' aria-label='Left Align' title='Update'>
								  
								</button>
				      </a>
				    </td>
				  </tr>";
				$i++;
			}
			$no = $i-1;
		}
		?>
		<input type="hidden" name="n" value="<?php echo $no ?>" />
	</table>
</div>


	<?php
	include 'keranjang_total_berat.php';
	$keranjang = 	mysqli_query($koneksi,"SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_barang.judul,
				  tb_barang.berat,tb_barang.harga_jual,tb_member.id_member,tb_member.nama,tb_alamat.alamat,
				  tb_alamat.kecamatan,tb_alamat.kabupaten_kota,tb_alamat.provinsi,tb_alamat.kode_pos,tb_alamat.no_hp,
				  tb_keranjang.id_keranjang, tb_keranjang.id_member, tb_keranjang.id_barang,
				  tb_keranjang.jumlah, tb_keranjang.subtotal,
				  kec.nama_kec,kabkot.nama_kabkot,kabkot.jne_reg,prov.nama_prov
	              FROM tb_keranjang
	              LEFT JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang
	              LEFT JOIN tb_member ON tb_member.id_member = tb_keranjang.id_member
				  LEFT JOIN tb_alamat ON tb_alamat.id_member = tb_member.id_member
	              LEFT JOIN kec ON kec.id_kec = tb_alamat.kecamatan
	              LEFT JOIN kabkot ON kabkot.id_kabkot = kec.id_kabkot AND kabkot.id_kabkot = tb_alamat.kabupaten_kota
	              LEFT JOIN prov ON prov.id_prov = kabkot.id_prov AND prov.id_prov = tb_alamat.provinsi
	              WHERE tb_keranjang.id_keranjang = '$faktur'
	                AND tb_keranjang.id_member = '$sesen_id' ");
	$array        = mysqli_fetch_array($keranjang);
	$ongkir       = $array['jne_reg'];
	$nama_kota_kec= $array['nama_kabkot'].', '.$array['nama_kec'];
	//$ongkir 		= number_format($array['jne_reg'], 0, ',', '.');
	if(mysqli_num_rows($keranjang) > 0)
	{
		$totalongkir = $total_berat_genap * $ongkir;
	?>

<div class="row justify-content-start">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Total</h3>
    					<p class="d-flex">
    						<span>Ongkos Kirim</span>
    						<span>Rp.<?= number_format($ongkir, 0, ',', '.').',-' ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Alamat</span>
    						<span><?php echo $nama_kota_kec ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Total Berat</span>
    						<span><?= $total_berat ?> kg</span>
    					</p>
						<p class="d-flex">
    						<span>Total Ongkir</span>
    						<span>Rp.<?= number_format($totalongkir, 0, ',', '.').',-'; ?></span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rp.
		      	<?php
		      	$query 				= "SELECT sum(subtotal) AS subtotal FROM tb_keranjang
														INNER JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang
														WHERE tb_keranjang.id_member = '$sesen_id'";
						$hasil 				= mysqli_query($koneksi,$query);
						$data 				= mysqli_fetch_assoc($hasil);
						$subtotal 		= $data['subtotal'];
						$grand_total 	= $totalongkir + $subtotal;
		      	echo number_format($grand_total, 0, ',', '.').',-';
		      	?></span>
    					</p>
    				</div>
    			</div>
    				<p style="margin-top:250px;margin-left: 20px" class="text-center">
    					<a href="keranjang_hapus_all.php">
				<button name="hapus" type="button" class="btn btn-primary py-3 px-4" aria-label="Left Align" title="Kosongkan Keranjang Belanja" OnClick="return confirm('Apakah Anda yakin?');">
				  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Kosongkan Keranjang Belanja
				</button>
			</a>
				<a href="./katalog.html">
				<button name="hapus" type="button" class="btn btn-primary py-3 px-4" aria-label="Left Align" title="Lanjut Belanja">
				  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Lanjut Belanja
				</button>
			</a>
			<?php
			if(mysqli_num_rows($keranjang) > 0)
			{
				echo "
				<a href='checkout.php'>
					<button name='selesaikan' type='button' class='btn btn-primary py-3 px-4' aria-label='Left Align' title='Selesaikan Belanja' OnClick=\"return confirm('Apakah Anda yakin?');\">
					  <span class='glyphicon glyphicon-check' aria-hidden='true'></span> Selesaikan Belanja
					</button>
				</a>";
			}
			?>
		</p>
    		</div>
			</div>
		  </tbody>
	 	</table>
	</form>

	 <!-- 	<p>
	 		
			
			<button name='Ganti Alamat' id="ganti_alamat" type='button' class='btn btn-warning' data-toggle="" data-target="#				" aria-label='Left Align' title='Ganti Alamat'>
								  <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>Ganti Alamat
								</button>
		</p>
		<hr/> -->

		<p><strong>CATATAN</strong></p>
		<p>* Total berat akan dibulatkan ke atas dikarenakan sesuai dengan peraturan JNE</p>

	<?php } ?>

				</div>
			</div>
		</div>
	</div>
</section>
	