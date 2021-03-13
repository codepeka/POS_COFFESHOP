
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?> | LAPESEN</title>
  <link rel="icon" href="<?= base_url(); ?>assets/img/avatar/icone.png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap-4/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dataTables/css/dataTables.bootstrap4.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">

  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>assets/bootstrap-4/js/jquery-3.3.1.min.js"></script>
  <script src="assets/bootstrap-4/js/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/bootstrap-4/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/bootstrap-4/js/jquery.nicescroll.min.js"></script>
  <!-- <script src="<?= base_url(); ?>assets/bootstrap-4/js/moment.min.js"></script> -->
  <script src="<?= base_url(); ?>assets/js/stisla.js"></script>
  <script src="<?= base_url(); ?>assets/dataTables/js/jquery.dataTables.js"></script>
  <script src="<?= base_url(); ?>assets/dataTables/js/dataTables.bootstrap4.min.js"></script>
  
  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>
  <script src="<?= base_url(); ?>assets/sweetalert/sweetalert.min.js"></script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <!-- klo mau nambah menu notifikasi langsung ke websitenya aja (https://getstisla.com/) -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('name'); ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
              <a href="<?= site_url('user'); ?>" class="dropdown-item has-icon">
                <i class="fas fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="login/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href=""><img src="<?= base_url('assets/img/avatar/icone.png'); ?>" alt="LP" width="30px"> LaPesen</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href=""><img src="<?= base_url('assets/img/avatar/icone.png'); ?>" alt="LP" width="47px"></a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="<?= ($title == 'Dashboard') ? 'active' : ''; ?>"><a class="nav-link" href="<?= site_url('dashboard'); ?>"><i class="fas fa-home"></i> <span>Home</span></a></li>

              <li class="menu-header">Pages</li>
              <li class="nav-item dropdown <?= ($title == 'Data Menu' || $title == 'Data Bahan Baku') ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Data</span></a>
                <ul class="dropdown-menu active">
                  <li class="<?= ($title == 'Data Menu') ? 'active' : ''; ?>"><a class="nav-link active" href="<?= site_url('menu'); ?>">Data Menu</a></li>
                  <li class="<?= ($title == 'Data Bahan Baku') ? 'active' : ''; ?>"><a class="nav-link" href="<?= site_url('bahanbaku'); ?>">Data Bahan Baku</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown <?= ($title == 'Laporan Penjualan' || $title == 'Laporan Pengeluaran') ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-archive"></i><span>Data Laporan</span></a>
                <ul class="dropdown-menu active">
                  <li class="<?= ($title == 'Laporan Penjualan') ? 'active' : ''; ?>"><a class="nav-link" href="<?= site_url('laporanPenjualan'); ?>">Laporan Penjualan</a></li>
                  <li class="<?= ($title == 'Laporan Pengeluaran') ? 'active' : ''; ?>"><a class="nav-link active" href="<?= site_url('laporanBahanBaku'); ?>">Laporan Pengeluaran</a></li>
                </ul>
              </li>
              <li class="<?= ($title == 'Data Pengguna') ? 'active' : ''; ?>"><a class="nav-link" href="<?= site_url('user'); ?>"><i class="fas fa-users"></i> <span>Data Pengguna</span></a></li>

              <li class="menu-header">Setting</li>
              <li class="<?= ($title == 'Setting') ? 'active' : ''; ?>"><a class="nav-link" href="<?= site_url('setting'); ?>"><i class="fas fa-cogs"></i> <span>Nama Toko</span></a></li>

              <li class="menu-header">History</li>
              <li class="<?= ($title == 'History') ? 'active' : ''; ?>"><a class="nav-link" href="<?= site_url('history'); ?>"><i class="fas fa-history"></i> <span>History</span></a></li>
            </ul>

            <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div> -->
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
          