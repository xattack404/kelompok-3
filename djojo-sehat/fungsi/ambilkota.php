<?php
include '../config/koneksi.php';;

$prov 		= $_GET['prov'];
$kabkot 	= "SELECT id_kabkot,nama_kabkot FROM kabkot WHERE id_prov = '$prov' ORDER BY nama_kabkot";
$result 	= mysqli_query($koneksi, $kabkot);
if (mysqli_num_rows($result) > 0)
{
	while ($data = mysqli_fetch_array($result))
	{
  	echo "<option value='".$data['id_kabkot']."''>".$data['nama_kabkot']."</option>\n";
	}
}
	else
	{
  		echo "Belum ada data";
	}
?>
