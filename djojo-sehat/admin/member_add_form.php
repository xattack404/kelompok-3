<form action="member_add_proses.php" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
          <div class="form-group"><label>Nama Member</label>
            <input class="form-control" name="nama" type="text" id="nama" size="30"
              placeholder="Huruf besar diawal lalu kecil" />
          </div>
          <div class="form-group"><label>Jenis Kelamin</label><br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki" style="cursor: pointer;"> Laki-laki
            <input type="radio" name="jenis_kelamin" value="Perempuan" style="cursor: pointer;"> Perempuan<br>
          </div>
          <div class="form-group"><label>Alamat</label>
            <textarea class="form-control" rows="10" id="alamat" name="alamat" placeholder="alamat Asli"></textarea>
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
                if (mysqli_num_rows($result) > 0)
                {
                  while ($data = mysqli_fetch_array($result))
                  {
                    echo "<option value='$data[id_prov]'>$data[nama_prov]</option>\n";
                  }
                }
                  else
                  {
                    echo "Belum ada data";
                  }
                ?>
            </select>
            </div> 
            <div class="col-xs-6"><label>Kabupaten</label>
              <select name="kabupaten" id="kot" class="form-control" required style="cursor: pointer;">
                <option value="">--Pilih Kabupaten/ Kota--</option>
              </select>
            </div>
          </div><!-- tutup row--><br>
          <div class="row">
                <div class="col-xs-6"><label>Kecamatan</label>
                  <select name="kecamatan" id="kec" class="form-control" required style="cursor: pointer;">
                    <option value="" >--Pilih Kecamatan--</option>
                  </select>
                </div>
                <div class="col-xs-6">
                  <div class="form-group"><label>Kode Pos</label>
                    <input type="number" name="kd_pos" class="form-control" placeholder="angka saja" required />
                  </div>
                </div>
          </div><!-- tutup row--> <br>
          <div class="row">
              <div class="col-xs-6">
                <div class="form-group"><label>Email</label>
                  <input type="text" name="email" class="form-control" placeholder="@gmail/ @ apa saja" required />
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group"><label>No HP</label>
                  <input type="number" name="no_hp" class="form-control" placeholder="angka saja" required />
                </div>
              </div>
          </div><!-- tutup row-->
          <div class="form-group"><label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="8-16 karakter" required size="30" />
          </div>
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