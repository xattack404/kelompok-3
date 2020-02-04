<?php session_start();
include 'fungsi/cek_session_public.php';
include 'config/koneksi.php';
include 'fungsi/base_url.php';
$sql = mysqli_query($koneksi,"SELECT * from tb_member where id_member = $sesen_id");
$sql2 = mysqli_query($koneksi,"SELECT * FROM tb_alamat where id_member = $sesen_id");
$row = mysqli_fetch_array($sql);
$row2 = mysqli_fetch_array($sql2);
include 'navbar.php';
?>
<script src="<?php echo $base_url ?>template/js/jquery-3.4.1.min.js"></script>

 <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
  <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
  <script src="<?php echo $base_url ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/popper.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/bootstrap.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.easing.1.3.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.waypoints.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.stellar.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/owl.carousel.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/aos.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.animateNumber.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/bootstrap-datepicker.js"></script>
  <script src="<?= $base_url ?>template/Design/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?= $base_url ?>template/Design/js/google-map.js"></script>
  <script src="<?= $base_url ?>template/Design/js/main.js"></script>
<link rel="stylesheet" href="<?php echo $base_url ?>template/Register/css/style.css"/>
	
	
<section class="forms-section">
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login" style="color:black">
        Biodata Diri
        <span class="underline"></span>
      </button>
      <form class="form form-login" enctype="multipart/form-data" action="profile_proses.php" method="post">
        <fieldset>
          <legend>Please, enter your email and password for login.</legend>
          <div class="input-block">
          	<input id="email" name="id" type="text" hidden value="<?= $sesen_id?>">
            <label for="login-nama">Nama</label><br>
            <label id="nama" style="color:black" for="login-nama"><?= $sesen_nama ?></label>
            <div style="display: none" id="edit-nama">
            <input id="nama" name="nama" type="text" required value="<?= $sesen_nama?>">
          </div></div>
          <div class="input-block">
          	<label for="email">E-mail</label> <br>
          	<label style="color: black" id="email1" for="login-email"><?= $row['email'] ?></label>
             <div id="edit-email" style="display: none"n>
            <input id="email" name="email" type="email" value="<?= $row['email']?>">
            <p class="email" style="color: red"></p>
           </div></div>
           <div class="input-block">
          	<label for="Jenis Kelamin">No Handphone</label> <br>
          	<label style="color: black" id="no-hp" for="login-email"><?= $row2['no_hp']; if	(empty($row2['no_hp'])){echo "Data Belum Ada";}else{echo "$row2[no_hp]";}?></label>
             <div id="edit-no-hp" style="display: none">
            <input id="email-login" name="no-hp" type="number" value="<?= $row2['no_hp']?>">
            <p class="no-hp" style="color: red"></p>
           </div></div>
          <div class="container" style="width:250;height: 250">
  			<div class="card" style="width:250;height: 250">
     			<div class="card__image-container" style="width:250;height: 250">
       				<img id="upload" class="card__image" style="width:250;height: 250;border: solid black;border-radius: 5%;padding: 2px;margin-left: -15px" src="

					<?php 
					error_reporting(0);
						if (empty($row[foto])){
							echo "https://images.unsplash.com/photo-1519999482648-25049ddd37b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2126&q=80";
						}else{
						echo"$base_url"."images/profile/"."$row[foto]";	
						}
					?>


       				" alt="">
       				<input id="files" id="gbr" name="gbr" style="display:none;margin-top: -250px;width: 250px;height: 250px" type="file">
    			</div>
			</div>
		  </div>
        </fieldset>
        <button class="btn btn-primary py-3 px-4" style="width:150px;margin-left: 50px;margin-top: 15px;margin-bottom: -5px" type="button"id="Edit">Edit</button>
        <button type="submit" id="submit" name="simpan_semua" class="btn-login" style="display: none">Submit</button>
        <script>
        		function event(){
        			$('#files').trigger('click');
        		}
        	$('#Edit').on("click",function(){
        		$('#nama').css("display","none");
        		$('#email1').css("display","none");
        		$('#no-hp').css("display","none");
        		$('#Edit').css("display","none");
        		$('#edit-nama').css("display","block");
        		$('#edit-email').css("display","block");
        		$('#edit-no-hp').css("display","block");
        		$('#submit').css("display","block");
        		$('#batal').css("display","block");
        		$('#upload').on("click",event);
        	});
        	$('#batal').on("click",function(){
        		$('#nama').css("display","block");
        		$('#email1').css("display","block");
        		$('#no-hp').css("display","block");
        		$('#Edit').css("display","block");
        		$('#edit-nama').css("display","none");
        		$('#edit-email').css("display","none");
        		$('#edit-no-hp').css("display","none");
        		$('#submit').css("display","none");
        		$('#batal').css("display","none");
        		$('#upload').off("click",event)	;
        	});
        </script>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup" style="color: black">
        Daftar Alamat
        <span class="underline"></span>
      </button>
      <form class="form form-signup" action="profile_proses.php" method="post" style="width:400px">
      	<p><button type="button" id="pilih" name="active" class="btn btn-primary py-3 px-4" style="width:150px;margin-left: 20px;margin-top: 15px;margin-bottom: -5px">Pilih Alamat</button>
        	<button type="button" name="daftar" id="daftar" class="btn btn-primary py-3 px-4" style="width:150px;margin-left: 20px;margin-top: 15px;margin-bottom: -5px">Tambah Alamat</button></p>
        </form>
        <fieldset id="daftar_alamat" style="display: none">
      <form class="form form-signup" action="profile_proses.php" method="post" style="width:400px">
        	<input id="id" name="id" type="text" hidden value="<?= $sesen_id?>">
          <legend>Please, enter your email, password and password confirmation for sign up.</legend>
          <div class="input-block">
            <label for="signup-email">Judul Alamat</label>
            <input type="text" name="judul" id="judul" required>
          </div>
          <div class="input-block">
            <label for="signup-email">Alamat</label>
            <input type="text" name="alamat" id="alamat" required>
          </div>
          <div class="input-block">
            <label for="signup-email">Provinsi</label><div class="select-wrap">
                    <select name="prov" id="prov" class="form-control">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <option value="">Provinsi</option>
                      <?php
                      $query = "SELECT * FROM prov ";
                      $sql = mysqli_query($koneksi, $query);
                      while($data = mysqli_fetch_array($sql)){
                      echo '<option value="'.$data['id_prov'].'">'.$data['nama_prov'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
          </div>
          <div class="input-block">
            <label for="signup-email">Kabupaten</label>
            <div class="select-wrap">
                    <select name="kot" id="kot" class="form-control">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <option value="">Kabupaten / Kota</option>
                    </select>
                  </div>
          </div>
          <div class="input-block">
            <label for="signup-email">Kecamatan</label><div class="select-wrap">
                    <select name="kec" id="kec" class="form-control">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <option value="">Kecamatan</option>
                     </select>
                  </div>
          </div>
          <div class="input-block">
            <label for="signup-email">Kode Pos</label>
            <input type="number" name="kd_pos" id="kd_pos" required>
          </div>
          <div class="input-block">
            <label for="signup-email">No Hp</label>
            <input type="number" name="no_hp" id="no_hp" required>
          </div>
        <button type="submit" name="daftar_alamat_baru" class="btn-signup">Continue</button>
        </fieldset>
      </form>
        <fieldset id="ubah" style="display: none">
        	<form class="form form-signup" action="profile_proses.php" method="post">
        	<input id="id" name="id" type="text" hidden value="<?= $sesen_id?>">
        	<div class="input-block">
            <label for="signup-email">Pilih Alamat</label>
            <div class="select-wrap">
                    <select name="amt" id="amt" class="form-control">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <option value="">Pilih Alamat</option>
                      <?php
                      $query = "SELECT * FROM tb_alamat where id_member = $sesen_id";
                      $sql = mysqli_query($koneksi, $query);
                      while($data = mysqli_fetch_array($sql)){
                      echo '<option value="'.$data['id_member'].'">'.$data['alamat'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
          </div>
          <button type="submit" name="pilih_alamat" class="btn-signup">Set Active</button>
          <button type="submit" name="hapus_alamat" class="btn-signup">Hapus</button>
        </form>
        </fieldset>
    </div>
  </div>
</section>
<script>
const switchers = [...document.querySelectorAll('.switcher')]

switchers.forEach(item => {
	item.addEventListener('click', function() {
		switchers.forEach(item => item.parentElement.classList.remove('is-active'))
		this.parentElement.classList.add('is-active')
	})
})

</script>
<script type="text/javascript">
    $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=propinsi>
      $("#prov").change(function(){
        var prov = $("#prov").val();
        $.ajax({
            url: "fungsi/ambilkota.php",
            data: "prov="+prov,
            cache: false,
            success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#kot").html(msg);
            }
        });
      });
      $("#kot").change(function(){
        var kot = $("#kot").val();
        $.ajax({
            url: "fungsi/ambilkecamatan.php",
            data: "kot="+kot,
            cache: false,
            success: function(msg){
                $("#kec").html(msg);
            }
        });
      });
      $(':input:not([type="submit"])').each(function() {
          $(this).focus(function() {
          $(this).addClass('hilite');
          }).blur(function() {
          $(this).removeClass('hilite');});
        });
      }); 

      $(document).ready(function(){
        $('#nama').on('keyup',function(){
          console.log($(this).val());
        });
      });

    </script>
    <script>
    	$('#daftar').click(function(){
    		$('#daftar_alamat').css("display","block");
    		$('#ubah').css("display","none");
    	});
    	$('#pilih').click(function(){
    		$('#ubah').css("display","block");
    		$('#daftar_alamat').css("display","none");
    	});
    </script>
  