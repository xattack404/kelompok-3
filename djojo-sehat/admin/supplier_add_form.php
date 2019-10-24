<form action="supplier_add_proses.php" method="POST" enctype="multipart/form-data">
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
          <div class="form-group"><label>No HP</label>
            <input type="number" name="hp" class="form-control" required/>
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