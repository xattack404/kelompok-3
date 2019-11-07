<?php
$id  = mysqli_real_escape_string($koneksi, $_GET['id']);
$sql      = "SELECT * FROM tb_member WHERE id_member = '$id' ";
$result   = mysqli_query($koneksi, $sql);
$data     = mysqli_fetch_array($result);
?>
<form action="user_ubah_proses.php" method="post">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-body">
          <input type="hidden" name="id" class="form-control" value="<?php echo $data['id_member'] ?>" />
          <div class="form-group"><label>Nama</label>
            <input type="text" name="nama" class="form-control" required value="<?php echo $data['nama'] ?>" />
          </div>
          <div class="form-group"><label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required value="<?php echo $data['alamat'] ?>"/>
          </div>
          <div class="form-group"><label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" required value="<?php echo $data['tempat_lahir'] ?>"/>
          </div>
          <div class="form-group"><label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required value="<?php echo $data['tanggal_lahir'] ?>"/>
          </div>
          <div class="form-group"><label>Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" required value="<?php echo $data['kecamatan'] ?>"/>
          </div>
          <div class="form-group"><label>Kabupaten</label>
            <input type="text" name="kabupaten" class="form-control" required value="<?php echo $data['kabupaten_kota'] ?>" />
          </div>
          <div class="form-group"><label>Provinsi</label>
            <input type="text" name="provinsi" class="form-control" required value="<?php echo $data['Provinsi'] ?>" />
          </div>
          <div class="form-group"><label>Kode Pos</label>
            <input type="text" name="kd_pos" class="form-control" required value="<?php echo $data['kode_pos'] ?>"/>
          </div>
          <div class="form-group"><label>Email</label>
            <input type="text" name="email" class="form-control" required value="<?php echo $data['email'] ?>"/>
          </div>
          <div class="form-group"><label>No HP</label>
            <input type="number" name="hp" class="form-control" required value="<?php echo $data['no_hp'] ?>"/>
          </div>
          <div class="form-group"><label>Password</label>
            <input type="password" name="password" class="form-control" required value="<?php echo $data['password'] ?>"/>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <button type="reset" name="reset" class="btn btn-danger" >Reset</button>
        </div>
      </div>
    </div>
  </div>
</form>
