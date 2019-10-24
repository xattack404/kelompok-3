<div class="box">
  <div class="box-body table-responsive padding">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align: center">No.</th>

          <th style="text-align: center">Nama Suplier</th>
          <th style="text-align: center">Alamat</th>
          <th style="text-align: center">No Hp</th>
          <th style="text-align: center">Aksi</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $sql = "SELECT * FROM tb_supplier";
      $result = mysqli_query($koneksi, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {?>
          <tr>
                  <td style="text-align: center"><?= $no++ ?></td>
                  <td style="text-align: left"><?= $data['nama_supplier'] ?></td>
                  <td style="text-align: center"><?= $data['alamat'] ?></td>
                  <td style="text-align: center"><?= $data['no_hp'] ?></td>
                  <td style="text-align: center">
                    <a href="user_ubah.php?id=<?=$data['id_supplier']?>">
                      <button type="submit" class="btn btn-primary">Ubah</button>
                    </a>
                    <a href="user_hapus.php?id=<?=$data['id_supplier']?>">
                      <button type="submit" class="btn btn-danger" OnClick="return confirm('Apakah Anda yakin?');">Hapus</button>
                    </a>
                  </td>
          </tr>
              
       <?php
        }
      } else {echo "Belum ada data";
    }
      
      ?>
      </tbody>
  </table>
  </div>
</div>