
<div class="container-fluid">
<div class="  col-lg-6">
<form method="post" id="form-register" action="register_proses.php">
  <div class="row">
    <div class="col-md-12">
      <h1>Registrasi</h1>
      <p>harap menggunakan data Asli</p><hr>
      <div class="box box-primary">
        <div class="box-body">
            <div class="form-group"><label>Nama Lengkap</label>
              <input class="form-control" name="nama" type="text" id="nama" size="30" required/>
            </div>
          <div class="form-group"><label>Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" required></textarea>
          </div>        
          <div class="form-group"><label>Provinsi</label>
            <select name="prov" id="prov" class="form-control" required>
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
          <div class="form-group"><label>Kabupaten/ Kota</label>
            <select name="kot" id="kot" class="form-control" required>
              <option value="">--Pilih Kabupaten/ Kota--</option>
            </select>
          </div>
          <div class="form-group"><label>Kecamatan</label>
            <select name="kec" id="kec" class="form-control" required>
             <option value="">--Pilih Kecamatan--</option>
            </select>
          </div>
          <div class="form-group"><label>Kode Pos</label>
            <input class="form-control" name="kopos" type="text" id="kopos" size="30"/>
          </div>
            <div class="form-group"><label>Email</label>
              <input class="form-control" name="email" type="text" id="email" size="30" required/>
            </div> 
          </div>
          <div class="form-group"><label>No. Telepon</label>
              <input class="form-control" name="telepon" type="number" id="telepon" size="30" required/>
            </div>
          </div><br/>
          <div class="form-group"><label>Password</label>
              <input class="form-control" name="password" type="password" id="password" size="30" required/>
            </div>
          </div><br/>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
</div>