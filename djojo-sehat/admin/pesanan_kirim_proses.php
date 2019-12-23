<?php
include '../config/koneksi.php';
 if(isset($_POST['submit'])){
 $no_id   = $_POST['id_invoice'];
 $nama   =  $_POST['nama'];
 $alamat   =  $_POST['alamat'];
 $no_hp   =  $_POST['no_hp'];
 $metode   =  $_POST['metode'];
 $resi  =  $_POST['resi'];
 $id_member = $_POST['id_member'];

 $sql = mysqli_query($koneksi,"INSERT INTO detail_pengiriman (
                                        id_trans,
                                        id_pengiriman,
                                        id_member,
                                        no_resi_pengiriman)
                                        VALUES (
                                        '$no_id',
                                        '$metode',
                                        '$id_member',
                                        '$resi')");
 $Update = mysqli_query($koneksi,"UPDATE trans_jual SET status = 5 where id_trans='$no_id' ");
     echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('pesanan.php')</script>";
}