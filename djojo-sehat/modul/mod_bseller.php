<h3>Best Seller</h3>
<hr/>
<div align="center">
  <marquee direction="up" height="175" width="160" scrollamount="3" scrolldelay="1" onMouseOut="this.start()" onMouseOver="this.stop()">
    <p align="center">
    <?php
    $sql    = "SELECT * FROM bseller JOIN produk ON bseller.judul_bs = produk.id_produk ORDER BY no_urut ASC LIMIT 8";
    $result = mysqli_query($conn, $sql);
    $no = 1;
    if (mysqli_num_rows($result) > 0)
    {
      while ($data = mysqli_fetch_array($result)) // Ganti id_barang apabila ingin merubah menjadi seo url ke judul_seo
      {
        echo "<b><font face='arial' size='2' color=red'>".$data['no_urut']."</font></b>
              <a href='$base_url"."produk/".$data['judul_seo'].".html' class='info'>
                <br><font color='blue'>".$data['nama_produk']."</font><br>
                <img id='image' src='$base_url"."images/produk/".$data['img']." ' title='".$data['nama_produk']."' alt='".$data['nama_produk']."' style='width:150px; height:150px;' valign='top'/>
              </a>
              <br/>
              <br/>
              <br/>
              ";
          $no++;
      }
    }
    else
    {
      echo "<div id='description'>Belum ada data.</div>";
    }
    ?>
    </p>
  </marquee>
</div>
