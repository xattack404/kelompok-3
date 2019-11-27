<header class="main-header">
  <a href="home.php" class="logo">
    <span class="logo-mini"><b>APL</b></span>
    <span class="logo-lg"><b>ADMIN PANEL</b></span>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php include "../fungsi/time.php"; ?>
          </a>
        </li>
        <?php
        $kon = "SELECT * FROM tb_konsultasi a 
                LEFT JOIN tb_member b on b.id_member = a.id_member
                LEFT JOIN tb_topik d on d.id_topik = a.id_topik WHERE balas_konsultasi=''"; 
        $kons = mysqli_query($koneksi, $kon);
        $kons_jum = mysqli_num_rows($kons);
        ?>
        <!-- untuk message -->
        <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?= $kons_jum ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">kamu punya <?= $kons_jum ?> konsultasi</li>
              
              <li>
                
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <?php while ($konsultasi = mysqli_fetch_array($kons)) { ?>
                    <a href="konsultasi_balas.php?id_konsultasi=<?=$konsultasi['id_konsultasi'];?>">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?= $konsultasi['email']; ?>
                      </h4>
                      <p><?= $konsultasi['isi_konsultasi'];?></p>
                    </a>
                    <?php }//endforeach; ?>
                  </li>
                  <!-- end message -->
                
                </ul>
              </li>
              <li class="footer"><a href="konsultasi_list.php">See All Messages</a></li>
            </ul>
          </li>
        <!-- tutup message -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="../images/admin.png" width="160px" height="160px" class="user-image" alt="User Image" />
            <span class="hidden-xs">
              <?php
              if ($sesen_akses == "admin"){echo "Halo, $sesen_nama ";}
              if ($sesen_akses == "admin2"){echo "Halo, $sesen_nama ";}
              ?>
            </span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="../images/admin.png" class="img-circle" alt="User Image" />
              <p>
                <?php if ($sesen_akses == "admin" OR "admin2"){echo "$sesen_nama";} ?></p>
              (<?php if($sesen_akses == 'admin'){echo "Admin";} if($sesen_akses == 'admin'){echo "Super Admin";}?>)
            </li>
            <li class="user-body">
              <div class="col-xs-6 text-center">
                <a href='ubah_pass.php?id_user=<?php echo $sesen_id_user ?>' class='btn btn-default btn-flat'>Ubah
                  Password</a>
              </div>
              <div class="col-xs-6 text-center">
                <a href='logout.php' class='btn btn-default btn-flat'>Logout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- Kolom Sebelah Kiri -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image"><img src="../images/admin.png" class="img-circle" alt="User Image" /></div>
      <div class="pull-left info">
        <p><?php if ($sesen_akses == "admin" OR "admin2"){echo "$sesen_nama";} ?></p>
        <p>(<?php if($sesen_akses == 'admin2'){echo "Admin ";}if($sesen_akses == 'admin'){echo "Super Admin";}?>)</p>
      </div>
    </div>

    <?php include "leftbar.php" ?>

  </section>
</aside>
