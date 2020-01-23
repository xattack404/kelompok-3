<?php
// error_reporting(0);      
include 'record/record_konsultasi.php';
include 'record/record_login.php';
include 'record/record_member.php'; 
include 'record/record_slider.php';
include 'record/record_supplier.php';
include 'record/record_produk.php';
include 'record/record_topik.php';
// Super Admin Menu
if ($sesen_akses == "admin")
{
  echo "
  <div class='row'>
    <div class='col-lg-3 col-xs-6'>
      <div class='small-box bg-green'>
        <div class='inner'><h3> $produk </h3><p>Produk</p></div>
        <div class='icon'><i class='fa fa-thumbs-up'></i></div>
        <a href='produk_list.php' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3 col-xs-6'>
      <div class='small-box bg-red'>
        <div class='inner'><h3> $member </h3><p>Member</p></div>
        <div class='icon'><i class='fa fa-tag'></i></div>
        <a href='member_list.php' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3 col-xs-6'>
      <div class='small-box bg-red'>
        <div class='inner'><h3> $login </h3><p>User Login</p></div>
        <div class='icon'><i class='fa fa-cart-plus'></i></div>
        <a href='user_list.php' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3 col-xs-6'>
      <div class='small-box bg-red'>
        <div class='inner'><h3> $konsultasi </h3><p>Konsultasi</p></div>
        <div class='icon'><i class='fa fa-plane'></i></div>
        <a href='konsultasi_list.php' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3 col-xs-6'>
      <div class='small-box bg-red'>
        <div class='inner'><h3> $supplier </h3><p>Supplier</p></div>
        <div class='icon'><i class='fa fa-credit-card'></i></div>
        <a href='supplier_list.php' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3 col-xs-6'>
      <div class='small-box bg-purple'>
        <div class='inner'><h3> $slider </h3><p>Slider</p></div>
        <div class='icon'><i class='fa fa-tag'></i></div>
        <a href='slider_list.php' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3 col-xs-6'>
      <div class='small-box bg-orange'>
        <div class='inner'><h3> $topik </h3><p>Konsultasi</p></div>
        <div class='icon'><i class='fa fa-comment-o'></i></div>
        <a href='topik_li.php' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
   </div>
  ";?>

  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <div class="box box-primary">
        <div class="box-body">
          <div class="form-group"><label style="color: blue;">Stok barang Yang kurang dari 10</label><br>
            <?php
            $sql  = "SELECT * FROM tb_barang WHERE jumlah <10";
            $produk2  = mysqli_query($koneksi, $sql); 
            ?>
            <label>Namabarang</label>&nbsp;&nbsp;&nbsp;&nbsp;<label>Jumlah</label><br>
            <?php
            while($row = mysqli_fetch_array($produk2) ) { ?>
            <a href=""><?= $row['nama_barang'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<label><?= $row['jumlah'] ?></a> </label><br>
            <?php } ?>
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <a href="produk_kurang.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- /.box -->
    </div>
   </div>
<?php }?>