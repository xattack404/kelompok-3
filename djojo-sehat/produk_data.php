<div class="row">
  <div class="col-sm-9 col-sm-push-3">
    <div class="thumbnail">
      <div class="col-md-12">
        <h3><a href="#"><?php echo $produk['nama_barang']; ?></a></h3>
        <hr/>
      </div>
      <div class="col-md-4">
        <a href="<?php echo $base_url ?>images/produk/<?php echo $produk['foto_gambar']; ?>" title="<?php echo $produk['nama_barang']; ?>" id="fancybox" class="thumbnail" data-fancybox-group="group1">
          <img class="img-responsive" src="<?php echo $base_url ?>images/produk/<?php echo $produk['foto_barang']; ?>" alt="<?php echo $produk['nama_barang']; ?>"/>
        </a>
      </div>
      <div class="caption-full">
        <h5><b>Kategori</b>: <a href="<?php echo $base_url ?>kategori/<?php echo $produk['kategori']; ?>"> <?php echo $produk['kategori']; ?></a><br/>
        <b>Berat</b>: <?php echo $produk['berat']; ?><br/>

        <b>Stok</b>: <?php echo $produk['jumlah']; ?><br/><br/>
        Harga Normal: Rp <?php echo $harga ?>
        
        </h5><br/>
        <a href="<?php echo $base_url ?>beli/<?php echo $produk['id_barang']; ?>">
          <button type="submit" name="submit" class="btn btn-primary">Beli</button>
        </a>
      </div>

      <br/><br/>

      <div class="caption-full">
        <h6><b>Deskripsi</b>:<br/>
        <?php echo $produk['deskripsi']; ?> </h6>
      </div>
    </div>

    <h3>Produk Terkait</h3>
    <hr/>
    <?php include "related.php";?>

  </div>

  <?php include 'sidebar.php'; ?>
</div>
