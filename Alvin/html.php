<html>
    <head>
        <title>
            Page Title!
        </title>
    </head>
    <body>
        
        <?php
	echo "<center>";
    echo "Hallowww Kelas </br></br>";
    $tempat = "di Polije";
	$Tempat = "di Polije Dua";
	$TempaT = "di Polije Tiga";

	echo "<h1 style='color:red'>Selamat Belajar HTML ".$tempat."</h1>";
	ECHO "<h2 style='color:blue'>Selamat Belajar HTML ".$Tempat."</h2>";
	EcHo "<h3>Selamat Belajar HTML ".$Tempat."</h3>";
	echo "</br></br>";
	echo date("m/d/y")."</br></br>";
	echo "</center>";
	//Penjumlahan
	echo "a = ".$a = 10.;
	echo "</br>";
	echo "b = ".$b = 20.;
	echo "</br>";
	echo "c = ".$c = 20.;
	echo "</br>"; 
	echo "d = ".$d = 2. ;
	echo "</br>";
	echo "Penjumlahan Dari (a + b)/ d * c = ";
	$jumlah = ($a + $b)/$d * $c;

	echo $jumlah."</br></br>";

	$s = 0;
	do{
		echo "Tempat Ke - ".$s."<br>";
		$s++;
	}while($s <= 10);
	echo "<br><br>";

	for ($x = 0; $x <= 10; $x++) {
    	echo "Tempat Ke - ".$x."<br>";
		}

	$t = date("H");

	if ($t < "20") {
    	echo "Selamat Pagi!";
	}

	//Konstanta
	define("Alvin", "Selamat Datang di Polije");
	echo "</br></br>".Alvin;

	//Fungsi
	function Alvin(){
		echo "</br></br>".Alvin."Dua";
	}

	Alvin();

?>

    </body>
</html>