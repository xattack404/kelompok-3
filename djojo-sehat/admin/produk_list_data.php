<div class="box">
  <div class="box-body table-responsive padding">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align: center">No.</th>
          <th style="text-align: center">Judul Barang</th>
          <th style="text-align: center">Kategori</th>
          <th style="text-align: center">SubKat</th>
          <th style="text-align: center">Supersub Kat</th>
          <th style="text-align: center">Harga</th>
          <th style="text-align: center">Aksi</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $sql = "SELECT a.id_produk,a.nama_produk,a.harga_diskon,
              b.judul_kat as kat, c.judul_subkat as subkat, d.judul_supersubkat as supersubkat 
              FROM produk a 
              LEFT JOIN kategori b on b.id_kat = a.kat 
              LEFT JOIN subkat c on c.id_subkat = a.subkat 
              LEFT JOIN supersubkat d on d.id_supersubkat = a.supersubkat 
              ORDER BY a.id_produk ASC";
      $result = mysqli_query($conn, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {
          $harga_diskon  = number_format($data['harga_diskon'], 0, ',', '.');
          echo "
          <tr>
            <td valign='top' align='center'>".$no."</td>
            <td style='text-align: left'>".$data['nama_produk']."</td>
            <td style='text-align: center'>".$data['kat']."</td>
            <td style='text-align: center'>".$data['subkat']."</td>
            <td style='text-align: center'>".$data['supersubkat']."</td>
            <td style='text-align: center'>$harga_diskon </td>
            <td style='text-align: center'>
              <a href='produk_ubah.php?id_produk=$data[id_produk]' '>
                <button type='submit' class='btn btn-primary'>Ubah</button>
              </a>
              <a href='produk_hapus.php?id_produk=$data[id_produk]'>
                <button type='submit' class='btn btn-danger' OnClick=\"return confirm('Apakah Anda yakin?');\">Hapus</button>
              </a>
            </td>
          </tr>";
          $no++;
        }
      }
      else {echo "Belum ada data";}
    ?>
    </tbody>
  </table>
  </div>
</div>