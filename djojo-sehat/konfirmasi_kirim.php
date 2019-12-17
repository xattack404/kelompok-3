<?php 

include 'config/koneksi.php';
if (isset($_POST['submit'])) {

	$no = $_POST['no'];
	$nama = $_POST['nama_pengirim'];

	  $allowed_ext  = array('jpg', 'jpeg', 'png', 'gif');
      $file_name    = $_FILES['img']['name']; // File adalah name dari tombol input pada form
      $text = end(explode('.',$file_name));
      $file_ext=strtolower($text);
      // $file_ext     = strtolower(end(explode('.', $file_name)));
      $file_tmp     = $_FILES['img']['tmp_name'];
      $lokasi       = 'images/buktibayar/'.$nama.'.'.$file_ext;
      $img          = $nama.'.'.$file_ext;

      if(in_array($file_ext, $allowed_ext) === true)
      {
        move_uploaded_file($file_tmp, $lokasi);
        $query =  "UPDATE trans_jual SET bukti_bayar = '$img' WHERE id_trans ='$no'";
        if (mysqli_query($koneksi, $query)) {
        	echo "<script>alert('Bukti bayar behasil diuppload ! Silahkan menunggu konfirmasi dari admin');location.replace('produk_list.php')</script>";
        }else{
        	echo "<script>alert('bukti gagal diuppload');history.go(-1)</script>";
        }
	}else{
		echo "<script>alert('Jenis file tidak sesuai!');</script>";
	}

 }
 ?>