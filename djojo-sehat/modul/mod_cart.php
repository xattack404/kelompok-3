<h3>Keranjang Belanja</h3>
<hr/>
<table width="100%" align="center" cellpadding="3">
	<?php
	if(isset($sesen_id))
	{
		$query 		= "SELECT tb_keranjang.id_keranjang, tb_keranjang.id_member,
		 tb_keranjang.id_barang,tb_keranjang.subtotal,tb_keranjang.jumlah,tb_barang.id_barang, 
		 tb_barang.nama_barang,  tb_barang.judul,tb_barang.harga_jual
						    FROM tb_keranjang
							LEFT JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang
							WHERE tb_keranjang.id_member = '$sesen_id'";
		$hasil 		= mysqli_query($koneksi,$query);
		if (mysqli_num_rows($hasil) > 0)
		{
			while ($data = mysqli_fetch_array($hasil))
			{
				echo "
							<tr>
								<td><a href='$base_url"."produk/$data[judul].html'/><b>".$data['nama_barang']."</b></a>
								<br>
								Rp ".number_format($data['harga_jual'], 0, ',', '.')." x ".$data['jumlah']." = Rp ".number_format($data['subtotal'], 0, ',', '.')."
								<br><br>
								</td>
							</tr>";
			}
		}
			else
			{
				echo "<img src='$base_url"."images/cart.png' width='100' height='85'/>";
			}
	}
	else
	{
		echo "<img src='$base_url"."images/cart.png' width='100' height='85'/>";
	}
	?>
  <tr>
    <th colspan="2" align="left" valign="top" scope="col"> <hr />
      <p><a href="<?php echo $base_url ?>keranjang.html">Selengkapnya</a></p>
    </th>
  </tr>
</table>
</p>
