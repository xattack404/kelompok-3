<html> 
    <head>
        <title>
            tugas 1jj
        </title>
    </head>
    <body>
		<!-- <center>
        <h1 style = "color :green">Selamat Belajar Html!</h1>
        <h2 style = "color :aqua">Nama Saya : Yudistiono</h2>
        <h3>Politeknik Negeri Jember</h3></center>
        <form action="" method="post" style="background-color: #if">
            <ul>
                <li><center><label for="nama">Nama :</label></center></li>
                <li><center><input type="text" name="nama" id="nama" placeholder="masukan nama"></center></li>
            </ul>
            <ul>
                <li><center><label for="nama">password :</label></center></li>
                <li><center><input type="password" name="nama" id="nama" placeholder="masukan passw"></center></li>
            </ul>
            <ul>
                <center><input type="button" name="submit" value="submit"></center>
            </ul>

        </form> -->
        <?php 

        echo '
        <center>
            <h1 style = "color :green">Selamat Belajar Html!</h1>
            <h2 style = "color :aqua">Nama Saya : Yudistiono</h2>
            <h3>Politeknik Negeri Jember</h3>
        </center>
        ';
        echo "<br>";?> 
        <h1>Ini Tugas Sekarang </h1>
        <?php
        echo "Sekarang Tanggal : ";
        echo date(' d-m-Y H:i:s');?><br>
        <?php
        echo "hello Kelas Bondowoso<br>";?>
        <!-- untuk menguji case sensitif variabel -->
        <?php
        $tempat = "Politeknik Negeri Jember";
        $Tempat = "Politeknik Negeri Jember dua";
        $TempaT = "Politeknik Negeri Jember tiga";
        echo "<h1>selamat datang di".$tempat."</h1>";
         ?>
        <h2>Selamat Belajar HTML di <?php EcHo $Tempat; ?></h2>
         <!-- tutup  -->
        <?php ECHO "<h3>selamat belajar HTML di ".$TempaT."</h3>"; ?>
        <?php 
        // operasi aritmatika atau penjumlahan
        $a = 20; $b = $c = 30; $d=2;
        $jumlah = ($a + $b)/$d;
        echo "hasil akhirnya ialah ".$jumlah."<br><hr>";
        echo "<h3>Ini perulangan</h3>";
        for ($e=0; $e <= 10 ; $e++) { 
            echo "Tempat ke -".$e."<br>";
        }
        $t = date("H");
        if ($t < "20") {
            echo "<hr>selamat pagi";
        }?>
        <hr>
        <?php
        //Konstanta
        define("yudis", "Selamat datang di Polije!");
        define("tiono", "saya yudis");
        echo "</br></br>".yudis;

        //Fungsi
        function yudis(){
            echo "</br></br>".yudis." Dua";
            function tiono(){
             echo "</br></br>".tiono." Dua";   
            }
        }

        yudis();
        tiono();
        ?>
    </body>

</html>