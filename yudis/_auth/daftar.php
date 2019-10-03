<?php 
    

require_once "../_config/config.php";

// if (isset($_POST['login'])) {
//     if (registrasi($_POST)>0) {
//         echo "
//                 <script> 
//                     alert ('data berhasil ditambahkan');
//                 </script>

//             ";
//             // document.location.href = 'index.php';
//     }else{
//         echo mysqli_error($conn);
//     }
// }




 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi || coba</title>
    <meta charset="utf-8">
    <meta view="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../_assets/css/bootstrap.min.css"> 
    <link rel="icon" href="../_assets/q.jpg">
    <script src="../_assets/ajax.js"></script>
    <script src="../_assets/js/bootstrap.min.js"></script>
</head>
<body>

        <div class="container " style="padding-top: 7%; padding-left: 30%;">
            <div class="row">
                <div class="col-md-5 offset-3" style="background-color: #eaeaea; padding-top: 10px;">
                    <h3 class="text-center">Daftar</h3><br>
                    <p style="padding:0px; ">daftar disini untuk bisa akses </p>
                    <form action="pdaftar.php" method="post">
                        <div class="form-group">
                            <label for="nama">Nama  :</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="masukan nama anda" required="" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="username" >Username :</label>
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Masukan username">
                        </div>
                        <div class="form-group">
                            <label for="password" >Password :</label>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Masukan password">
                        </div>
                        <div class="form-group">
                            <label for="password2" >Konfirmasi Password :</label>
                            <input type="password" class="form-control" id="password2" name="password2" required placeholder="Masukan password2">
                        </div>
                        <div class="form-group">
                            <label for="email" >Email :</label>
                            <input type="text" class="form-control" id="email" name="email" required placeholder="Masukan Email">
                        </div>
                        <div class="form-group">
                            <label for="no_hp" >No Hp :</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" required placeholder="Masukan No Hp">
                        </div>
                        <div class="form-group ">
                            <input type="submit" class="btn btn-primary text-center" name="daftar" value="Daftar">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

</body>
</html>