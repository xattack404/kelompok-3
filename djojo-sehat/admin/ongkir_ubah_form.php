<?php
$id_kabkot = mysqli_real_escape_string($koneksi,$_GET['id_kabkot']);
$sql       = "SELECT * FROM kabkot WHERE id_kabkot = '$id_kabkot' ";
$result    = mysqli_query($koneksi, $sql);
$data      = mysqli_fetch_array($result);
?>

<form action="ongkir_ubah_proses.php" method="post">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-body">
          <input type="hidden" class="form-control" name="id_kabkot" id="id_kabkot" value="<?php echo $data['id_kabkot'] ?>">
          <div class="form-group"><label>Nama Kabupaten/ Kota</label>
            <input type="text" class="form-control" name="nama_kabkot" id="nama_kabkot" value="<?php echo $data['nama_kabkot'] ?>">
          </div>
          <div class="form-group"><label>Ongkir</label>
            <input type="text" class="form-control" name="jne_reg" id="jne_reg" value="<?php echo $data['jne_reg'] ?>">
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
      </div><!-- /.box -->
      <!-- left column -->
    </div>
  </div>
</form>