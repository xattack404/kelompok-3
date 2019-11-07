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
