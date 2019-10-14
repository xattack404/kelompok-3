<?php 
session_start();

require_once "../_config/config.php";
if (isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        // cek password
        if (password_verify($password, $row["password"])) {
           $_SESSION["login"]=$username;
           header("Location:../index.php");
           exit;
        }
    }
    $error  = true;
    ?>
    		<!-- <div class="row">
                <div class="col-lg-6 col-lg-offset-3" style="padding-top: 10%; ">
                    <div class="alert alert-danger alert-dismissable" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <strong>Login Gagal!</strong> username atau password salah  
                    </div>
                </div>
            </div> -->
    <?php
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login || coba</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="../_assets/css/bootstrap.min.css"> 
    <link rel="icon" href="../_assets/q.jpg">
    <script src="../_assets/ajax.js"></script>
    <script src="../_assets/js/bootstrap.min.js"></script>
</head>
<body>

        <div class="container " style="padding-top: 13%; padding-left: 30%;">
            
            <div class="row">
                <div class="col-md-5 offset-3" style="background-color: #eaeaea; padding: 10px;">
                    <h3 class="text-center">Login</h3><br>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Username :</label>	
                            <input type="text" class="form-control" name="username" id="username" placeholder="masukan username anda" required="" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password" >Password :</label>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Masukan password">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" name="login" value="Login"><a href="daftar.php">&nbsp;Daftar </a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
</body>
</html>