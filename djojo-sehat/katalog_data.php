<?php
// Mengambil nilai berdasarkan halaman dengan metode GET
if(isset($_GET['halaman']))
{
  $halaman = mysqli_real_escape_string($koneksi,$_GET['halaman']);
}
  else
  {
    $halaman = 1;
  }

// Limit/ batas data yang ditampilkan per halaman
$per_halaman = 6;

// Penempatan awal data yang ditampilkan dalam tiap halaman
if($halaman > 1)
{
  $start = ($halaman * $per_halaman - $per_halaman);
}
  else
  {
    $start = 0;
  }

// Memanggil data dari tabel produk diurutkan dengan id_barang secara DESC dan dibatasi sesuai $start dan $per_halaman
$data     = mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY id_barang DESC LIMIT $start, $per_halaman");
$numrows  = mysqli_num_rows($data);
?>

  <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-10 order-md-last">
            <?php include "modul/mod_kategori.php" ?>
            <div class="row">
<?php
// Jika data ketemu, maka akan ditampilkan dengan While
if($numrows > 0)
{
  while($row = mysqli_fetch_assoc($data))
  {
    $harga_normal = number_format($row['harga_jual'], 0, ',', '.').",-";
?>

              <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                <div class="product d-flex flex-column" style="max-height: 354.98px;max-width: 236.65px">
                  <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="img-prod"><img class="img-fluid" src="<?php echo $base_url ?>images/produk/<?php echo $row['foto_barang']; ?>" alt="<?php echo $row['nama_barang']; ?>">
                  </a>
                  <div class="text py-3 pb-4 px-3">
                    <div class="d-flex">
                      <div class="cat">
                        <span>Lifestyle</span>
                      </div>
                      <div class="rating">
                        <p class="text-right mb-0">
                          <a href="#"><span class="ion-ios-star-outline"></span></a>
                          <a href="#"><span class="ion-ios-star-outline"></span></a>
                          <a href="#"><span class="ion-ios-star-outline"></span></a>
                          <a href="#"><span class="ion-ios-star-outline"></span></a>
                          <a href="#"><span class="ion-ios-star-outline"></span></a>
                        </p>
                      </div>
                    </div>
                    <h3><a href="#"><?php echo $row['nama_barang']; ?></a></h3>
                    <div class="pricing">
                      <p class="price"><span>Rp <?php echo $harga_normal ?></span></p>
                    </div>
                    <p class="bottom-area d-flex px-3">
                      <a href="<?php echo $base_url ?>beli/<?php echo $row['id_barang']; ?>" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                      <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="buy-now text-center py-2">Detail<span><i class="ion-ios-cart ml-1"></i></span></a>
                    </p>


                  </div>
                </div>
              </div>
  <?php
  // Mengakhiri pengulangan while
  }
  ?>
            </div>
  
          </div>
        </div>
      </div>
      <?php
  // Menghitung Data pada tabel produk
  $count    = mysqli_query($koneksi, "SELECT * FROM tb_barang ");
  $total    = mysqli_num_rows($count);

  // Membuat variabel halamans dari hasil pembagian $total dan per_halaman menggunakan ceil (penggenapan koma keatas)
  $halamans = ceil($total / $per_halaman);

  echo "<div class='row mt-5'>
                <div class='col text-center'>
                  <div class='block-27'>
                    <ul>";

  // Melakukan pengulangan penampilan nomor paging
  for($x = 1; $x <= $halamans; $x++)
  {
    // Apabila berada di suatu halaman
    if($halaman == $x)
    {
      // Maka akan membuat angka di tombol paging menjadi cetak tebal dan tidak bisa diklik
      echo "<li><a href='#'><b>$x</b></a>";
    }
      else
      {
        // Jika tidak akan seperti biasa dan dapat diklik
        echo "<li><a href='$base_url"."katalog/halaman/".$x."/'>".$x."</a></li>";
      }
      echo "</li>";
  }
  echo "</ul>
                  </div>
                </div>
              </div>";
}
  else
  {
    echo "<script>alert('Data tidak ditemukan');location.replace('$base_url')</script>";
  }
?><!-- 
<div class="row mt-5">
                <div class="col text-center">
                  <div class="block-27">
                    <ul>
                      <li><a href="#">&lt;</a></li>
                      <li class="active"><span>1</span></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">&gt;</a></li>
                    </ul>
                  </div>
                </div>
              </div> -->
    </section>
  
