<?php
$id_nav     = mysqli_real_escape_string($conn,$_GET['id_navigasi']);
$sql        = "SELECT * FROM tb_navigasi WHERE id_navigasi = '$id_nav' ";
$result     = mysqli_query($koneksi, $sql);
$data       = mysqli_fetch_array($result);
?>

<form action="navigasi_ubah_proses.php" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-body">
          <input name="id_nav" type="hidden" id="id_nav" value="<?php echo $data['id_nav'] ?>">
          <div class="form-group"><label>SEO Deskripsi</label>
            <input type="text" class="form-control" name="seo_deskripsi" id="seo_deskripsi" value="<?php echo $data['seo_deskripsi'] ?>" placeholder="Isilah deskripsi halaman <?php include 'navigasi_judul.php'; ?>">
          </div>
          <div class="form-group"><label>SEO Keywords</label>
            <input type="text" class="form-control" name="seo_keyword" id="seo_keyword" value="<?php echo $data['seo_keyword'] ?>" placeholder="Isilah dengan huruf kecil semua">
          </div>
          <div class="form-group"><label>Isi</label>
            <textarea rows="10" id="isi" name="isi"><?php echo $data['isi'] ?></textarea>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
      </div>
    </div>
  </div>
</form>

<?php include '../fungsi/tinymce.php'; ?>
