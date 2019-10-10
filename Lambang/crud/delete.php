<?php
include('config/koneksi.php');
 
$id = $_GET['id'];
 
$query = mysqli_query($koneksi,"delete from barang where no_id='$id'") or die(mysql_error());
 
if ($query) {
    echo "<script>alert('Data berhasil dihapus!');location='view.php';</script>"; 
}
?>