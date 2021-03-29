<?php if($this->session->userdata('level')!='Staff Produksi'){redirect('login');};?>
<style>
    nav-treeview:hover{
        color : #006eff;
    }
</style>

<body class="hold-transition sidebar-mini" >
<div class="wrapper" style="position:relative;">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" >
        <a href="<?php echo site_url(); ?>adminclient" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-green elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url(); ?>adminclient" class="brand-link" style="background-color: #006eff; color:light">
      <!-- <img src="<?=base_url();?>css/assets/img/vedc.jpg" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light" style="color:white; margin-left:70px;"><b>PT MILAGROS </b></span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <li class="nav-item ">
           <a href="<?php echo site_url(); ?>staffproduksiclient" class="nav-link" id="navHome">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         

          </li>

          <li class="nav-item has-treeview" >
            <a href="" class="nav-link" id="navData" style="background:rgba(52,58,64,255); color:white;">
                        <i class="fa fa-industry"></i> <span>Kepala Produksi</span>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url(); ?>produksiclient/index1" class="nav-link">
                <i class="fa fa-cog"></i> Olah Data Produksi</a></li>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url(); ?>xxxx" class="nav-link">
                <i class="fa fa-cog"></i> Olah Detail Data Produksi</a></li>
                </a>
              </li>
              

              <li class="nav-item">
                <a href="<?php echo site_url(); ?>xxxx" class="nav-link">
                <i class="fa fa-file"></i> Cetak Data Produksi</a></li>
                </a>
              </li>
            </ul>

          
            <li class="nav-item has-treeview" >
            <a href="" class="nav-link" id="navData" style="background:rgba(52,58,64,255); color:white;">
            <i class="fa fa-archive"></i> <span>Kepala Gudang</span>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?php echo site_url(); ?>kategoriclient/index1" class="nav-link">
                <i class="fa fa-cube"></i>Data Kategori Barang</a></li>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url(); ?>barangclient/index1" class="nav-link">
                <i class="fa fa-shopping-cart"></i> Barang Masuk</a></li>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url(); ?>xxxx" class="nav-link">
                <i class="fa fa-cubes"></i> Data Semua Barang</a></li>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url(); ?>xxxx" class="nav-link">
                <i class="fa fa-file"></i> Cetak Data Gudang</a></li>
                </a>
              </li>

            </ul>


            <li class="nav-item has-treeview" >
            <a href="" class="nav-link" id="navData" style="background:rgba(52,58,64,255); color:white;">
            <i class="fa fa-truck"></i> <span>Staff Pengiriman</span>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url(); ?>pengirimanclient/index1" class="nav-link">
                <i class="fa fa-cog"></i> Olah Data Pengiriman</a></li>
                </a>
              </li>
              
            
              <li class="nav-item">
                <a href="<?php echo site_url(); ?>xxxx" class="nav-link">
                <i class="fa fa-cog"></i> Olah Status Pengiriman</a></li>
                </a>
              </li>



              <li class="nav-item">
                <a href="<?php echo site_url(); ?>xxxx" class="nav-link">
                <i class="fa fa-file"></i> Cetak Data Pengiriman</a></li>
                </a>
              </li>
            </ul>


            <li >
            <a href="<?php echo site_url(); ?>xxxx" class="nav-link">
          <i class="fa fa-database"></i> <span>Backup Database</span>

          </a>
        </li>



            
          
          <li class="nav-item" style="background:rgba(255,255,255); ">
           <a href="<?= base_url().'login/out' ?>" onClick="return confirm('Logout sekarang ??');" class="nav-link" id="navHome">
              <i class="nav-icon fas fa-sign-out-alt" style=color:black;></i>
              <p style="color:black;">
                Logout
              </p>
            </a>
          </li>

         
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>