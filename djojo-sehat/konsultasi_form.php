<form action="" method="post">
  <div class="row">
  <div class="col-md-6 ">
    <h6>konsultasi sebelumnya</h6>
    <!-- <div class="thumbnail"> -->
      <!-- <div class="box-body table-responsive padding"> -->
       <table id="example1" class="table">
       <thead>
        <tr>
          <th style="text-align: center">no</th>
          <th >Topik</th>
          <th style="text-align: center">isi konsultasi</th>
          <th>balasan</th>
        </tr>
      </thead>
      <tbody>

        <?php
      error_reporting(0);
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
                  <td><?= $data['balas_konsultasi'] ?></td>
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
  <div class="col-md-6">
      <div class="box">
      <div id="form">
          <form action="" method="post">
            <div class="offset-4 col-lg-4">
            <div class="form-group">
              <label>Topik</label>
              <select name="topik" id="topik" class="form-control" required>
                  <option value="">--Pilih topik--</option>
                  <?php
                  $query = "SELECT * FROM tb_topik ORDER BY nama_topik";
                  $sql = mysqli_query($koneksi, $query);
                  while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['id_topik'].'">'.$data['nama_topik'].'</option>';}
                  ?>
                </select>
            </div>
            <div class="form-group">
              <label>isi konsultasi</label>
              <input type="text" name="isi" class="form-control" required>
            </div>
            <div class="form-group">

              <input type="submit" name="konsultasi" value="Konsultasi" class="btn btn-success">
          </div>
        </div>
      </div>
  </div>
 
  </form>


  <?php 
   
   if (isset($_POST['konsultasi'])){
     $topik = $_POST['topik'];
     $isi = $_POST['isi'];
     $sesen_id = $_SESSION['id_member'];
    $sql = "INSERT INTO tb_konsultasi VALUES ('', '$sesen_id', '$topik', '$isi', ' ', '1')";
    if(mysqli_query($koneksi, $sql)) 
      {
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('konsultasi.html')</script>";
      } 
        else 
        {
          echo "Error updating record: " . mysqli_error($koneksi);
        }
   }
  
  
  ?>
