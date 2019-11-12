<div class="box">
  <div class="box-body table-responsive padding">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align: center">No.</th>
          <th style="text-align: center">Nama Provinsi</th>
          <th style="text-align: center">Nama Kota</th>
          <th style="text-align: center">Ongkir REG JNE</th>
          <th style="text-align: center">Aksi</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $sql  = "SELECT prov.id_prov,prov.nama_prov,
              kabkot.id_prov,kabkot.id_kabkot,kabkot.nama_kabkot,kabkot.jne_reg
              FROM kabkot
              INNER JOIN prov ON prov.id_prov = kabkot.id_prov
              ORDER BY prov.id_prov ASC ";
      $result = mysqli_query($koneksi, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {
          echo "
          <tr>
            <td valign='top' align='center'>".$no."</td>
            <td style='text-align: left'>".$data['nama_prov']."</td>
            <td style='text-align: center'>".$data['nama_kabkot']."</td>
            <td style='text-align: center'>".$data['jne_reg']."</td>
            <td style='text-align: center'>
              <a href='ongkir_ubah.php?id_kabkot=$data[id_kabkot]'>
                <button type='submit' class='btn btn-primary'>Ubah</button>
              </a>
              <a href='ongkir_hapus.php?id_kabkot=$data[id_kabkot]'>
                <button type='submit' class='btn btn-danger' OnClick=\"return confirm('Apakah Anda yakin?');\">Hapus</button>
              </a>
            </td>
          </tr>";
          $no++;
        }
      }
      else{echo "Belum ada data";}
      ?>
    </tbody>
  </table>
  </div>
</div>