<?php 

include 'config/koneksi.php';
include 'fungsi/base_url.php';
include 'fungsi/cek_session_public.php';

if (isset($_POST['simpan_nama'])) {
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
	$sql_nama= "UPDATE tb_member SET nama ='$nama' WHERE id_member= '$id'";
	if (mysqli_query($koneksi, $sql_nama)) {
		 echo "<script>alert('nama  berhasil ditambahkan! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}else{
		echo "<script>alert('gagal diubah! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}
}

if (isset($_POST['simpan_jk'])) {
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$jk = mysqli_real_escape_string($koneksi,$_POST['jenis_kelamin']);
	$sql_jk = "UPDATE tb_member SET jenis_kelamin ='$jk' WHERE id_member= '$id'";
	if (mysqli_query($koneksi, $sql_jk)) {
		 echo "<script>alert('jenis_kelamin  berhasil ditambahkan! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}else{
		echo "<script>alert('gagal diubah! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}
}

if (isset($_POST['simpan_email'])) {
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$email = mysqli_real_escape_string($koneksi,$_POST['email']);
	$sql_email = "UPDATE tb_member SET email ='$email' WHERE id_member= '$id'";
	if (mysqli_query($koneksi, $sql_email)) {
		 echo "<script>alert('email  berhasil ditambahkan! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}else{
		echo "<script>alert('gagal diubah! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}
}

if (isset($_POST['simpan_no_hp'])) {
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$no_hp = mysqli_real_escape_string($koneksi,$_POST['no_hp']);
	$sql_no_hp = "UPDATE tb_member SET no_hp ='$no_hp' WHERE id_member= '$id'";
	if (mysqli_query($koneksi, $sql_no_hp)) {
		 echo "<script>alert('nomor hp  berhasil ditambahkan! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}else{
		echo "<script>alert('gagal diubah! Klik ok untuk melanjutkan');location.replace('coba.php')</script>";
	}
}

if (isset($_POST['simpan_semua'])) {
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$nama = mysqli_real_escape_string($koneksi,$_POST['nama']);

	$file_name = $_FILES['gbr']['name'];
	$tmp = explode('.',$file_name);
	$file_ext     = strtolower(end($tmp));
	$file_tmp = $_FILES['gbr']['tmp_name'];
	$lokasi = 'images/profile/'.$nama.'.'.$file_ext;
	$img = $nama.'.'.$file_ext;

	$email = mysqli_real_escape_string($koneksi,$_POST['email']);

		move_uploaded_file($file_tmp, $lokasi);
		$sql_semua = "UPDATE tb_member SET nama ='$nama', email ='$email',foto = '$img' WHERE id_member= '$id'";
			if (mysqli_query($koneksi, $sql_semua)) 
			{
			 echo "<script>alert('biodata  berhasil diubah! Klik ok untuk melanjutkan');</script>";
			}else{
					echo "<script>alert('gagal diubah! Klik ok untuk melanjutkan');</script>";
				 }	
		
}


if  (isset($_POST['daftar_alamat_baru'])){
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$judul = mysqli_real_escape_string($koneksi,$_POST['judul']);
	$alamat = mysqli_real_escape_string($koneksi,$_POST['alamat']);
	$prov = mysqli_real_escape_string($koneksi,$_POST['prov']);
	$kot = mysqli_real_escape_string($koneksi,$_POST['kot']);
	$kec = mysqli_real_escape_string($koneksi,$_POST['kec']);
	$kd_pos = mysqli_real_escape_string($koneksi,$_POST['kd_pos']);
	$no_hp = mysqli_real_escape_string($koneksi,$_POST['no_hp']);
	$cekdata = "SELECT aktif FROM tb_alamat WHERE aktif = 1 ";
	$ada     = mysqli_query($koneksi, $cekdata);
if(mysqli_num_rows($ada) > 0)
{ 
	$sql_alamat = "INSERT INTO tb_alamat(id_member,
										judul_alamat,
										alamat,
										kecamatan,
										kabupaten_kota,
										provinsi,
										kode_pos,
										no_hp,
										aktif)
									values(	'$id',
										'$judul',
										'$alamat',
										'$kec',
										'$kot',
										'$prov',
										'$kd_pos',
										'$no_hp',
										'0')";
	mysqli_query($koneksi,$sql_alamat);
	echo "<script>alert('Berhasil Menambahkan Alamat Baru ! Klik ok untuk melanjutkan');location.replace('profile.php')</script>";

} else {
	$sql_alamat2 = "INSERT INTO tb_alamat(id_member,
										judul_alamat,
										alamat,
										kecamatan,
										kabupaten_kota,
										provinsi,
										kode_pos,
										no_hp,
										aktif)
									values(	'$id',
										'$judul',
										'$alamat',
										'$kec',
										'$kot',
										'$prov',
										'$kd_pos',
										'$no_hp',
										'1')";
	if(mysqli_query($koneksi,$sql_alamat2)){

		echo "<script>alert('Berhasil Menambahkan Alamat Baru ! Klik ok untuk melanjutkan');location.replace('profile.php')</script>";
                           
	}else {
      echo "Error updating record: " . mysqli_error($koneksi);
	}
}
			
}

if  (isset($_POST['pilih_alamat'])){
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$judul = mysqli_real_escape_string($koneksi,$_POST['amt']);
	$cekdata = "SELECT aktif FROM tb_alamat WHERE aktif = 1 ";
	$ada     = mysqli_query($koneksi, $cekdata);
if(mysqli_num_rows($ada) > 0)
{ 
  $sql_aktif = mysqli_query($koneksi,"UPDATE tb_alamat SET aktif = 0 WHERE aktif = 1 ");
  mysqli_query($koneksi,$sql_aktif);


  $sql_aktif2 = "UPDATE tb_alamat SET aktif = 1 WHERE aktif = 0 AND judul_alamat = '$judul' ";                      
  if(mysqli_query($koneksi, $sql_aktif2)) 
  {
    echo "<script>alert('Set Active berhasil! Klik ok untuk melanjutkan');location.replace('profile.php')</script>";
  } 
    else 
    {
      echo "Error updating record: " . mysqli_error($koneksi);
    }
}
}
if  (isset($_POST['hapus_alamat'])){
	$id = mysqli_real_escape_string($koneksi,$_POST['id']);
	$judul = mysqli_real_escape_string($koneksi,$_POST['amt']);
	$sql = mysqli_query($koneksi,"DELETE FROM tb_alamat where judul_alamat='$judul'");
			echo "<script>alert('Berhasil Menghapus Alamat Baru ! Klik ok untuk melanjutkan');location.replace('profile.php')</script>";
} else {
			echo("Error description: " . mysqli_error($koneksi));	
			
}

 ?>