<?php 
session_start();
if(!isset($_SESSION["petugas_username"])) {
  header("Location: login.php");
  exit;
}
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15 text-warning">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-warning" style="font-family: jokerman;">Cafee ITS</div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0 bg-warning">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link text-warning" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt text-warning"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
<?php if($_SESSION['petugas_level'] == 1) { ?>      
      <hr class="sidebar-divider bg-warning">

      <!-- Heading -->
      <div class="sidebar-heading">
        Akses Admin
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog text-warning"></i>
          <span>Setting Admin</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Akses Admin</h6>
            <a class="collapse-item" href="referensi.php">Menu Masakan</a>
            <a class="collapse-item" href="register.php">Registrasi</a>
          </div>
        </div>
      </li>
<?php } ?>
<?php if($_SESSION['petugas_level'] == 1) { ?>      
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link text-warning" href="user.php">
          <i class="fas fa-fw fa-user text-warning"></i>
          <span>User</span></a>
      </li>
<?php } ?>
  <hr class="sidebar-divider bg-warning">

      <div class="sidebar-heading">
        Akses Kasir & Waiter
      </div>
<?php if($_SESSION['petugas_level'] == 1 || $_SESSION['petugas_level'] == 4) { ?>

      <li class="nav-item">
        <a class="nav-link text-warning" href="entriOrderWaiter.php">
          <i class="fas fa-fw fa-shopping-cart text-warning"></i>
          <span>Entri Order</span></a>
      </li>
<?php } ?>

<?php if($_SESSION['petugas_level'] == 1 || $_SESSION['petugas_level'] == 2) { ?>
      <li class="nav-item">
        <a class="nav-link text-warning" href="entriOrderKasir.php">
          <i class="fas fa-fw fa-calculator text-warning"></i>
          <span>Entri Transaksi</span></a>
      </li>
<?php } ?>
      <!-- Divider -->
<?php if($_SESSION['petugas_level'] == 1 || $_SESSION['petugas_level'] == 5 || $_SESSION['petugas_level'] == 4) { ?>
      <hr class="sidebar-divider bg-warning">

      <!-- Heading -->
      <div class="sidebar-heading">
        Akses Pelanggan
      </div>
      <li class="nav-item">
        <a class="nav-link text-warning" href="pageUser.php" target="halamanUser.php">
          <i class="fas fa-fw fa-table text-warning"></i>
          <span>Halaman Pelanggan</span></a>
      </li>
<?php } ?>
       <hr class="sidebar-divider bg-warning">
<?php if($_SESSION['petugas_level'] == 1 || $_SESSION['petugas_level'] == 2 || $_SESSION['petugas_level'] == 3 || $_SESSION['petugas_level'] == 4) { ?>

      <div class="sidebar-heading">
        Laporan
      </div>
      <li class="nav-item">
        <a class="nav-link text-warning" href="pageUser.php" target="halamanUser.php">
          <i class="fas fa-fw fa-table text-warning"></i>
          <span>Laporan</span></a>
      </li>
<?php } ?>
 <hr class="sidebar-divider bg-warning">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 bg-warning" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-warning bg-warning topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
           

            

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-900 small"><?= $_SESSION["petugas_nama_user"]; ?></span>
                <i class="fas fa-user fa-fw"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->