<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<p center><h1 style="color:navy">Selamat Belajar HTML</h1></p>
<h2 style="color:blue">Nama Saya: Lambang Arinanda Hadi</h2>
<h3>Politeknik Negeri Jember</h3>

<?php
//membuat variabel yang berbeda untuk membuktikan CASE SENSITIVE
    echo "Hallowww Kelas </br></br>";
    $tempat = "di Polije";
	$Tempat = "di Polije Dua";
	$TempaT = "di Polije Tiga";

	echo "<h1 style='color:green'>Selamat Belajar HTML ".$tempat."</h1>";
	ECHO "<h2 style='color:blue'>Selamat Belajar HTML</h2>";
	EcHo "<h3>Selamat Belajar HTML ".$Tempat."</h3>";
	echo $TempaT."</br></br>";
	echo date("Y/m/d")."</br></br>";

	//Penjumlahan
	$a = 10; $b = $c = 20; $d = 2;
	$jumlah = ($a + $b)/$d;

	echo $jumlah."</br></br>";

	for ($x = 0; $x <= 10; $x++) {
    	echo "Tempat Ke - ".$x."<br>";
		}

	$t = date("H");

	if ($t < "20") {
    	echo "Selamat Pagi!";
	}

	//Konstanta
	define("ari", "Selamat datang di Polije!");
	echo "</br></br>".ari;

	//Fungsi
	function ari(){
		echo "</br></br>".ari." Dua";
	}

	ari();

?>

</body>
</html>