<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1 style="color:red">Selamat Belajar HTML</h1>
<h2 style="color:blue">Nama Saya: (Ryan Chandra B)</h2>
<h3>Politeknik Negeri Jember</h3>

<?php
    echo "Hallowww Kelas </br></br>";
    $tempat = "di Polije";
	$Tempat = "di polije";
	$TempaT = "di Polije";

	echo "<h1 style='color:red'>Selamat Belajar HTML ".$tempat."</h1>";
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

	
?>

</body>
</html>