<div class="row text-center">
<?php
  while($row = mysqli_fetch_array($hasil1)) 
  {
    $harga = $row['harga_jual'];
    
?>

  <div class="col-md-4">
    <div class="thumbnail">
      <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="title">
        <h4><?php echo $row['nama_barang']; ?></h4>
      </a>
      <img alt="<?php echo $row['nama_barang']; ?>" src="<?php echo $base_url ?>images/produk/<?php echo $row['foto_barang']; ?>"/>
      <div class="caption">
        <h4><strike><?php echo "Rp " .number_format($harga, 0, ',', '.').",-" ?></strike></h4>
        <a href="<?php echo $base_url ?>beli/<?php echo $row['id_barang']; ?>" class="btn btn-primary">Beli</a> 
        <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="btn btn-default">Detail</a>
      </div>
    </div>
  </div>
  
<?php } ?>
</div>