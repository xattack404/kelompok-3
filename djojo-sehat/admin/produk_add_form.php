<form action="produk_add_proses.php" method="post" enctype="multipart/form-data">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
  
          <div class="form-group"><label>Nama Barang</label>
            <input class="form-control" name="nama_brg" type="text" id="nama_brg" size="30"
              placeholder="Huruf besar diawal lalu kecil" />
          </div>
          <div class="form-group"><label>Deskripsi Produk</label>
            <textarea class="form-control" rows="10" id="deskripsi_brg" name="deskripsi_brg"></textarea>
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
            <div class="col-xs-3"><label>Harga Beli</label>
              <input class="form-control" name="hrg_beli" type="number" id="hrg_beli" onkeyup="sum();"size="30"
                placeholder="Angka saja" />
            </div>
            <div class="col-xs-3"><label>Laba %</label>
              <input class="form-control" name="laba" type="number" id="laba" onkeyup="sum();" size="30"
                placeholder="Angka saja persen" />
            </div>
            <div class="col-xs-3"><label>Harga Jual</label>
              <input class="form-control" name="hrg_jual" type="number" readonly  id="hrg_jual" size="30"
                placeholder="Angka saja" />
            </div>
          </div><br />
          <div class="row">
            <div class="col-xs-12">
              <p class="bg-danger text-center">laba = (jumlah laba/100) X harga beli ||| harga jual = harga beli + laba</p>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-3"><label>Jumlah Barang</label>
              <input class="form-control" name="jumlah_brg" type="number" id="b" size="30" placeholder="Isi angka saja"
                onkeyup="hitung();" />
            </div>
            <div class="col-xs-3"><label>Berat</label>
              <input class="form-control" name="berat_brg" type="number" id="berat_brg" size="30"
                placeholder="Per Gram" />
            </div>
             <div class="col-xs-4"><label>Satuan</label>
              <br />
              <select name="satuan_brg" id="satuan_brg" class="form-control" required>
                <option value="">--Pilih Satuan--</option>
                <?php
                $query = "SELECT * FROM tb_satuan ORDER BY nama_satuan";
                $sql = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['id_satuan'].'">'.$data['nama_satuan'].'</option>';}
                ?>
              </select>
            </div>
            <div class="col-xs-4"><label>Kategori</label>
              <br />
              <select name="kategori" id="kategori" class="form-control" required>
                <option value="">--Pilih Kategori--</option>
                <?php
                $query = "SELECT * FROM tb_kategori ORDER BY nama_kategori";
                $sql = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['id_kategori'].'">'.$data['nama_kategori'].'</option>';}
                ?>
              </select>
            </div>
            <div class="col-xs-4"><label>Nama Supplier</label>
              <br />
              <select name="supplier" id="supplier" class="form-control" required>
                <option value="">--Pilih Supplier--</option>
                <?php
                $query = "SELECT * FROM tb_supplier ORDER BY nama_supplier";
                $sql = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['id_supplier'].'">'.$data['nama_supplier'].'</option>';}
                ?>
              </select>
            </div>
          </div><br />
          <div class="form-group"><label>* Foto Baru</label><br />
            <input type="file" name="img" id="img" onchange="tampilkanPreview(this,'preview')" required />
            <br><b>Preview Gambar</b><br>
            <img id="preview" src="" alt="" width="35%" />
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
      </div><!-- /.box -->
      <!-- right column -->
    </div>
  </div>
</form>
<script src="../template/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
  function sum() {
      var harga_beli = document.getElementById('hrg_beli').value;
      var laba = document.getElementById('laba').value;
      var labae= (parseInt(harga_beli)/100) * parseInt(laba);
      var result = parseInt(labae) + parseInt(harga_beli);
      if (!isNaN(result)) {
         document.getElementById('hrg_jual').value = result;
      }
}
</script>
<?php
include "../fungsi/imgpreview.php"; // Preview gambar yang akan diupload
include "../fungsi/tinymce.php";    // Editor teks Tinymce + Ajax File/ Photo Manager
?>
