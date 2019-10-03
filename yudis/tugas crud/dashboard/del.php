<?php 

require_once "../_config/config.php";

mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE id_mahasiswa = '$_GET[id]'") or die(mysqli_error($conn));
echo "<script>window.location ='data.php';</script>";




 ?>