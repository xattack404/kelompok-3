<?php
$id  = mysqli_real_escape_string($koneksi, $_GET['id']);
$sql      = "SELECT * FROM tb_member WHERE id_member = '$id' ";
$result   = mysqli_query($koneksi, $sql);
$data     = mysqli_fetch_array($result);

?>
<form action="member_ubah_proses.php" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
          <input type="hidden" name="id_member" value="<?= $id ?>">
          <input type="hidden" name="password" value="<?= $data['password'] ?>">
         <!--  <?php var_dump($id) ?> -->
          <div class="form-group"><label>Nama Member</label>
            <input class="form-control" name="nama" type="text" id="nama" size="30"
              placeholder="Huruf besar diawal lalu kecil" value="<?= $data['nama'] ?>"/>
          </div>
          <?php $jk = $data['jenis_kelamin'];
            // var_dump($jk);
          ?>
          
          <div class="form-group"><label>Jenis Kelamin</label><br>
            <?php 
            if ($jk=='Perempuan'){
              echo '<input type="radio" id="jenis_kelamin" name="jenis_kelamin" value ="Laki-laki" > Laki-laki
              <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value ="2" checked >Perempuan ';
            }else{
              echo '<input type="radio" id="jenis_kelamin" name="jenis_kelamin" value ="Perempuan" checked> Laki-laki
              <input type="radio" name="jenis_kelamin" value ="2" >Perempuan ';
            }
          ?>    
            <!-- <input type="radio" name="jenis_kelamin" value="Laki-laki" style="cursor: pointer;"> Laki-laki
            <input type="radio" name="jenis_kelamin" value="Perempuan" style="cursor: pointer;"> Perempuan<br> -->
          </div>
          <div class="form-group"><label>Alamat</label><br><span>jumlah karakter maksimal: 100</span>
            <textarea class="form-control" rows="10" id="alamat" name="alamat" placeholder="alamat Asli" ><?= $data['alamat'] ?></textarea>
            <span id="hitung">100</span> Karakter Tersisa.
          </div>
           
        </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-body">
           <div class="row"> <!-- buka row-->

            <div class="col-xs-6"><label>Provinsi</label>
              <select name="provinsi" id="prov" class="form-control" required style="cursor: pointer;">
              <option value="">--Pilih Provinsi--</option>
                <?php
                $prov = "SELECT * FROM prov ORDER BY nama_prov";
                $result = mysqli_query($koneksi, $prov);
                  while ($dataprov = mysqli_fetch_array($result))
                  {
                    echo "<option value='$dataprov[id_prov]'".($data['provinsi']==$dataprov['id_prov']?' selected':'').">$dataprov[nama_prov]</option>\n";
                  }
                ?>
            </select>
            </div> 
            <div class="col-xs-6"><label>Kabupaten</label>
              <select name="kabupaten" id="kot" class="form-control" required style="cursor: pointer;">
                <option value="">--Pilih Kabupaten/ Kota--</option>
                <?php
                $pro= $data['provinsi'];
                $prov = "SELECT * FROM kabkot where id_prov = '$pro' ORDER BY nama_kabkot";
                $result = mysqli_query($koneksi, $prov);
                  while ($datakab = mysqli_fetch_array($result))
                  {
                    echo "<option value='$datakab[id_kabkot]'".($data['kabupaten_kota']==$datakab['id_kabkot']?' selected':'').">$datakab[nama_kabkot]</option>\n";
                  }
                ?>
              </select>
            </div>
          </div><!-- tutup row--><br>
          <div class="row">
                <div class="col-xs-6"><label>Kecamatan</label>
                  <select name="kecamatan" id="kec" class="form-control" required style="cursor: pointer;">
                    <option value="" >--Pilih Kecamatan--</option>
                    <?php
                    $kabe= $data['kabupaten_kota'];
                    $prov = "SELECT * FROM kec where id_kabkot = '$kabe' ORDER BY nama_kec";
                    $result = mysqli_query($koneksi, $prov);
                      while ($datakec = mysqli_fetch_array($result))
                      {
                        echo "<option value='$datakec[id_kec]'".($data['kecamatan']==$datakec['id_kec']?' selected':'').">$datakec[nama_kec]</option>\n";
                      }
                ?>
                  </select>
                </div>
                <div class="col-xs-6">
                  <div class="form-group"><label>Kode Pos</label>
                    <input type="number" name="kd_pos" class="form-control"value="<?= $data['kode_pos'] ?>" placeholder="angka saja" required />
                  </div>
                </div>
          </div><!-- tutup row--> <br>
          <div class="row">
              <div class="col-xs-6">
                <div class="form-group"><label>Email</label>
                  <input type="text" name="email" class="form-control" value="<?= $data['email'] ?>" placeholder="@gmail/ @ apa saja" required />
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group"><label>No HP</label>
                  <input type="number" value="<?= $data['no_hp'] ?>" name="no_hp" class="form-control" placeholder="angka saja" required />
                </div>
              </div>
          </div><!-- tutup row-->
          
        </div><!-- tutup box body-->
        <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
      </div>
      </div><!-- tutup box-->          
      </div>
    </div>
</form>
