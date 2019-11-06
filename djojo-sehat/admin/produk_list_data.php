<div class="box">
  <div class="box-body table-responsive padding">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align: center">No.</th>
          <th style="text-align: center">Nama Barang</th>
          <th style="text-align: center">Kategori</th>
          <th style="text-align: center">Harga</th>
          <th style="text-align: center">Jumlah</th>
          <th style="text-align: center">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
      $sql = "SELECT a.id_barang, a.nama_barang, a.jumlah, a.harga_jual,
              b.nama_kategori as kategori 
              FROM tb_barang a 
              LEFT JOIN tb_kategori b on b.id_kategori = a.kategori 
              ORDER BY a.id_barang ASC";
              
      $result = mysqli_query($koneksi, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {
          $harga_jual  = number_format($data['harga_jual'], 0, ',', '.');
          echo "
          <tr>
            <td valign='top' align='center'>".$no."</td>
            <td style='text-align: left'>".$data['nama_barang']."</td>
            <td style='text-align: center'>".$data['kategori']."</td>
            <td style='text-align: center'>$harga_jual. </td>
            <td style='text-align: center'>".$data['jumlah']."</td>
            <td style='text-align: center'>
              <a href='produk_ubah.php?id_barang=$data[id_barang]' title='ubah Data' class='btn btn-warning btn-xs'><i
                class='glyphicon glyphicon-pencil'></i>
              </a>
              <a href='produk_hapus.php?id_barang=$data[id_barang]'>
                <button type='submit' title='Hapus Data' class='btn btn-danger btn-xs' OnClick=\"return confirm('Apakah Anda yakin?');\"><i
                class='glyphicon glyphicon-trash'></i></button>
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
