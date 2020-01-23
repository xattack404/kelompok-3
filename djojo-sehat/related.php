
<?php
  // batas threshold 75%
  $threshold = 75;
  // jumlah maksimum barang terkait yg ditampilkan 10 buah
  $maksProduk = 10;

  // array yang nantinya diisi judul barang terkait
  $listProduk = Array();

  // membaca judul produk dari ID tertentu (ID barang acuan)
  // judul ini nanti akan dicek kemiripannya dengan produk yang lain
  $query = "SELECT nama_barang,harga_jual,foto_barang FROM tb_barang WHERE judul = '$judul'";
  $hasil = mysqli_query($koneksi,$query);
  $data  = mysqli_fetch_array($hasil);
  $nama_barang = $data['nama_barang'];

  // membaca semua data produk selain ID produk acuan
  $query = "SELECT id_barang, nama_barang, judul, foto_barang FROM tb_barang WHERE id_barang <> '$id_barang'";
  $hasil = mysqli_query($koneksi,$query);
  while ($data = mysqli_fetch_array($hasil))
  {
    // cek similaritas judul produk acuan dengan judul produk lainnya
    similar_text($nama_barang, $data['nama_barang'], $percent);
    if($percent >= $threshold)
    {
      // jika presentase kemiripan judul di atas threshold
      if (count($listProduk) <= $maksProduk)
      {
        // jika jumlah produk belum sampai batas maksimum, tambahkan ke dalam array
        $listProduk[] =
        "<div class='col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex'>
        <div class='product d-flex flex-column' style='height: 354.98px;width: 236.65px'>
            <a href='$base_url"."produk/$data[judul].html' class='img-prod'>
              <h4 align='center'>$data[nama_barang]</h4>
            </a>
            <img alt='$data[nama_barang]'align='' class='img-fluid'src='$base_url"."images/produk/$data[foto_barang]'/>
             <div class='text py-3 pb-4 px-3'>
                    <div class='d-flex'>
                      <div class='cat'>
                        <span>Lifestyle</span>
                      </div>
                      <div class='rating'>
                        <p class='text-right mb-0'>
                          <a href='#'><span class='ion-ios-star-outline'></span></a>
                          <a href='#'><span class='ion-ios-star-outline'></span></a>
                          <a href='#'><span class='ion-ios-star-outline'></span></a>
                          <a href='#'><span class='ion-ios-star-outline'></span></a>
                          <a href='#'><span class='ion-ios-star-outline'></span></a>
                        </p>
                      </div>
                    </div>
                    </div>
            <p class='bottom-area d-flex px-3' align='center'>
              <a href='$base_url"."beli/$data[id_barang]' class='add-to-cart text-center py-2 mr-1'>Beli</a>
              <a href='$base_url"."produk/$data[judul].html' class='buy-now text-center py-2'>Detail</a>
            </p>
        </div>";
      }
    }
  }

  // jika array listproduk tidak kosong, tampilkan listnya
  // jika kosong, maka tampilkan 'tidak ada produk terkait'
  if (count($listProduk) > 0)
  { echo "<ul>";
    for ($i=0; $i<=count($listProduk)-1; $i++)
    {echo $listProduk[$i];}
    echo "</ul>";
  }
  else echo "<p>Tidak ada produk terkait</p>";
?>