<?php session_start();
include '../config/koneksi.php';                  // Panggil koneksi ke database
include 'cek_login.php';        // Panggil fungsi cek sudah login/belum
include 'cek_session.php';      // Panggil fungsi cek session
include '../fungsi/setting.php';          // Panggil data 
include '../fungsi/base_url.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesanan Barang Baru | <?php include "title.php" ?></title>
  <script src="../template/js/jquery-3.4.1.min.js"></script>
    <style>
* {
  box-sizing: border-box;
  color: #fff;
  font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana,
    "sans-serif";
}


.wrapper {
  margin: 100px auto 0;
  width: 100%;
  max-width: 1100px;
  margin-top:50px;
  display: flex;
  justify-content: center;
}

form {
  width: 100%;
  margin: 0;
}

form * {
  font-size: 20px;
  letter-spacing: 0.075em;
  font-weight: 300;
  text-transform: uppercase;
  cursor: pointer;
  text-decoration: none;
}

form .field {
  width: 100%;
  position: relative;
  margin-bottom: 15px;
}

form .field label {
  position: absolute;
  top: 0;
  left: 0;
  background: rgb(72,73,74);
  background: radial-gradient(circle, rgba(72,73,74,1) 39%, rgba(72,73,74,1) 74%);
  width: 100%;
  height: 64px;
  transition: width 333ms ease-in-out;
  text-align: center;
  padding: 18px 0;
}

form .field input[type="text"],
form .field input[type="number"],
form .field select,
form .field textarea {
  border: none;
  width: 100%;
  height: 64px;
  margin: 0;
  padding-left: 19.5%;
  color: #313a3d;
}

form #msg {
  height: 64px;
  resize: none;
  transition: all 333ms ease-in-out;
  padding-top: 18px;
}
form textarea:focus#msg,
form textarea:not(:placeholder-shown)#msg {
  height: 166px;
}
form input[type="text"]:focus + label,
form input[type="number"]:focus + label,
form select:focus + label,
form input[type="text"]:not(:placeholder-shown) + label,
form input[type="number"]:not(:placeholder-shown) + label,
form select:not(:placeholder-shown) + label,
form textarea:focus + label,
form textarea:not(:placeholder-shown) + label,
form .field:hover label {
  width: 18%;
}
form input[type="submit"] {
  background: rgb(72,73,74);
  background: radial-gradient(circle, rgba(72,73,74,1) 39%, rgba(72,73,74,1) 74%);
  -webkit-appearance: none;
  border: none;
  position: relative;
  padding: 20px 50px;
  transition: all 0.3s ease-in-out;
  width:100%
}
form input[type="submit"]:hover,
form input[type="submit"]:focus {
  background: green;  
}
    </style>
    
    <?php include 'js.php'; ?>
    <!-- Data Tables -->
    <link href="template/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <script src="template/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="template/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <script src="../template/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
</head>
<body class="skin-blue sidebar-mini">
<?php include 'header.php'; ?>

      <div class="content-wrapper" style="background:grey">
        <section class="content-header">
          <h1>Daftar Pesanan Barang</h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="pesanan.php">Daftar Pesanan Barang</a></li>
          </ol>
        </section>
<?php 
include '../config/koneksi.php';
$id= $_GET['id_trans'];
$add = $_GET['alamat'];
$no = $_GET['no_hp'];
$id_mum = $_GET['id_member'];
$sql= mysqli_query($koneksi,"SELECT tb_member.nama from trans_jual left join tb_member on tb_member.id_member = trans_jual.id_member where id_trans= '$id'");
$array = mysqli_fetch_array($sql);
$nama = $array['nama'];
?>
<div class="wrapper">
  <form action="pesanan_kirim_proses.php" method="post">
    <div class="field">
      <input type="hidden" id="name" name="member" value="<?= $id_mum?>" placeholder="<?= $id_mum?>" />
    </div>
    <div class="field">
      <input type="text" id="no1" name="no_invoice" value="" placeholder="<?= $id ?>" />
      <label id="no" for="name">No Invoice</label>
    </div>
    <div class="field">
      <input type="text" id="nama1" name="nama" value="" placeholder="<?= $nama ?>"  />
      <label id="nama">Nama</label>
    </div>
    <div class="field">
      <input type="text" id="alamat1" name="alamat" value="" placeholder="<?= $add ?>" />
      <label id="alamat">Alamat</label>
    </div>
    <div class="field">
      <input type="Number" id="no_hp1" value="" name="no_hp" placeholder="<?= $no ?>" />
      <label id="no_hp">Nomer Hp</label>
    </div>
    <div class="field">
    <label di="mtd">Metode Pengiriman</label>
      <Select name="metode" id="mtd1" autofocus>
      <option style="color:black;" value="">Metode Pengiriman</option>
                            <?php
                $metode = "SELECT * FROM tb_pengiriman ORDER BY metode_pengiriman";
                $result = mysqli_query($koneksi, $metode);
                if (mysqli_num_rows($result) > 0)
                {
                  while ($data = mysqli_fetch_array($result))
                  {
                    echo "<option style='color:black;' value='$data[id_pengiriman]'>$data[metode_pengiriman]</option>\n";
                  }
                }
                  else
                  {
                    echo "Belum ada data";
                  }
                ?>
      </select>
    </div>
    <div class="field">
      <input type="text" id="resi1" name="resi" id="resi" placeholder="Resi" autofocus/>
      <label id="resi">Resi</label>
    </div>
    <input class="button" name="submit" value="Done!" type="submit" value="Send" />
  </form>

</div>
</body>
</html>


<script>
    $('#resi1').on('keyup', function () {
        var regex = /^[a-z A-Z 0-9]+$/;
        if (regex.test(this.value) !== true) {
            this.value = this.value.replace(/[^a-zA-Z0-9]+/, '');
        }
    });
</script>
<script>
        $('#no1').on('click',function(){
            $('#no1').val(<?= "$id" ?>);
            $('#nama1').val("<?=$nama?>");
            $('#alamat1').val("<?= $add ?>");
            $('#no_hp1').val(<?= "$no" ?>);
        });
</script>