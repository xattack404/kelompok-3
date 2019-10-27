<form action="member_add_proses.php" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
          <div class="form-group"><label>Nama</label>
            <input type="text" name="nama" class="form-control" required/>
          </div>
          <div class="form-group"><label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required/>
          </div>
          <div class="form-group"><label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" required/>
          </div>
          <div class="form-group"><label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required/>
          </div>
          <div class="form-group"><label>Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" required/>
          </div>
          <div class="form-group"><label>Kabupaten</label>
            <input type="text" name="kabupaten" class="form-control" required/>
          </div>
          <div class="form-group"><label>Kode Pos</label>
            <input type="text" name="kd_pos" class="form-control" required/>
          </div>
          <div class="form-group"><label>Email</label>
            <input type="text" name="email" class="form-control" required/>
          </div>
          <div class="form-group"><label>No HP</label>
            <input type="number" name="hp" class="form-control" required/>
          </div>
          <div class="form-group"><label>Password</label>
            <input type="password" name="password" class="form-control" required/>
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