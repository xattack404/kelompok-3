<div class="hero-wrap hero-bread" style="background-image: url('<?= $base_url ?>images/produk/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Shop</span></p>
            <h1 class="mb-0 bread">Shop</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 ftco-animate">
            <a href="<?php echo $base_url ?>images/produk/<?php echo $produk['foto_gambar']; ?>" class="image-popup prod-img-bg" title="<?php echo $produk['nama_barang']; ?>" id="fancybox"
        data-fancybox-group="group1"><img src="<?php echo $base_url ?>images/produk/<?php echo $produk['foto_barang']; ?>" class="img-fluid" alt="<?php echo $produk['nama_barang']; ?>"></a>
          </div>
          <div class="col-lg-6 product-details pl-md-5 ftco-animate">
            <h3><?php echo $produk['nama_barang']; ?></h3>
            <div class="rating d-flex">
              <p class="text-left mr-4">
                <a href="#" class="mr-2">5.0</a>
                <a href="#"><span class="ion-ios-star-outline"></span></a>
                <a href="#"><span class="ion-ios-star-outline"></span></a>
                <a href="#"><span class="ion-ios-star-outline"></span></a>
                <a href="#"><span class="ion-ios-star-outline"></span></a>
                <a href="#"><span class="ion-ios-star-outline"></span></a>
              </p>
              <p class="text-left mr-4">
                <a href="#" class="mr-2" style="color: #000;"><span style="color: #bbb;">Kategori</span></a>
              </p>
              <p class="text-left">
                <a href="<?php echo $base_url ?>kategori/<?php echo $produk['kategori']; ?>" class="mr-2" style="color: #000;"><span style="color: #bbb;"><?php echo $produk2['nama_kategori']; ?></span></a>
              </p>
            </div>
            <p class="price"><span> Harga Normal: Rp <?php echo $harga ?></span></p>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.
            </p>
            <div class="row mt-4">
              <div class="col-md-6">
                <div class="form-group d-flex">
                  <div class="select-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="" class="form-control">
                      <option value="">Small</option>
                      <option value="">Medium</option>
                      <option value="">Large</option>
                      <option value="">Extra Large</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="w-100"></div>
              <div class="input-group col-md-6 d-flex mb-3">
                <span class="input-group-btn mr-2">
                  <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                  <i class="ion-ios-remove"></i>
                  </button>
                </span>
                <input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100\">
                <span class="input-group-btn ml-2">
                  <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                  <i class="ion-ios-add"></i>
                  </button>
                </span>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12">
                <p style="color: #000;"><?php echo $produk['jumlah']; ?> available</p>
              </div>
            </div>
            <p><a href="<?php echo $base_url ?>beli/<?php echo $produk['id_barang']; ?>" class="btn btn-primary py-3 px-5">Add to Cart</a></p>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-12 nav-link-wrap">
            <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Deskripsi</a>
              <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Manufacturer</a>
              <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>
            </div>
          </div>
          <div class="col-md-12 tab-wrap">
            
            <div class="tab-content bg-light" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                <div class="p-4">
                  <h3 class="mb-4"><?php echo $produk['nama_barang']; ?></h3>
                  <p><?php echo $produk['deskripsi'];?></p>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                <div class="p-4">
                  <h3 class="mb-4">Manufactured By Nike</h3>
                  <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                <div class="p-4">
                   <?php include "related.php";?>
                 </div>
             </div>
                      
<!-- <div class="row">
  <div class="col-sm-9 col-sm-push-3">
    <div class="thumbnail">
      <div class="col-md-12">
        <h3><a href="#"><?php echo $produk['nama_barang']; ?><!-- </a></h3>
        <hr/>
      </div>
      <div class="col-md-4">
        <a href="<?php echo $base_url ?>images/produk/<?php echo $produk['foto_gambar']; ?>" title="<?php echo $produk['nama_barang']; ?>" id="fancybox" class="thumbnail" data-fancybox-group="group1">
          <img class="img-responsive" src="<?php echo $base_url ?>images/produk/<?php echo $produk['foto_barang']; ?>" alt="<?php echo $produk['nama_barang']; ?>"/>
        </a>
      </div>
      <div class="caption-full">
        <h5><b>Kategori</b>: <a href="<?php echo $base_url ?>kategori/<?php echo $produk['kategori']; ?>"> <?php echo $produk2['nama_kategori']; ?></a><br/>
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
    <?php //include "related.php";?>
  </div>

   <?php// include 'sidebar.php'; ?>
 </div>
 -->
 <script>
    $(document).ready(function(){

    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);

              
                // Increment
            
        });

         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
        
    });
  </script>