<?php
  // batas threshold 75%
  $threshold = 75;
  // jumlah maksimum produk terkait yg ditampilkan 10 buah
  $maksProduk = 10;

  // array yang nantinya diisi judul produk terkait
  $listProduk = Array();

  // membaca judul produk dari ID tertentu (ID produk acuan)
  // judul ini nanti akan dicek kemiripannya dengan produk yang lain
  $query = "SELECT nama_produk,harga,harga_diskon,img FROM produk WHERE judul_seo = '$id_produk'";
  $hasil = mysqli_query($conn,$query);
  $data  = mysqli_fetch_array($hasil);
  $nama_produk = $data['nama_produk'];

  // membaca semua data produk selain ID produk acuan
  $query = "SELECT id_produk, nama_produk, judul_seo, img FROM produk WHERE id_produk <> '$id_produk'";
  $hasil = mysqli_query($conn,$query);
  while ($data = mysqli_fetch_array($hasil))
  {
    // cek similaritas judul produk acuan dengan judul produk lainnya
    similar_text($nama_produk, $data['nama_produk'], $percent);
    if($percent >= $threshold)
    {
      // jika presentase kemiripan judul di atas threshold
      if (count($listProduk) <= $maksProduk)
      {
        // jika jumlah produk belum sampai batas maksimum, tambahkan ke dalam array
        $listProduk[] =
        "<div class='col-md-4 col-sm-6'>
          <div class='thumbnail'>
            <a href='$base_url"."produk/$data[judul_seo].html' class='title'>
              <h4 align='center'>$data[nama_produk]</h4>
            </a>
            <img alt='$data[nama_produk]' src='$base_url"."images/produk/$data[img]'/>
            <div class='caption' align='center'>
              <a href='$base_url"."beli/$data[id_produk]' class='btn btn-primary'>Beli</a>
              <a href='$base_url"."produk/$data[judul_seo].html' class='btn btn-default'>Detail</a>
            </div>
          </div>
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
