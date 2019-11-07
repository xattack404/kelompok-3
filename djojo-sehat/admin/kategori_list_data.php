<div class="box">
  <div class="box-body table-responsive padding">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align: center">No.</th>
          <th style="text-align: center">Nama Kategori</th>
          <th style="text-align: center">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
      $sql = "SELECT * FROM tb_kategori ORDER BY nama_kategori ASC";
      $result = mysqli_query($koneksi, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {
          echo "<tr>
                  <td valign='top' align='center'>".$no."</td>
                  <td style='text-align: left'>".$data['nama_kategori']."</td>
                  <td style='text-align: center'>
                    <a href='kategori_ubah.php?id_kat=$data[id_kategori]'>
                      <button type='submit' class='btn btn-primary'>Ubah</button>
                    </a>
                    <a href='kategori_hapus.php?id_kat=$data[id_kategori]'>
                      <button type='submit' class='btn btn-danger' OnClick=\"return confirm('Apakah Anda yakin?');\">Hapus</button>
                    </a>
                  </td>
                </tr>";
                $no++;
        }
      }
      else
      {
        echo "Belum ada data";
      }
    ?>
      </tbody>
    </table>
  </div>
</div>