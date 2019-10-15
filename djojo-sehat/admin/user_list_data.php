<div class="box">
  <div class="box-body table-responsive padding">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align: center">No.</th>
          <th style="text-align: center">Nama</th>
          <th style="text-align: center">Username</th>
          <th style="text-align: center">No Telp</th>
          <th style="text-align: center">Posisi</th>
          <!-- <th style="text-align: center"></th> -->
          <th style="text-align: center">Aksi</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $sql = "SELECT *, tb_login.id_posisi as no FROM tb_login, tb_posisi WHERE  tb_login.id_posisi = tb_posisi.id_posisi ORDER BY id_login DESC";
      $result = mysqli_query($koneksi, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {?>
          <tr>
                  <td style="text-align: center"><?= $no++ ?></td>
                  <td style="text-align: left"><?= $data['nama'] ?></td>
                  <td style="text-align: center"><?= $data['username'] ?></td>
                  <td style="text-align: center"><?= $data['no_hp'] ?></td>
                  <td style="text-align: center"><?= $data['posisi'] ?></td>
                  <td style="text-align: center">
                    <a href="user_ubah.php?id_user=$data['id_user']">
                      <button type="submit" class="btn btn-primary">Ubah</button>
                    </a>
                    <a href="user_hapus.php?id_user=">
                      <button type="submit" class="btn btn-danger" OnClick="return confirm('Apakah Anda yakin?');">Hapus</button>
                    </a>
                  </td>
          </tr>
              
       <?php
        }
      }
      ?>
      </tbody>
  </table>
  </div>
</div>