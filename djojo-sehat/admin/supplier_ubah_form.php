<?php
$id  = mysqli_real_escape_string($koneksi, $_GET['id']);
$sql      = "SELECT * FROM tb_supplier WHERE id_supplier = '$id' ";
$result   = mysqli_query($koneksi, $sql);
$data     = mysqli_fetch_array($result);
?>
<form action="supplier_ubah_proses.php" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
          <input type="hidden" name="id" value="<?= $id  ?>">
          <div class="form-group"><label>Nama</label>
            <input type="text" name="nama" class="form-control" required value="<?= $data['nama_supplier'] ?>" />
          </div>
          <div class="form-group"><label>Alamat</label>
            <textarea name="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
          </div>
          <div class="form-group"><label>No HP</label>
            <input type="number" name="no_hp" class="form-control" required value="<?= $data['no_hp'] ?>" />
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