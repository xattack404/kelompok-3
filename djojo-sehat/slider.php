<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="border:2px solid;">
      <div class="carousel-inner" style="width:100%;height:600px;margin:auto">
        <?php
        //membuat query
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_slider ORDER BY id_slider ASC");
        while($row = mysqli_fetch_assoc($sql))
        {
          echo '
          <div class="item '; if($row['active'] == 1){ echo 'active'; } echo '">
            <img class="img-fluid" style="margin-left:auto;margin-right:auto" alt="Cinque Terre" src="'.$base_url.'images/slider/'.$row['gambar'].'" title="'.$row['judul_slider'].'" alt="'.$row['judul_slider'].'" />
            <div class="carousel-caption">
              <h1 class="carousel-caption-header"></h1>
              <p class="carousel-caption-text hidden-sm hidden-xs"></p>
            </div>
          </div>
          ';
        }
        ?>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>