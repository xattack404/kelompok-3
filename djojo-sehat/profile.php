<div class="container">
	<div class="topnav">
	  <a  class="active" href="profile.php">biodata diri</a>
	  <a href="profile_alamat.php">Daftar Alamat</a>
	  <a href="notifikasi.php">Notifikasi</a>
	  <a href="keamanan.php">Keamanan</a>
	</div>

	<div style="padding-left:2px;padding-top: 45px; " >
		<div id="ubah_semua">
		<div class="container">
		<div class=" offset-3 col-lg-6">
		<form action="profile_proses.php" method="post">
		<input type="hidden" name="id" value="<?= $sesen_id ?>">
		<div class="row">
			<p style="font-size: 15px"><b>Ubah Biodata Diri</b></p>
		</div>
		<div class="form-group">
			<label for="nama">Nama</label>
			<input type="text" value="<?= $row['nama'] ?>" name="nama" autofocus class="form-control" required>
		</div>
		<div class="form-group">
			<label for="jenis_kelamin">Jenis Kelamin</label><br>
			<input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
			<input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
		</div>
		<div class="row">
			<p style="font-size: 15px"><b>Ubah Kontak</b></p>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" value="<?= $row['email'] ?>" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="no_hp`">No_Hp</label>
			<input type="number" name="no_hp"  value="<?= $row['no_hp'] ?>" class="form-control" required>	
		</div>
        <div class="form-group">
        	<input type="submit" name="simpan_semua" value="simpan" class="btn btn-success">
        </div>
	</form>
	</div>
	</div>	
	</div>
	<div id="biodata">
	  <div class="col-lg-5" style="background-color: #f1f1f1;border: 1px solid #c2d6d6;">
	  		<div>
	  			<br><br>
	  		</div>
	  	<div class="thumbnail" >
            <div class="col-md-12" >
              <img class="img-thumbnail" src="images/produk/coba.png" style="height: 250px;">
            </div>
            <br><br>
            <div class="caption-full" >
              <div class="row text-center" >
              <div class="col-lg-12">
	              <label class="form-control" ><b>Pilih Foto</b>
	              <input id="files" style="visibility:hidden;" type="file"></label>
              </div>
              </div>
              <p style="font-size: 10px;">Besar file: maksimum 1.000.000 bytes (10 Megabytes)
				Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG</p>
            </div>
          </div><br>
          <div class="text-center"><label class="form-control"><b><i class="fa fa-lock" style="font-size: 18px"></i></b>&nbsp;Buat kata sandi</label></div>
		</div>
	  	<!-- <img class="center" src="images/produk/coba.png"> -->
	  
	  <div class="col-lg-6">
	  
		<div class="container"><div class="row">
			<p style="font-size: 15px"><b>Ubah Biodata Diri</b></p>
		</div>
		<div class="row">
			<div class="col-lg-6 ">
				<p>Nama</p>
			</div>
			<div class="col-lg-6">
				<?php if ($row['nama']=='') {?>
					<input id="btn-nama" type="button" class="btn btn-primary btn-xs" value="tambah data"  onclick="nama()">
					<div id="nama">
						<form action="profile_proses.php" method="post">
							<input type="hidden" name="id" value="<?= $sesen_id ?>">
							<input type="text" class="form-control" name="nama" required placeholder="isi nama anda">
							<button type="submit" name="simpan_nama" class="btn btn-success btn-xs">Simpan</button>
						</form>
					</div>
				<?php }else{ ?>
				<p><?= $row['nama'] ?></p>
			<?php } ?>
			</div>
		</div><br>
		<div class="row">
			<div class="col-lg-6">
				<p>Jenis Kelamin</p>
			</div>
			<div class="col-lg-6">
				<?php if ($row['jenis_kelamin']=='') {?>
					<input id="btn-jk" type="button" class="btn btn-primary btn-xs" value="tambah data"  onclick="jk()">
					<div id="jk">
						<form action="profile_proses.php" method="post">
							<input type="hidden" name="id" value="<?= $sesen_id ?>">
							<input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
							<input type="radio" name="jenis_kelamin" value="Perempuan">
							<button type="submit" name="simpan_jk" class="btn btn-success btn-xs">Simpan</button>
						</form>
					</div>
				<?php }else{ ?>
				<p><?= $row['jenis_kelamin'] ?></p>
			<?php } ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<p style="font-size: 15px"><b>Ubah Kontak</b></p>
		</div>
		<div class="row">
			<div class="col-lg-6 ">
				<p>Email</p>
			</div>
			<div class="col-lg-6">
				<?php if ($row['email']=='') {?>
					<input id="btn-email" type="button" class="btn btn-primary btn-xs" value="tambah data"  onclick="email()">
					<div id="email">
						<form action="profile_proses.php" method="post">
							<input type="hidden" name="id" value="<?= $sesen_id ?>">
							<input type="text" class="form-control" name="email">
							<button type="submit" name="simpan_email" class="btn btn-success btn-xs">Simpan</button>
						</form>
					</div>
				<?php }else{ ?>
				<p><?= $row['email'] ?></p>
			<?php } ?>
			</div>
		</div><br>
		<div class="row">
			<div class="col-lg-6 ">
				<p>Nomor HP</p>
			</div>
			<div class="col-lg-6">
				<?php if ($row['no_hp']=='') {?>
					<input id="btn-no_hp" type="button" class="btn btn-primary btn-xs" value="tambah data"  onclick="no_hp()">
					<div id="no_hp">
						<form action="profile_proses.php" method="post">
							<input type="hidden" name="id" value="<?= $sesen_id ?>">
							<input type="number" class="form-control" name="no_hp" >
							<button type="submit" name="simpan_no_hp" class="btn btn-success btn-xs">Simpan</button>
						</form>
					</div>
				<?php }else{ ?>
				<p><?= $row['no_hp'] ?></p>
			<?php } ?>
			</div>
		</div><br>
	</div><br><br><br>
	<div class="text-center">
	<input type="button" id="btn-all" onclick="ubahall()" class="btn btn-secondary" value="Ubah Semua Data">
	</div>
	<div class="container peringatan">
		
	</div>
	</div>
	
	</div><!-- tutubiodata  -->
	
	</div>
	</div>

<style>
	/*img{
		height: 100px;
		padding: 10px 10px 10px 10px;
	}*/
	.topnav {
  overflow: hidden;
  background-color: #f1f1f1;
  border-bottom-color: red;
}
td{
	margin-right: 10px;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 13px;
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid green;
}

.topnav a.active {
  border-bottom :3px solid skyblue;


}
.container p{
	font-size: 12px;
}
</style>



<?php
include "fungsi/imgpreview.php"; // Preview gambar yang akan diupload
//include "../fungsi/tinymce.php";    // Editor teks Tinymce + Ajax File/ Photo Manager
?>