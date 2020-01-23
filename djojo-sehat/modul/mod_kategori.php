    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/aos.css">

    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>template/Design/css/style.css">
<!-- 
<h3>Kategori</h3>
<hr/>
  <?php
  // kategori
  // $sql = "SELECT * FROM tb_kategori ORDER BY nama_kategori ASC"; // Memanggil kategori/ top kategori
  // $result = mysqli_query($koneksi, $sql);
  // if (mysqli_num_rows($result) > 0)
  // {
  //   echo '<ul class="list-group">';
  //   while ($row = mysqli_fetch_assoc($result))
  //   {
  //     $id_kat = $row['id_kategori'];
      
  //                   echo "<li class='list-group-item'><a href='$base_url"."kategori/$row[id_kategori]'>".$row['nama_kategori']."</a></li>";
  //                 }
  //               echo '</ul>';
  //           echo '</li>';
  //         }
  //       echo '</ul>';
  //     echo '</li>';
  ?>-->
<div class="col-md-4 col-lg-2">
  <div class="sidebar">
    <div class="sidebar-box-2">
      <h2 class="heading">Kategori</h2>
      <div class="fancy-collapse-panel">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Fashion
              </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <ul>
                  <?php
                  $sql ="SELECT * FROM tb_kategori ORDER BY nama_kategori ASC";
                  $result = mysqli_query($koneksi, $sql);
                  if(mysqli_num_rows($result) > 0){
                  while ($row = mysqli_fetch_assoc($result)){
                  $id_kat = $row['id_kategori'];
                  ?>
                  <li><a href=<?=$base_url?>kategori/<?=$row['id_kategori']?>><?= $row['nama_kategori'] ?></a></li>
                  <?php
                  }
                  }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
