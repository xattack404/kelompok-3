<?php
include 'header.php';
include 'config/koneksi.php';
?>
<?php
$id = $_GET['id'];
 
$query = mysql_query("select * from siswa where id_siswa='$id'") or die(mysql_error());
 
$data = mysql_fetch_array($query);
?>
<div class="container">

  <div class="card">

    <div class="card-header bg-dark text-white">Entry Form</div>
    <div class="card-body">

      <form method="post" action="">
        <div class="form-group">
          <label for="no_id">No ID</label>
          <input type="text" class="form-control" value="<?php echo $id; ?>" name="noid" id="no_id" disabled>
      </div>
        <div class="form-group">
          <label for="nama_merk">Nama Siswa</label>
          <input type="text" class="form-control"  name="namasiswa" id="nama" value="<?php echo $data['nama_siswa']; ?>">
        </div>
        <div class="form-group">
         <label for="alamat">Alamat anda:</label>
        <textarea type="text" class="form-control" name="alamat" id="alamat"> <?php echo $data['alamat_siswa']; ?></textarea>
    </div>
        <div class="form-group">
      <label for="jk">Jenis Kelamin:</label>
       <select class="form-control" name="jk" id="jk">
        <option value="L" <?php if($data['jenis_kelamin'] == "L"){ echo " selected"; }?> >Laki-Laki</option>
        <option value="P" <?php if($data['jenis_kelamin'] == "P"){ echo " selected"; }?> >Perempuan</option>
      </select>
    </div>
        <div class="form-group">
      <label for="agama">Agama:</label>
       <select class="form-control" name="agama" id="agama">
        <option value="1" <?php if($data['id_agama'] == 1){ echo " selected"; }?> >Islam</option>
        <option value="2" <?php if($data['id_agama'] == 2){ echo " selected"; }?> >Kristen</option>
        <option value="3" <?php if($data['id_agama'] == 3){ echo " selected"; }?> >Katolik</option>
        <option value="4" <?php if($data['id_agama'] == 4){ echo " selected"; }?> >Hindu</option>
        <option value="5" <?php if($data['id_agama'] == 5){ echo " selected"; }?> >Budha</option>
        <option value="6" <?php if($data['id_agama'] == 6){ echo " selected"; }?> >Konghucu</option>
      </select>

    </div>
       <div class="form-group">
          <label for="asalsekolah">Asal Sekolah</label><input type="text" class="form-control"  name="asalsekolah" id="asalsekolah" value="<?php echo $data['sekolah_asal']; ?>">
        </div>
        
        <div class="form-group">
    <button type="submit" name="simpan" class="btn btn-dark">Simpan Data</button>
    <button type="reset" class="btn btn-warning">Reset</button>
      </form>
    </div>
  </div>
</div>
<?php
include ('footer.php');
?>

<?php
 if (isset($_POST['simpan'])){
//tangkap data dari form
$no_id = $_GET['noid'];
$nama = $_POST['namasiswa'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$agama = $_POST['agama'];
$asalsekolah = $_POST['asalsekolah'];
 
//update data di database sesuai user_id
$query1 = mysql_query("update siswa set nama_siswa='$nama', 
  alamat_siswa='$alamat', jenis_kelamin='$jk', sekolah_asal='$asalsekolah', id_agama='$agama' where id_siswa='$id'") or die(mysql_error());
 
echo "<script>alert('Data berhasil disimpan!');location='v_form2.php';</script>"; 
}
?>