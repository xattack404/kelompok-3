<style>
  .split {
    height: 100%;
    width: 70%;
    position: absolute;
    z-index: 1;
    top: 9px;
    overflow-x: hidden;
    padding-top: 20px;
  }
  /* Control the right side */
  .right {
    right: 0;
  }
</style>
<form method="post" id="form-register" action="register_proses.php">
  <div class="container">
      <div class=" col-lg-8">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Daftar Akun Baru</h1>
              <div class="box box-primary">
                <div class="box-body">
                  <div class="form-group"><label>Nama Lengkap</label>
                    <input class="form-control" name="nama" type="text" id="nama" size="30" required />
                  </div>
                </div>
                <div class="form-group"><label>Alamat</label>
                  <textarea class="form-control" name="alamat" id="alamat" required></textarea>
                </div>
                <div class="form-group"><label>Jenis Kelamin</label><br>
                  <input type="radio" name="jenis_kelamin" value="Laki-laki" style="cursor: pointer;"> Laki-laki
                  <input type="radio" name="jenis_kelamin" value="Perempuan" style="cursor: pointer;"> Perempuan<br>
                </div>
                <div class="row">
                  <div class="col-lg-3"><label>Provinsi</label>
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
                  <div class="col-lg-3"><label>Kabupaten/ Kota</label>
                    <select name="kot" id="kot" class="form-control" required>
                      <option value="">--Pilih Kabupaten/ Kota--</option>
                    </select>
                  </div>
                  <div class="col-lg-3"><label>Kecamatan</label>
                    <select name="kec" id="kec" class="form-control" required>
                      <option value="">--Pilih Kecamatan--</option>
                    </select>
                  </div>
                  <div class="col-lg-3"><label>Kode Pos</label>
                    <input class="form-control" name="kopos" type="number" id="kopos" size="30" />
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-lg-6"><label>No. Telepon</label>
                    <input class="form-control" name="telepon" type="number" id="telepon" size="30" required />
                  </div>
                  <div class="col-lg-6"><label>Email</label>
                    <input class="form-control" name="email" type="text" id="email" size="30" required />
                  </div>
                </div><br />
                <div class="row">
                  <div class="col-lg-6"><label>Password</label>
                    <input class="form-control" name="password" type="password" id="password" size="30" required />
                  </div>
                  <div class="col-lg-6"><label>Konfirmasi Password</label>
                    <input class="form-control" name="password2" type="password2" id="password2" size="30" required />
                  </div>
                </div><br>
              </div><!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
              </div>
            </div>
          </div>
      </div>
    </div>
</form>