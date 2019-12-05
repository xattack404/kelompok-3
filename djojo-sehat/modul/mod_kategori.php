<h3>Kategori</h3>
<hr/>
  <?php
  // kategori
  $sql = "SELECT * FROM tb_kategori ORDER BY nama_kategori ASC"; // Memanggil kategori/ top kategori
  $result = mysqli_query($koneksi, $sql);
  if (mysqli_num_rows($result) > 0)
  {
    echo '<ul class="list-group">';
    while ($row = mysqli_fetch_assoc($result))
    {
      $id_kat = $row['id_kategori'];
      
                    echo "<li class='list-group-item'><a href='$base_url"."kategori/$row[id_kategori]'>".$row['nama_kategori']."</a></li>";
                  }
                echo '</ul>';
            echo '</li>';
          }
        echo '</ul>';
      echo '</li>';
  ?>
