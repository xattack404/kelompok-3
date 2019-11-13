<form method="post" id="form-register" action="send.php">
      <div class="row">
        <div class="col-md-12">
          <h1>Registrasi</h1>
          <p>harap menggunakan data Asli</p>
          <hr>
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group"><label>Nama Lengkap</label>
                <textarea class="form-control" name="nama" type="text" id="nama" size="30" rows="1"
                  placeholder="Nama..." required></textarea>
              </div>
              <div class="form-group"><label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" type="text" placeholder="Alamat..."
                  required></textarea>
              </div>
            </div>
            <div class="form-group"><label>Jenis Kelamin</label>
              <select name="jenis" id="jenis" class="form-control" required>
                <option value="">Jenis Kelamin...</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
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
              <textarea class="form-control" name="kopos" type="text" id="kopos" size="30" rows="1"
                placeholder="Kode Pos..." required></textarea>
            </div>
            <div class="form-group"><label>Email</label>
              <textarea class="form-control" name="email" type="text" id="email" rows="1" size="30"
                placeholder="Email..." required></textarea>
            </div>
          </div>
          <div class="form-group"><label>No. Telepon</label>
            <textarea class="form-control" name="telepon" type="number" id="telepon" size="30" placeholder="No.Telp..."
              rows="1" required></textarea>
          </div>
          <div class="form-group"><label>Password</label>
          <textarea class="form-control" name="password" type="password" id="password" size="30"
            placeholder="Password..." rows="1" required></textarea>
        </div>
        
        
        <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
        </div>
      </div><br />
  </div><!-- /.box-body -->
</div>
</div>
</div>
</form>