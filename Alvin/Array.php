<html>
<head>
</head>
<body>
<?php
//Array
$Gear = array(
    'red'       => "Corrupt Gear",
    'Yellow'    => "Ultimate Gear / Boss Weapon",
    'Blue'      => "Guild Boss Gear",
    'White'     => "Starter Gear"
);
$buah = array('Semangka','Jeruk','Apel','Anggur');
//Perulangan While
$x=0;
do{
    echo $buah[$x]. "<br>";
    $x++;
}while($x<count($buah));
echo "</br>";
echo "</br>";
echo "</br>";
//Aritmatika
echo "Aritmatika : ";
echo "</br>";
echo "</br>";
echo " Variabel : ";
echo "</br>";
echo "a = ".$a = 10.;
echo "</br>";
echo "b = ".$b = 20.;
echo "</br>";
echo "c = ".$c = 30.;
echo "</br>"; 
echo "d = ".$d = 3. ;
echo "</br>";
echo "</br>";
echo "Penjumlahan Dari (a + b) / c * d = ";
$jumlah = ($a + $b)/$c * $d;
echo $jumlah."</br></br>";

?>
<!-- penanganan form dengan method GET -->
<form method="get" action="simpan.php">
        <label>Name</label><br>
			<input type="text" name="Nama" placeholder="Name ..">
                <br>
        <label >Address</label><br>
            <textarea cols="50" rows="4" name="Alamat" require ="Please!!!" placeholder="Address...."></textarea>
                <br>
                <br>
                <br>
                <select class = "Selection" name="Level">
                        <option value="Admin">Admin</option>
                        <option value="Member">Member</option>
                      </select><br>
                      <br>
                      <br>
        <label >Password</label><br>
            <textarea cols="50" rows="4" name="Password" require ="Please!!!" placeholder="Password....."></textarea>
                <br>
                <button type="submit" form="html2" class="Name_Box" value="Submit">Submit</button>
                <br>
                <br>
                <br>
                <table width="50%" border="1">  
  <thead>  
   <tr>  
    <th width="28%" bgcolor="#FCF15C">Nama</th>  
    <th width="37%" bgcolor="#FCF15C">Address</th>  
    <th width="35%" bgcolor="#FCF15C">Level</th>
    <th width="35%" bgcolor="#FCF15C">Password</th>  
   </tr>  
  </thead>  
  <tbody>  
   <?php  
 include "koneksi.php";  
	//panggil semua data di tabel register
    $query = mysqli_query($koneksi,"select * from register");
     $no = 1;
     //menampilkan data dengan perulangan WHILE
    while ($data = mysqli_fetch_array($query)) {
 ?>  
   <tr>  
    <td><?php echo $data['Nama'] ?></td>  
    <td><?php echo $data['Alamat'] ?></td>  
    <td><?php echo $data['Level'] ?></td>
    <td><?php echo $data['Password'] ?></td>  
   </tr>  
   <?php 
            $no++; 
	}
            ?>
  </body>  
 </table>
 </form>
</body>
</html>