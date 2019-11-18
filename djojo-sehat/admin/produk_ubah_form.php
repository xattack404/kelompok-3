<?php
$id_barang        = mysqli_real_escape_string($koneksi, $_GET['id_barang']);
$sql              = "SELECT * FROM tb_barang WHERE id_barang = '$id_barang' ";
$result           = mysqli_query($koneksi, $sql);
$data             = mysqli_fetch_array($result);
?>
<form action="produk_ubah_proses.php" method="post" enctype="multipart/form-data">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
          <input name="id_brg" type="hidden" id="id_brg" value="<?php echo $data['id_barang'] ?>">
          <div class="form-group"><label>Nama Barang</label>
            <input class="form-control" name="nama_brg" type="text" id="nama_brg" size="30"
              value="<?php echo $data['nama_barang'] ?>" />
          </div>
          <div class="form-group"><label>Deskripsi Produk</label>
            <textarea class="form-control" rows="10" id="deskripsi_brg"
              name="deskripsi_brg"><?php echo $data['deskripsi'] ?></textarea>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
      <!-- left column -->
    </div>

    <!-- right column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
          <div class="row">
            <div class="col-xs-4"><label>Jenis Barang</label>
              <br />
              <select name="jenis_brg" id="jenis_brg" class="form-control" required>
                <option value="<?php echo $data['jenis'] ?>">--Pilih Jenis--</option>
                <option value="obat">Obat</option>
                <option value="fashion">Fashion</option>
              </select>
            </div>
            <div class="col-xs-4"><label>Satuan</label>
              <br />
              <select name="satuan_brg" id="satuan_brg" class="form-control" required>
                <option value="<?php echo $data['id_satuan'] ?>">--Pilih Satuan--</option>
                <?php
                $sat            = "SELECT * FROM tb_satuan ORDER BY nama_satuan ASC";
                $result         = mysqli_query($koneksi, $sat);
                while($datasat  = mysqli_fetch_array($result))
                {
                  echo "<option value='$datasat[id_satuan]'".($data['id_satuan']==$datasat['id_satuan']?' selected':'').">$datasat[nama_satuan]</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-xs-4"><label>Jumlah Barang</label>
              <input class="form-control" name="jumlah_brg" type="number" id="b" size="30" placeholder="Isi angka saja"
                value="<?php echo $data['jumlah'] ?>" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-3"><label>Berat</label>
              <input class="form-control" name="berat_brg" type="number" id="berat_brg" size="30" placeholder="Per Gram"
                value="<?php echo $data['berat'] ?>" />
            </div>
            <div class="col-xs-3"><label>Harga Beli</label>
              <input class="form-control" name="hrg_beli" type="number" id="hrg_beli" size="30" placeholder="Angka saja"
                value="<?php echo $data['harga_beli'] ?>" />
            </div>
            <div class="col-xs-3"><label>Harga Jual</label>
              <input class="form-control" name="hrg_jual" type="number" id="hrg_jual" size="30" placeholder="Angka saja"
                value="<?php echo $data['harga_jual'] ?>" />
            </div>
            <div class="col-xs-4"><label>Kategori</label>
              <br />
              <select name="kategori" id="kategori" class="form-control" required>
                <option value="">--Pilih Kategori--</option>
                <?php
                $kat            = "SELECT * FROM tb_kategori ORDER BY nama_kategori ASC";
                $result         = mysqli_query($koneksi, $kat);
                while($datakat  = mysqli_fetch_array($result))
                {
                  echo "<option value='$datakat[id_kategori]'".($data['id_kategori']==$datasup['id_kategori']?' selected':'').">$datakat[nama_kategori]</option>\n";
                }
                ?>
              </select>
            </div>
            <div class="col-xs-4"><label>Nama Supplier</label>
              <br />
              <select name="supplier" id="supplier" class="form-control" required>
                <option value="">--Pilih Supplier--</option>
                <?php
                $sup            = "SELECT * FROM tb_supplier ORDER BY nama_supplier ASC";
                $result         = mysqli_query($koneksi, $sup);
                while($datasup  = mysqli_fetch_array($result))
                {
                  echo "<option value='$datasup[id_supplier]'".($data['id_supplier']==$datasup['id_supplier']?' selected':'').">$datasup[nama_supplier]</option>\n";
                }
                ?>
              </select>
            </div>
          </div><br>
          <div class="form-group"><label>Gambar Sebelumnya</label>
            <br />
            <?php echo "<img src='../images/produk/".$data['foto_barang']."' width='150' height='150'>"; ?>
          </div>
          <div class="form-group"><label>Gambar Baru</label>
            <input type="file" name="img" id="img" onchange="tampilkanPreview(this,'preview')" />
            <br><b>Preview Gambar</b><br>
            <img id="preview" src="" alt="" width="50%" />
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
      </div>
      <!-- right column -->
    </div>
  </div>
</form>

<?php
include "../fungsi/imgpreview.php"; // Preview gambar yang akan diupload
include "../fungsi/tinymce.php";    // Editor teks Tinymce + Ajax File/ Photo Manager
?>
