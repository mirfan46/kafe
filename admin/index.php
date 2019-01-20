<?php
session_start();
//koneksi ke database
include '../lib/koneksi.php';

if (!isset($_SESSION['admin']))
{
  echo "<script>alert('Anda harus login');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}

?>
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.5
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>Admin - Kafe Wisanggeni</title>
  <!-- Icons-->
  <link href="vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
  <link href="vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <!-- Main styles for this application-->
  <link href="css/style.css" rel="stylesheet">
  <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
  <!-- Global site tag (gtag.js) - Google Analytics-->
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
  <header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
      <img class="navbar-brand-full" src="img/brand/logo.svg" width="89" height="25" alt="CoreUI Logo">
      <img class="navbar-brand-minimized" src="img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="img-avatar" src="img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Account</strong>
          </div>
          <a class="dropdown-item" href="#">
            <i class="fa fa-user"></i> Profile</a>
          <a class="dropdown-item" href="index.php?module=logout">
            <i class="fa fa-lock"></i> Logout</a>
        </div>
      </li>
    </ul>
  </header>
  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
          </li>
          <li class="nav-title">Main Menu</li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle">
              <i class="nav-icon icon-note"></i> Pesanan</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=pesanan">
                  <i class="nav-icon icon-list"></i> List Pesanan</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-user"></i> Karyawan</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=add_karyawan">
                  <i class="nav-icon icon-plus"></i> Add Karyawan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=karyawan">
                  <i class="nav-icon icon-list"></i> List Karyawan</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-people"></i> Pelanggan</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=pelanggan">
                  <i class="nav-icon icon-list"></i> List Pelanggan</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-book-open"></i> Menu</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=add_menu">
                  <i class="nav-icon icon-plus"></i> Add Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=menu">
                  <i class="nav-icon icon-list"></i> List Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=add_kategori_menu">
                  <i class="nav-icon icon-plus"></i> Add Kategori Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=kategori_menu">
                  <i class="nav-icon icon-list"></i> List Kategori Menu</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-grid"></i> Meja</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=add_meja">
                  <i class="nav-icon icon-plus"></i> Add Meja</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=meja">
                  <i class="nav-icon icon-list"></i> List Meja</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=add_jenis_meja">
                  <i class="nav-icon icon-plus"></i> Add Jenis Meja</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=jenis_meja">
                  <i class="nav-icon icon-list"></i> List Jenis Meja</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?module=laporan">
              <i class="nav-icon icon-graph"></i> Laporan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?module=logout">
              <i class="nav-icon icon-logout"></i> Logout
            </a>
          </li>
        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    <main class="main">
      <div class="container-fluid">
        <div class="animated fadeIn">
          <?php
                if (isset($_GET['module']))
                {
                  if ($_GET['module']=="pesanan")
                  {
                    include 'module/pesanan/list_pesanan.php';
                  }
                  if ($_GET['module']=="detail_pesanan")
                  {
                    include 'module/pesanan/detail.php';
                  }
                  if ($_GET['module']=="edit_status")
                  {
                    include 'module/pesanan/edit_status.php';
                  }
                  if ($_GET['module']=="delete_pesanan") 
                  {
                    include 'module/pesanan/delete_pesanan.php';
                  }
                  if ($_GET['module']=="karyawan")
                  {
                    include 'module/karyawan/list_karyawan.php';
                  }
                  if ($_GET['module']=="add_karyawan")
                  {
                    include 'module/karyawan/add_karyawan.php';
                  }
                  if ($_GET['module']=="edit_karyawan")
                  {
                    include 'module/karyawan/edit_karyawan.php';
                  }
                  if ($_GET['module']=="delete_karyawan")
                  {
                    include 'module/karyawan/delete_karyawan.php';
                  }
                  if ($_GET['module']=="pelanggan")
                  {
                    include 'module/pelanggan/list_pelanggan.php';
                  }
                  if ($_GET['module']=="delete_pelanggan") 
                  {
                    include 'module/pelanggan/delete_pelanggan.php';
                  }
                  if ($_GET['module']=="menu") 
                  {
                    include 'module/menu/list_menu.php';
                  }
                  if ($_GET['module']=="add_menu") 
                  {
                    include 'module/menu/add_menu.php';
                  }
                  if ($_GET['module']=="edit_menu") 
                  {
                    include 'module/menu/edit_menu.php';
                  }
                  if ($_GET['module']=="delete_menu") 
                  {
                    include 'module/menu/delete_menu.php';
                  }
                  if ($_GET['module']=="kategori_menu") 
                  {
                    include 'module/kategori_menu/list_kategori_menu.php';
                  }
                  if ($_GET['module']=="add_kategori_menu") 
                  {
                    include 'module/kategori_menu/add_kategori_menu.php';
                  }
                  if ($_GET['module']=="edit_kategori_menu") 
                  {
                    include 'module/kategori_menu/edit_kategori_menu.php';
                  }
                  if ($_GET['module']=="delete_kategori_menu") 
                  {
                    include 'module/kategori_menu/delete_kategori_menu.php';
                  }
                  if ($_GET['module']=="meja") 
                  {
                    include 'module/meja/list_meja.php';
                  }
                  if ($_GET['module']=="add_meja") 
                  {
                    include 'module/meja/add_meja.php';
                  }
                  if ($_GET['module']=="edit_meja") 
                  {
                    include 'module/meja/edit_meja.php';
                  }
                  if ($_GET['module']=="delete_meja") 
                  {
                    include 'module/meja/delete_meja.php';
                  }
                  if ($_GET['module']=="jenis_meja") 
                  {
                    include 'module/jenis_meja/list_jenis_meja.php';
                  }
                  if ($_GET['module']=="add_jenis_meja") 
                  {
                    include 'module/jenis_meja/add_jenis_meja.php';
                  }
                  if ($_GET['module']=="edit_jenis_meja") 
                  {
                    include 'module/jenis_meja/edit_jenis_meja.php';
                  }
                  if ($_GET['module']=="delete_jenis_meja") 
                  {
                    include 'module/jenis_meja/delete_jenis_meja.php';
                  }
                  if ($_GET['module']=="laporan") 
                  {
                    include 'module/laporan/laporan.php';
                  }
                  if ($_GET['module']=="logout") 
                  {
                    include 'logout.php';
                  }
                  if ($_GET['module']=="kosongkan_meja") 
                  {
                    include 'module/meja/kosong.php';
                  }
                }
                else
                {
                  include 'module/home/home.php';
                }
              ?>
        </div>
      </div>
    </main>
  </div>
  <footer class="app-footer">
    <div>
      <a href="https://coreui.io">CoreUI</a>
      <span>&copy; 2018 creativeLabs.</span>
    </div>
    <div class="ml-auto">
      <span>Powered by</span>
      <a href="https://coreui.io">CoreUI</a>
    </div>
  </footer>
  <!-- CoreUI and necessary plugins-->
  <script src="vendors/jquery/js/jquery.min.js"></script>
  <script src="vendors/popper.js/js/popper.min.js"></script>
  <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendors/pace-progress/js/pace.min.js"></script>
  <script src="vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
  <script src="vendors/@coreui/coreui/js/coreui.min.js"></script>
  <!-- Plugins and scripts required by this view-->
  <script src="vendors/chart.js/js/Chart.min.js"></script>
  <script src="vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>