<html> 
    <head>
        <title>
            tugas 1
        </title>
    </head>
    <body>
		<center>
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

        </form>
        <?php 

        echo '
        <center>
            <h1 style = "color :green">Selamat Belajar Html!</h1>
            <h2 style = "color :aqua">Nama Saya : Yudistiono</h2>
            <h3>Politeknik Negeri Jember</h3>
        </center>
        ';

         ?>
    </body>

</html>