<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 ftco-animate">
        <form action="konsultasi_proses.php?topik=<?php $_GET['topik']?>&isi=<?php $_GET['isi']?>&sesen_id=<?php  ?>" class="billing-form">
          <h3 class="mb-4 billing-heading">
          Konsultasi
          </h3>
          <div class="row align-items-end">
            <div class="col-md-12">
              <div class="form-group">
                <label for="Topik">Topik</label>
                <select name="topik" id="topik" class="form-control" required>
                  <option value="">Pilih Topik</option>
                  <?php
                  $query = "SELECT * FROM tb_topik ORDER BY nama_topik";
                  $sql = mysqli_query($koneksi, $query);
                  while($data = mysqli_fetch_array($sql)){echo '<option value="'.$data['id_topik'].'">'.$data['nama_topik'].'</option>';}
                  ?>
                </select>
                <label for="Isi Konsultasi">Isi Konsultasi</label>
                <textarea name="isi" id="isi" cols="30" rows="10" class="form-control"></textarea>
              </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary py-3 px-4">
                <input value="Reset" type="reset" class="btn btn-primary py-3 px-4" name="reset">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<form action="" method="post">
  <section class="ftco-section ftco-cart">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <div class="cart-list">
            <table class="table">
              <thead class="thead-primary">
              <tr class="text-center">
                <th>&nbsp;</th>
                <th>Topik</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>&nbsp;</th>
              </tr>
              </thead>
              <?php
      error_reporting(0);
      $sql = "SELECT * FROM tb_konsultasi LEFT JOIN tb_topik on tb_topik.id_topik = tb_konsultasi.id_topik where id_member = '$sesen_id'";
      $result = mysqli_query($koneksi, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {?>

              <tbody>
                <tr class="text-center">
                  <td class="product-remove">
                    <a href="konsultasi_hapus.php?id_konsultasi=<?= $data['id_konsultasi']?>"OnClick="return confirm('Apakah Anda yakin?');"><span class="ion-ios-close"></span></a>
                  </td>
                  <td class="product-name"><?= $data['nama_topik']?></td>
                  <td class="product-name"><?= $data['isi_konsultasi'] ?></td>
                  <td class="product-name"><?= $data['balas_konsultasi'] ?></td>
                  <td class="product-name">
                    <a href="konsultasi_balas.php?id_konsultasi=<?= $data['id_konsultasi']?>"><span class="ion-ios-arrow-back"></span></a>
                  </td>
                </tr>
          
         <?php
         $no++;
        }
      }
      else
      {?>
        <tbody>
        <tr class="text-center">
          <td class="product-name">Belum Ada Data</td>
        </tr>
     <?php }
    ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>


<!-- <form action="" method="post">
  <div class="row">
  <div class="col-md-6 ">
    <h6>konsultasi sebelumnya</h6>
     <div class="thumbnail">
       <div class="box-body table-responsive padding">
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

        
      </tbody>
    </table>
    </div>
  </form>
    </div> -->
  <!-- </div> -->



<!--   <div class="col-md-6">
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
              <textarea type="text" rows="4" style="width:300px" name="isi" class="form-control" required></textarea>
            </div>
            <div class="form-group">

              <input type="submit" name="konsultasi" value="Konsultasi" class="btn btn-success">
          </div>
        </div>
      </div>
  </div>
 
  </form>-->
  <script src="<?php echo $base_url ?>template/js/jquery.js"></script>
  <script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/popper.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/bootstrap.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.easing.1.3.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.waypoints.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.stellar.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/owl.carousel.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/aos.js"></script>
  <script src="<?= $base_url ?>template/Design/js/jquery.animateNumber.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/bootstrap-datepicker.js"></script>
  <script src="<?= $base_url ?>template/Design/js/scrollax.min.js"></script>
  <script src="<?= $base_url ?>template/Design/js/main.js"></script>



<?php 
   
   if (isset($_POST['submit'])){
     $topik = $_POST['topik'];
     $isi = $_POST['isi'];
     $sesen_id = $_SESSION['id_member'];
    $query = mysqli_query($koneksi,"INSERT INTO tb_konsultasi VALUES ('', '$sesen_id', '$topik', '$isi', ' ', '1')");
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('konsultasi.php')</script>";
   }
  
  
  ?>
