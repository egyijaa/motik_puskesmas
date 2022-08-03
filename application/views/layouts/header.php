<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MotikPunye</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/fontawesome-free/css/all.min.css?t=<?php echo time();?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/adminlte.min.css?t=<?php echo time();?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/sweetalert2/sweetalert2.min.css?t=<?php echo time();?>">
    <!-- Toastr -->
    <link rel="stylesheet"
        hhref="<?php echo base_url(); ?>/assets/adminLte/plugins/toastr/toastr.min.css?t=<?php echo time();?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?t=<?php echo time();?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css?t=<?php echo time();?>">

        <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css?t=<?php echo time();?>">
    <!-- Select2 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/select2/css/select2.min.css?t=<?php echo time();?>">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?t=<?php echo time();?>">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css?t=<?php echo time();?>">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css?t=<?php echo time();?>">
    <!-- iCheck -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css?t=<?php echo time();?>">
    <!-- JQVMap -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/jqvmap/jqvmap.min.css?t=<?php echo time();?>">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/daterangepicker/daterangepicker.css?t=<?php echo time();?>">
    <!-- daterange picker -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/daterangepicker/daterangepicker.css?t=<?php echo time();?>">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css?t=<?php echo time();?>">


    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js?t=<?php echo time();?>">
        </script>
        <!-- SweetAlert2 -->
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/sweetalert2/sweetalert2.min.js?t=<?php echo time();?>">
        </script>

 
    <script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>


</head>

<?php if($this->session->userdata('masuk')==TRUE):?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url().'index.php/Welcome/home'?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link noHover text-dark">Akun: <?php echo $this->session->userdata('ses_nama') ?></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <?php if ($this->session->userdata('ses_role')=='' || $this->session->userdata('ses_role')==null) : ?>
      <li class="nav-item dropdown">
          <a class="nav-link btn btn-default" href="<?php echo base_url().'index.php/Welcome/daftarMintaAkses'?>" role="button">
            Permintaan Akses <i class="far fa-bell"></i>
            <span class="badge badge-warning"><?php echo $totalMintaAkses?></span>
          </a>
      </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'index.php/Welcome/logout'?>" role="button">
        <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Puskesmas Desa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php if($this->uri->uri_string() == 'Welcome/home') { echo '#';}else{echo base_url().'index.php/Welcome/home';}?>" class="nav-link  <?php if($this->uri->uri_string() == 'Welcome/home') { echo 'active';}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if ($this->session->userdata('ses_role')!='' || $this->session->userdata('ses_role')!=null) : ?>
            <li class="nav-item">
            <a href="<?php if($this->uri->uri_string() == 'Welcome/riwayat') { echo '#';}else{echo base_url().'index.php/Welcome/riwayat';}?>" class="nav-link  <?php if($this->uri->uri_string() == 'Welcome/riwayat') { echo 'active';}?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Riwayat Pemeriksaan
              </p>
            </a>
          </li>
          <?php else: ?>
            <li class="nav-item">
            <a href="<?php if($this->uri->uri_string() == 'Welcome/antrian') { echo '#';}else{echo base_url().'index.php/Welcome/antrian';}?>" class="nav-link  <?php if($this->uri->uri_string() == 'Welcome/antrian') { echo 'active';}?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Daftar Antrian Pasien
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php if($this->uri->uri_string() == 'Welcome/daftarMintaAkses') { echo '#';}else{echo base_url().'index.php/Welcome/daftarMintaAkses';}?>" class="nav-link  <?php if($this->uri->uri_string() == 'Welcome/daftarMintaAkses') { echo 'active';}?>">
            <i class="nav-icon fas fa-unlock"></i>
              <p>
                Permintaan Akses <span class="badge badge-warning"><?php echo $totalMintaAkses?></span>
              </p>
            </a>
          </li>
          <?php endif; ?>
          <?php if ($this->session->userdata('akses')=='0') : ?>
          <li class="nav-item has-treeview <?php if($this->uri->uri_string() == 'Welcome/dokter' || $this->uri->uri_string() == 'Welcome/formDokter') { echo 'menu-open';}?>">
            <a href="#" class="nav-link <?php if($this->uri->uri_string() == 'Welcome/dokter' || $this->uri->uri_string() == 'Welcome/formDokter') { echo 'active';}?>">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Dokter
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php if($this->uri->uri_string() != 'Welcome/dokter') { echo 'zoomPilih';}?>">
                <a href="<?php if($this->uri->uri_string() == 'Welcome/dokter') { echo '#';}else{echo base_url().'index.php/Welcome/dokter';}?>" class="nav-link <?php if($this->uri->uri_string() ==  'Welcome/dokter') { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Dokter</p>
                </a>
              </li>
              <li class="nav-item <?php if($this->uri->uri_string() != 'Welcome/form_dokter') { echo 'zoomPilih';}?>">
              <a href="<?php if($this->uri->uri_string() == 'Welcome/formDokter') { echo '#';}else{echo base_url().'index.php/Welcome/formDokter';}?>" class="nav-link <?php if($this->uri->uri_string() ==  'Welcome/formDokter') { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Dokter</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($this->uri->uri_string() == 'Welcome/petugas' || $this->uri->uri_string() == 'Welcome/form_petugas') { echo 'menu-open';}?>">
            <a href="<?php if($this->uri->uri_string() == 'Welcome/petugas') { echo '#';}else{echo base_url().'index.php/Welcome/petugas';}?>" class="nav-link <?php if($this->uri->uri_string() == 'Welcome/petugas' || $this->uri->uri_string() == 'Welcome/form_petugas') { echo 'active';}?>">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Petugas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php if($this->uri->uri_string() != 'Welcome/petugas') { echo 'zoomPilih';}?>">
                <a href="<?php if($this->uri->uri_string() == 'Welcome/petugas') { echo '#';}else{echo base_url().'index.php/Welcome/petugas';}?>" class="nav-link <?php if($this->uri->uri_string() ==  'Welcome/petugas') { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Petugas</p>
                </a>
              </li>
              <li class="nav-item <?php if($this->uri->uri_string() != 'Welcome/form_petugas') { echo 'zoomPilih';}?>">
              <a href="<?php if($this->uri->uri_string() == 'Welcome/form_petugas') { echo '#';}else{echo base_url().'index.php/Welcome/form_petugas';}?>" class="nav-link <?php if($this->uri->uri_string() ==  'Welcome/form_petugas') { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Petugas</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <?php if ($this->session->userdata('ses_role')!='' || $this->session->userdata('ses_role')!=null) : ?>
            <li class="nav-item <?php if($this->uri->uri_string() == 'Welcome/pasien' || $this->uri->uri_string() == 'Welcome/form') { echo 'menu-open';}?>">
            <a href="#" class="nav-link <?php if($this->uri->uri_string() == 'Welcome/pasien' || $this->uri->uri_string() == 'Welcome/form') { echo 'active';}?>">
              <i class="nav-icon fas fa-user-injured"></i>
              <p>
                Pasien
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php if($this->uri->uri_string() != 'Welcome/pasien') { echo 'zoomPilih';}?>">
                <a href="<?php if($this->uri->uri_string() == 'Welcome/pasien') { echo '#';}else{echo base_url().'index.php/Welcome/pasien';}?>" class="nav-link <?php if($this->uri->uri_string() ==  'Welcome/pasien') { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Pasien</p>
                </a>
              </li>
              <li class="nav-item <?php if($this->uri->uri_string() != 'Welcome/form') { echo 'zoomPilih';}?>">
              <a href="<?php if($this->uri->uri_string() == 'Welcome/form') { echo '#';}else{echo base_url().'index.php/Welcome/form';}?>" class="nav-link <?php if($this->uri->uri_string() ==  'Welcome/form') { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Pasien</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <li class="nav-header">LAYANAN DAN SARANA</li>
          <li class="nav-item <?php if($this->uri->uri_string() != 'Welcome/poliPeriksa') { echo 'zoomPilih';}?>">
            <a href="<?php if($this->uri->uri_string() == 'Welcome/poliPeriksa') { echo '#';}else{echo base_url().'index.php/Welcome/poliPeriksa';}?>" class="nav-link <?php if($this->uri->uri_string() ==  'Welcome/poliPeriksa') { echo 'active';}?>">
              <i class="nav-icon fas fa-hospital-user"></i>
              <p>POLI dan PEMERIKSAAN</p>
            </a>
          </li>
          <li class="nav-header"><span id='ct5'></span></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php endif; ?>
