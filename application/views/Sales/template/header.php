<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?> | LAPESEN</title>
  <link rel="icon" href="<?= base_url(); ?>assets/img/avatar/icone.png">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap-4/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome/css/all.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/dataTables/css/dataTables.bootstrap4.min.css"> -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/styleSales.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">

  <!-- JS Libraies -->
  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>assets/bootstrap-4/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url(); ?>assets/bootstrap-4/js/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/bootstrap-4/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/bootstrap-4/js/jquery.nicescroll.min.js"></script>
  <!-- <script src="<?= base_url(); ?>assets/dataTables/js/jquery.dataTables.js"></script> -->
  <!-- <script src="<?= base_url(); ?>assets/dataTables/js/dataTables.bootstrap4.min.js"></script> -->
  

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/js/scriptSale.js"></script>
  <script src="<?= base_url('assets/js/jquery.maskMoney.min.js'); ?>"></script>
  <script src="<?= base_url(); ?>assets/sweetalert/sweetalert.min.js"></script>
  <style> 
    @media (min-width: 513px) { #style-1 {width: 80%} }
    @media (min-width: 910px) { #style-1 {width: 90%} }
    #style-1 .judul { width: 100% }
    .media .media-title {
      overflow: hidden;
      white-space: nowrap;
    }

    .styleProduct {
      text-align: center;
      width: 100%;
      margin: 20% 0;
      margin-top: 15%;
    }
  </style>
</head>
<body class="sidebar-mini">
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto text-center" id="style-1">
          <h3 class="text-center mb-0 judul" style="color: #fff">LAPESEN</h3>
        </form>
        <ul class="navbar-nav navbar-right">
          <!-- klo mau nambah menu notifikasi langsung ke websitenya aja (https://getstisla.com/) -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <!-- tai -->
            <img alt="image" src="<?= base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('name'); ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
              <a href="<?= site_url('profile'); ?>" class="dropdown-item has-icon">
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
      <div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href=""><img src="<?= base_url(); ?>assets/img/avatar/icone.png" alt="LP" width="30px"> LaPesen</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href=""><img src="<?= base_url(); ?>assets/img/avatar/icone.png" alt="LP" width="47px"></a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>

              <li class="<?= ($title == 'Dashboard') ? 'active' : ''; ?>"><a class="nav-link" href="<?= site_url('dashboard'); ?>" data-toggle="tooltip"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

              <li class="<?= ($title == 'Sales') ? 'active' : ''; ?>"><a class="nav-link" href="<?= site_url('sales'); ?>" data-toggle="tooltip"><i class="fas fa-cash-register"></i> <span>Transaksi</span></a></li>

              <li class="<?= ($title == 'Data Transaksi') ? 'active' : ''; ?>"><a class="nav-link" href="<?= site_url('datatransaksi'); ?>" data-toggle="tooltip"><i class="fas fa-chart-bar"></i> <span>Data Transaksi</span></a></li>

              <li class="<?= ($title == 'Profile') ? 'active' : ''; ?>"><a class="nav-link" href="<?= site_url('Profile'); ?>" data-toggle="tooltip"><i class="fas fa-cogs"></i> <span>Profile</span></a></li>
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">