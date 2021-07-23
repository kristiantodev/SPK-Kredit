<?php

$dashboard="";
$kriteria="";
$input = "";
$subkriteria = "";
$nasabah="";
$bobot="";
$kredit="";
$layak="";

$uri_segment1 = $this->uri->segment(2);

  if($uri_segment1 == "dashboard") {
    $dashboard = "active";
  } elseif($uri_segment1 == "kriteria" || $uri_segment1 == "input") {
    $kriteria = "active";
  } elseif($uri_segment1 == "subkriteria") {
    $subkriteria = "active";
  } elseif($uri_segment1 == "nasabah") {
    $nasabah = "active";
  } elseif($uri_segment1 == "bobot") {
    $bobot = "active";
  }elseif($uri_segment1 == "kredit") {
    $kredit = "active";
  }elseif($uri_segment1 == "kelayakan") {
    $layak = "active";
  }


?>





<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-warning navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <strong>SPK</strong>
      <span class="brand-text font-weight-light">Kredit Pensiun</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     
      <!-- SidebarSearch Form -->
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?php echo base_url('bagiankredit/dashboard') ?>" class="nav-link <?= $dashboard ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('bagiankredit/kriteria') ?>" class="nav-link <?= $kriteria ?>">
              <i class="nav-icon fas fa-bars"></i> &nbsp;
               Kriteria
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('bagiankredit/subkriteria') ?>" class="nav-link <?= $subkriteria ?>">
              <i class="nav-icon fas fa-columns"></i>&nbsp;
                Subkriteria
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('bagiankredit/bobot') ?>" class="nav-link <?= $bobot ?>">
              <i class="nav-icon fas fa-columns"></i>&nbsp;
                Perhitungan Bobot
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('bagiankredit/nasabah') ?>" class="nav-link <?= $nasabah ?>">
              <i class="nav-icon fas fa-columns"></i>&nbsp;
                Nasabah
            </a>
          </li>
         
          <li class="nav-item">
            <a href="<?php echo base_url('bagiankredit/kredit') ?>" class="nav-link <?= $kredit ?>">
              <i class="nav-icon fas fa-columns"></i>&nbsp;
                Nilai Alternatif
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('bagiankredit/kelayakan') ?>" class="nav-link <?= $layak ?>">
              <i class="nav-icon fas fa-columns"></i>&nbsp;
                Hasil Kelayakan
            </a>
          </li>

          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
