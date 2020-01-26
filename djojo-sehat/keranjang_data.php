<div id="no-more-tables">
	<form method="post" id="form1" action="keranjang_update.php">

		<?php
		// Panggil data faktur
		include 'faktur.php';
		// Membuat join query 2 tabel: transaksi, transaksi_detail dan produk
		$cek_keranjang = 	mysqli_query($koneksi,"SELECT tb_keranjang.id_keranjang, tb_keranjang.id_member, tb_keranjang.id_barang,
													  tb_keranjang.jumlah,tb_keranjang.jumlah_berat, tb_keranjang.subtotal,
													  tb_barang.id_barang, tb_barang.nama_barang, tb_barang.judul,
													  tb_barang.harga_jual, tb_barang.berat
													FROM tb_keranjang
													LEFT JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang
													WHERE tb_keranjang.id_member = '$sesen_id'");

		if(mysqli_num_rows($cek_keranjang) == 0)
		{echo "<center><h4>Keranjang belanja anda masih kosong</h4></center>";}

		else
		{
			echo "
			<table class='col-md-12 table-bordered table-striped table-condensed cf'>
				<thead class='cf'>
					<tr>
					  <th>No.</th>
					  <th>Nama Produk</th>
					  <th>Harga</th>
					  <th>Berat</th>
					  <th>Qty</th>
					  <th>Aksi</th>
					  <th>Sub Total</th>
					</tr>
				</thead>";
			$i = 1;

			while ($data_keranjang = mysqli_fetch_array($cek_keranjang))
			{
				$harga 			= number_format($data_keranjang['harga_jual'], 0, ',', '.');
				$subtotal 		= number_format($data_keranjang['subtotal'], 0, ',', '.');

				echo "
				<tbody>
					<tr>
						<td data-title='No.' align='center'>$i</td>
			    	<td data-title='Nama Produk' align='left'><a href='$base_url"."produk/$data_keranjang[judul].html'>$data_keranjang[nama_barang]</a></td>
				    <td data-title='Harga ' align='right'>$harga,-</td>
				    <td data-title='Berat' align='center'>$data_keranjang[berat]</td>
				    <td data-title='Qty' align='center'>
				      <input type='hidden' name='id".$i."' value='$data_keranjang[id_barang]'/>
				      <input type='text' name='jmlh".$i."' value='$data_keranjang[jumlah]' size='3' onkeypress='return isNumberKey(event)'/>
				    </td>
				    <td data-title='Aksi' align='center'>
				      <a href='keranjang_update.php?id=$data_keranjang[id_barang]'>
				      	<button name='update' type='submit' class='btn btn-warning' aria-label='Left Align' title='Update'>
								  <span class='glyphicon glyphicon-refresh' aria-hidden='true'></span>
								</button>
				      </a>
				      <a href='keranjang_hapus.php?id=$data_keranjang[id_keranjang]'>
				      	<button name='hapus' type='button' class='btn btn-danger' aria-label='Left Align' title='Hapus' OnClick=\"return confirm('Apakah Anda yakin?');\">
								  <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
								</button>
				      </a>
				    </td>
				    <td data-title='Sub Total' align='right'>$subtotal,-</td>
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
				  tb_barang.berat,tb_barang.harga_jual,tb_member.id_member,tb_member.nama,tb_member.alamat,
				  tb_member.kecamatan,tb_member.kabupaten_kota,tb_member.provinsi,tb_member.kode_pos,tb_member.no_hp,
				  tb_keranjang.id_keranjang, tb_keranjang.id_member, tb_keranjang.id_barang,
				  tb_keranjang.jumlah, tb_keranjang.subtotal,
				  kec.nama_kec,kabkot.nama_kabkot,kabkot.jne_reg,prov.nama_prov
	              FROM tb_keranjang
	              LEFT JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang
	              LEFT JOIN tb_member ON tb_member.id_member = tb_keranjang.id_member
	              LEFT JOIN kec ON kec.id_kec = tb_member.kecamatan
	              LEFT JOIN kabkot ON kabkot.id_kabkot = kec.id_kabkot AND kabkot.id_kabkot = tb_member.kabupaten_kota
	              LEFT JOIN prov ON prov.id_prov = kabkot.id_prov AND prov.id_prov = tb_member.provinsi
	              WHERE tb_keranjang.id_keranjang = '$faktur'
	                AND tb_keranjang.id_member = '$sesen_id' ");
	$array        = mysqli_fetch_array($keranjang);
	$ongkir       = $array['jne_reg'];
	$nama_kota_kec= $array['nama_kabkot'].', '.$array['nama_kec'];
	//$ongkir 		= number_format($array['jne_reg'], 0, ',', '.');
	if(mysqli_num_rows($keranjang) > 0)
	{
	?><br><br>
		<table style="margin-top:10px;margin-bottom: 10px" class='col-xs-12 table-bordered table-striped table-condensed cf'>
		  <thead>
		    <tr>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th>Ongkos Kirim</th>
		      <td><?php echo $nama_kota_kec ?></td>
		      <td>Rp.<?php echo number_format($ongkir, 0, ',', '.').',-' ?></td>
		    </tr>
		    <tr>
		      <th>Total Berat</th>
		      <td><?php echo $total_berat ?> kg</td>
		    </tr>
		    <tr>
		      <th>Total Ongkos Kirim</th>
		      <td>x Rp <?php echo number_format($ongkir, 0, ',', '.').',-' ?></td>
		      <td>Rp.
			      <?php $totalongkir = $total_berat_genap * $ongkir;
						echo number_format($totalongkir, 0, ',', '.').',-';
						?>
					</td>
		    </tr>
		    <tr>
		      <th>Grand Total</th>
		      <td>Rp</td>
		      <td>
		      <b>
		      	<?php
		      	$query 				= "SELECT sum(subtotal) AS subtotal FROM tb_keranjang
														INNER JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang
														WHERE tb_keranjang.id_member = '$sesen_id'";
						$hasil 				= mysqli_query($koneksi,$query);
						$data 				= mysqli_fetch_assoc($hasil);
						$subtotal 		= $data['subtotal'];
						$grand_total 	= $totalongkir + $subtotal;
		      	echo number_format($grand_total, 0, ',', '.').',-';
		      	?>
		      </b></td>
		    </tr>
		  </tbody>
	 	</table>
	</form>

	 	<p>
	 		<a href="keranjang_hapus_all.php">
				<button name="hapus" type="button" class="btn btn-danger" aria-label="Left Align" title="Kosongkan Keranjang Belanja" OnClick="return confirm('Apakah Anda yakin?');">
				  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Kosongkan Keranjang Belanja
				</button>
			</a>
			<a href="./katalog.html">
				<button name="hapus" type="button" class="btn btn-primary" aria-label="Left Align" title="Lanjut Belanja">
				  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Lanjut Belanja
				</button>
			</a>
			<?php
			if(mysqli_num_rows($keranjang) > 0)
			{
				echo "
				<a href='checkout.php'>
					<button name='selesaikan' type='button' class='btn btn-success' aria-label='Left Align' title='Selesaikan Belanja' OnClick=\"return confirm('Apakah Anda yakin?');\">
					  <span class='glyphicon glyphicon-check' aria-hidden='true'></span> Selesaikan Belanja
					</button>
				</a>";
			}
			?>
			<!-- <button name='Ganti Alamat' id="ganti_alamat" type='button' class='btn btn-warning' data-toggle="" data-target="#				" aria-label='Left Align' title='Ganti Alamat'>
								  <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>Ganti Alamat
								</button> -->
		</p>
		<hr/>

		<p><strong>CATATAN</strong></p>
		<p>* Total berat akan dibulatkan ke atas dikarenakan sesuai dengan peraturan JNE</p>

	<?php } ?>
	