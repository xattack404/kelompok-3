<?php
include('config/koneksi.php');
 
$id = $_GET['id'];
 
$query = mysql_query("delete from siswa where id_siswa='$id'") or die(mysql_error());
 
if ($query) {
    echo "<script>alert('Data berhasil dihapus!');location='v_form2.php';</script>"; 
}
?>