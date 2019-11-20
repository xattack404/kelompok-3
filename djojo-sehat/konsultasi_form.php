<form action="" method="post">
  <div class="row">
  <div class="col-md-8 ">
    <!-- <div class="thumbnail"> -->
      <!-- <div class="box-body table-responsive padding"> -->
       <table id="example1" class="table">
       <thead>
        <tr>
          <th style="text-align: center">konsultasi.</th>
          <th >Topik</th>
          <th style="text-align: center">isi konsultasi</th>
          <th>balasan</th>
        </tr>
      </thead>
      <tbody>

        <?php
      $sql = "SELECT * FROM tb_konsultasi where id_member = '$sesen_id'";
      $result = mysqli_query($koneksi, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {?>
          echo "<tr>
                  <td valign="top" align="center"><?= $no; ?></td>
                  <td style="text-align: left"><?= $data['topik'] ?></td>
                  <td><?= $data['isi_konsultasi'] ?></td>
                  <td><?= $data['balasan'] ?></td>
                  <td style="text-align: center">
                    <a href="konsultasi_balas.php?id_konsultasi=<?= $data['id_konsultasi']?>" title="Balas" class="btn btn-warning btn-xs"><i
                class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="konsultasi_hapus.php?id_konsultasi=<?= $data['id_konsultasi']?>">
                      <button type="submit" title="Hapus konsultasi" class="btn btn-danger btn-xs" OnClick="return confirm('Apakah Anda yakin?');"><i
                class="glyphicon glyphicon-trash"></i>
                </button>
                    </a>
                  </td>
                </tr>
         <?php
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
  </form>
    <!-- </div> -->
  <!-- </div> -->
  <div class="col-md-4">
    <input onclick="tambah()" class="btn btn-primary" name="baru" value="konsultasi baru">
      <div id="form">
          <form action="" method="post">
          <div class="offset-4 col-lg-4">
          <div class="form-group">
            <label>Topik</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="">--Pilih Kategori--</option>
                <?php
                $query = "SELECT * FROM tb_kategori ORDER BY nama_kategori";
                $sql = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['id_kategori'].'">'.$data['nama_kategori'].'</option>';}
                ?>
              </select>
          </div>
          <div class="form-group pull-right">
            <input type="submit" name="konsultasi" value="Konsultasi" class="btn btn-success">
            <input name="cancel" value="Cancel" class="btn btn-secondary" onclick="cancel()">
          </div>
        </div>
      </div>
  </div>
 
  

</div>