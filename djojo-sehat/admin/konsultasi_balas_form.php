<?php
$id_konsultasi     = mysqli_real_escape_string($koneksi,$_GET['id_konsultasi']);
$sql        = "SELECT * FROM tb_konsultasi a 
                LEFT JOIN tb_member b on b.id_member = a.id_member
                LEFT JOIN tb_topik d on d.id_topik = a.id_topik   WHERE a.id_konsultasi = '$id_konsultasi'";
$result     = mysqli_query($koneksi, $sql);
$data       = mysqli_fetch_array($result);
?>

<form action="konsultasi_balas_proses.php" method="post">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
          <input name="id_konsultasi" type="hidden"  value="<?= $data['id_konsultasi'] ?>">
          <input name="id_member" type="hidden" value="<?= $data['id_member'] ?>">
          <input name="id_topik" type="hidden" value="<?= $data['id_topik'] ?>">
          <!-- <?php var_dump($data['id_topik']) ?> -->
          <input name="isi" type="hidden" value="<?= $data['isi_konsultasi'] ?>">
          <input type="hidden"  name="penjawab" value="<?= $sesen_id_user; ?>">
          <!-- <?php var_dump($sesen_id_user) ?> -->
          <div class="row">
            <div class="col-md-6"><label>Nama Member</label>
            <input type="text"  class="form-control"
              value="<?= $data['nama'] ?>" disabled/>
            </div>
            <div class="col-md-6"><label>Topik</label>
            <input type="text"  class="form-control"
              value="<?= $data['nama_topik'] ?>" disabled/>
            </div>
          </div> 
          <div class="form-group"><label for="isi">Isi Konsultasi</label>
            <textarea  class="form-control" disabled><?= $data['isi_konsultasi'] ?></textarea>
            
          </div>
          <div class="form-group">
          <?php if ($data['balas_konsultasi']==''){ ?>
            <label>Balas konsultasi</label>
            <textarea class="form-control" name="balas"></textarea>
          <?php }else{ ?>
            <label>Balas konsultasi</label>
            <textarea class="form-control" name="balas"><?= $data['balas_konsultasi'] ?></textarea>
          </div>
          <?php } ?>         
          
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-success">Balas</button>
          <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
      </div><!-- /.box -->
      <!-- left column -->
    </div>
  </div>
</form>