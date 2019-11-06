<?php
$sql = "SELECT * FROM tb_member";
$data = mysqli_query($koneksi, $sql);
$member = mysqli_num_rows($data);
?>