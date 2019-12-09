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

<?php
// Jika data ketemu, maka akan ditampilkan dengan While
if($numrows > 0)
{
  while($row = mysqli_fetch_assoc($data))
  {
    $harga_normal = number_format($row['harga_jual'], 0, ',', '.').",-";
?>
  <div class="col-md-4">
    <div class="thumbnail" style ="margin-left:14px;">
      <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="title">
        <h4><?php echo $row['nama_barang']; ?></h4>
      </a>
      <img style ="height:200px;" alt="<?php echo $row['nama_barang']; ?>" src="<?php echo $base_url ?>images/produk/<?php echo $row['foto_barang']; ?>" style="width: 200px;"/>
      <div class="caption">
        <h4>Rp <?php echo $harga_normal ?></h4>
        <a href="<?php echo $base_url ?>beli/<?php echo $row['id_barang']; ?>" class="btn btn-primary">Beli</a>
        <a href="<?php echo $base_url ?>produk/<?php echo $row['judul']; ?>.html" class="btn btn-default">Detail</a>
      </div>
    </div>
  </div>
  <?php
  // Mengakhiri pengulangan while
  }
  ?>

  <?php
  // Menghitung Data pada tabel produk
  $count    = mysqli_query($koneksi, "SELECT * FROM tb_barang ");
  $total    = mysqli_num_rows($count);

  // Membuat variabel halamans dari hasil pembagian $total dan per_halaman menggunakan ceil (penggenapan koma keatas)
  $halamans = ceil($total / $per_halaman);

  echo "<div class='col-md-12'><h4 align='center'>Halaman: </h4>";
  echo "<nav align='center'><ul class='pagination'>";

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
        echo "<li><a href='$base_url"."katalog/halaman/".$x."/'>".$x."</a>";
      }
      echo "</li>";
  }
  echo "</ul></nav></div>";
}
  else
  {
    echo "<script>alert('Data tidak ditemukan');location.replace('$base_url')</script>";
  }
?>
