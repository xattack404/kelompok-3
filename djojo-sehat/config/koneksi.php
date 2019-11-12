 <?php 
  //Koneksi DB
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "djojo_sehat";

    $koneksi = mysqli_connect($host, $user, $password, $database);

 	// Check connection
	if ($koneksi->connect_error) {
    	die("Koneksi Gagal: " . $koneksi->connect_error);
	}

	// function pengunjung(){
	// 	global $koneksi;
	// 	$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
	// 	$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
	// 	$waktu   = time(); //

	// 	$cek = "SELECT * FROM pengunjung WHERE ip='$ip' AND tanggal='$tanggal'";
	// 	$ada = mysqli_query($koneksi, $cek);
	// 	if(mysqli_num_rows($ada) <= 0){
	// 		$vr = mysqli_query($koneksi, "INSERT INTO pengunjung (ip,tanggal,online,hits) VALUES($ip,$tanggal,$waktu,'1')");
	// 	} else {
	// 		$r = mysqli_query($koneksi, "UPDATE pengunjung SET hits+=1 online=$waktu WHERE ip='$ip' AND tanggal='$tanggal' ");
	// 	}
	// }

 ?>
 