<h3>Keranjang Belanja</h3>
<hr/>
<table width="100%" align="center" cellpadding="3">
	<?php
	if(isset($sesen_id))
	{
		$query 		= "SELECT * FROM trans_jual WHERE id_member = '$sesen_id' ";
		$hasil 		= mysqli_query($koneksi,$query);
		if (mysqli_num_rows($hasil) > 0)
		{
			while ($data = mysqli_fetch_array($hasil))
			{
				echo "
							<tr>
								<td><a href='transaksi_selesai.php?id_trans=".$data['id_trans']."/><b>".$data['nama_barang']."'</b></a>
								<br>
								Rp ".number_format($data['total_bayar'], 0, ',', '.')."
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
