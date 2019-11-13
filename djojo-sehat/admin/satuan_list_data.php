<div class="box">
  <div class="box-body table-responsive padding">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align: center">No.</th>
          <th >Nama Satuan Barang</th>
          <th style="text-align: center">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
      $sql = "SELECT * FROM tb_satuan ORDER BY nama_satuan ASC";
      $result = mysqli_query($koneksi, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {
          echo "<tr>
                  <td valign='top' align='center'>".$no."</td>
                  <td style='text-align: left'>".$data['nama_satuan']."</td>
                  <td style='text-align: center'>
                    <a href='satuan_hapus.php?id_sat=$data[id_satuan]'>
                      <button type='submit' title='Hapus Data' class='btn btn-danger btn-xs' OnClick=\"return confirm('Apakah Anda yakin?');\"><i
                class='glyphicon glyphicon-trash'></i>
                </button>
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