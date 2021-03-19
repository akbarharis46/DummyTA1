<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>PT MILAGROS PUTRA MANDIRI BANYUWANGI </title>
  <!-- Custom fonts for this theme -->
  <link href="<?php echo base_url('assets/user')?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <!-- Theme CSS -->
  <link href="<?php echo base_url('assets/user')?>/css/freelancer.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/user')?>/lib/noty.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/user')?>/lib/themes/metroui.css" rel="stylesheet">
</head>
<style type="text/css">
  .btncostume{
    background: #006eff;
    color: white;
  }
  sup{
    color: red;
  }
  .border1{
    border: thin solid;
  }
  .costum{
    background: white;
    border: thin solid #fff;
  }
  .masthead .masthead-avatar {
    width: 8rem !important;
}
</style>
<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav" >
    <div class="container" >
      <a class="navbar-brand js-scroll-trigger" href="#page-top">PTMLGM</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" >
      Menu
      <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive" >
        <ul class="navbar-nav ml-auto" >
          <?php if(empty($this->session->userdata('id_user'))) {?>
            <li class="nav-item mx-0 mx-lg-1" >
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#login">Login</a>
            </li>
          <?php }else{?>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#"><?php echo $this->session->userdata('nama'); ?></a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?= base_url().'login/out' ?>">Logout</a>
            </li>
          <?php }?>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#bantuan">Bantuan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0"><img class="masthead-avatar mb-3" src="<?=base_url();?>css/assets/img/logo_milagros.png" alt="">
      <div class="row">
        
      </div>
        
        <h4 class="masthead mb-0" style="margin-top: 10px !important;padding: 20px;">Selamat Datang di Sistem Informasi Manajemen Pabrik
   <br>PT MILAGROS PUTRA MANDIRI </h4>
      
      <!-- Icon Divider -->
        
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
      
      </div>
      <!-- Masthead Subheading -->
      <?php if(!empty($this->session->userdata('id_user'))){ ?>
        <div class="row" style="width: 60%;">
          <div class="col-md-5 text-right">
            <label><h5>Nomor Antrian Anda :</label></h5>
          </div>
          <!-- <div class="col-md-2 text-justify"><h5><?php echo $nomor ?></h5></div> -->
          <?php if(!empty($id_antrian)){?>
            <div class="col-md-5"><a href="<?php echo base_url('Index/cetak')."/".$id_antrian ?>" style="color: #000; background: #fff; padding: 10px;" target="_blank">Cetak</a></div>
          <?php } ?>
        </div>
        <div class="row" style="width: 60%;">
          <div class="col-md-5 text-right"><label><h5>Poli :</label></h5></div>
          <!-- <div class="col-md-5 text-justify"><h5><?php echo $nama?></h5></div> -->
        </div>
      <?php } ?>
    </div>
  </header>
  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="login">
     <?php if(empty($this->session->userdata('id_user'))){ ?>
      <div class="container">
        <!-- Portfolio Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>
        <!-- Icon Divider -->
        
          <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items -->
        <div class="row">
          <div class="container">
            <div class="row justify-content-md-center">
              <div class="col-md-4" style="margin-top: 20px">
                <!-- <h1 align="center">Login </h1> -->
                <form action="<?php echo site_url() ?>login/log_process" method='post'>
                <?php if ($this->session->flashdata('result') != '') { ?>
                        <div class="alert alert-dark alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $this->session->flashdata('result'); ?>
                        </div>
                    <?php
                    }
                ?>
                  <label >Username</label>
                    <input type="text" class="form-control" id="user" placeholder="Masukkan username" name="user" required>
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password" required>
                  <br><br>
                  <div align="right">
                  <button type="submit" class="btn btn-dark">Login</button>
                  </div>  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
    <?php }else{ ?>
      <div class="container">
        <!-- Portfolio Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ambil Antrian</h2>
        <!-- Icon Divider -->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon">
            <i class="fas fa-star"></i>
          </div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items -->
        <div class="row">
          <div class="container">
            <div class="row justify-content-md-center">
              <div class="col-md-12" style="margin-top: 20px">
                <!-- <h1 align="center">Login </h1> -->
                <form action="<?php echo base_url('Index/saveAntrian') ?>" method="post">
                  <div class ="row">
                    <div class ="col-md-2">
                      <h6><label>Pilih Layanan</label></h6>   
                    </div>
                    <div class="col-md-5">
                      <select name="id_antrian" id="id_antrian" class="form-control" onchange="noAntrian(this.value)">
                        <option value=""> pilih </option>
                        <?php foreach ($getPoli as $row ) {
                        ?>
                          <option value="<?php echo $row->id_antrian; ?>"> <?php echo $row->kode; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class ="row">
                    <div class ="col-md-2">
                      <h6><label>No Antrian</label></h6>    
                    </div>
                    <div class="col-md-5">
                      <input type="text" name="nomor" id="nomor" value="" disabled="" class="form-control">
                      <input type="hidden" name="nomor" id="nomor" value="" class="form-control">
                      <!-- <input type="hidden" name="nomor" value="<?php echo $nomor ?>"> -->
                    </div>
                  </div>
                  <div class="row text-right">
                    <div class="col-md-7">
                      <input type="submit" name="simpan" id="simpan" value="Ambil Antrian" class="btn btn-primary">
                    </div>
                  </div>
                </form>
                 <div class="row text-justify" >
                 <h6>Keterangan :</h6>
                  <ol>
                    <li>UMUM DAN KESEKRETARIATAN (A)</li>
                    <li>PENDIDIKAN (B)</li>
                    <li>AGAMA DAN PHU (C)</li>
                  </ol>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
    <?php } ?>
  </section>
  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="bantuan">
    <div class="container">
      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">Bantuan</h2>
      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- About Section Content -->
    <div class="container">  
      <div class="row">
        <div class="col-lg-4.ml-auto" align="center" >
         <p class="lead">Kunjungi halaman website kami</p></center>
          <p class="lead"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
      </div>
    </div>
    </div>
  </section>
  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>&copy; PT MILAGROS PUTRA MANDIRI </small>
    </div>
  </section>
  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>
   <!-- Modal -->
<div class="modal fad e bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ambil No antrian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('Index/registrasi') ?>" method="post">
            <div>
                <label >Nomor Antrian <sup>*</sup></label>
                <input type="text" id="nomor" name="nomor" class="form-control" value="" placeholder="Nomor Antrian" required="">
            </div>
            <div>
              <label >Layanan</label>
              <select id="id_layanan" name="id_layanan" class="form-control">
              <option value="">Pilih</option>
              <option value="1">1. UMUM DAN KESEKRETARIATAN</option>
              <option value="2">2. PENDIDIKAN</option>
              <option value="3">3. AGAMA DAN PHU</option>
              </select>
            </div>
            <div>
                <label >Tanggal <sup>*</sup></label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" value="" placeholder="Tanggal" required="">
            </div>
            <div>
              <label >Id Layanan</label>
              <textarea id="id_layanan" name="id_layanan" class="form-control" placeholder="Id Layanan"></textarea>
            </div>
            <div>
                <label >Id Instansi</label>
                <input type="id_instansi" id="id_instansi" name="id_instansi" class="form-control" value="" placeholder="Id Instansi">
            </div>
            <br><br>
            <div align="right">
            <!-- <a href="<?php //echo base_url() ?>"  >Registrasi</a> -->
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('assets/user')?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/user')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Plugin JavaScript -->
  <script src="<?php echo base_url('assets/user')?>/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Contact Form JavaScript -->
  <script src="<?php echo base_url('assets/user')?>/js/jqBootstrapValidation.js"></script>
  <script src="<?php echo base_url('assets/user')?>/js/contact_me.js"></script>
  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url('assets/user')?>/js/freelancer.min.js"></script>
  <script src="<?php echo base_url('assets/user')?>/lib/noty.min.js"></script>
  <script type="text/javascript">
    function noAntrian(id_antrian){
    // alert(id_antrian);?
    if(id_antrian!=""){
      $.ajax({
        url: "<?php echo base_url('Index/getNoAntrian'); ?>",
        type : "POST",
        data : "id_antrian="+id_antrian,
        datatype: "json",
        success:function(response){
          console.log(response);
          // alert(data);
          var output = JSON.parse(response);
          if(output.no > output.maks){
            $("#nomor").val('Data Sudah Penuh');
            // $("#simpan").toggle('slow');
            $("#simpan").prop("disabled",true);
          }else{
            $("#nomor").val(output.no_hasil);
            $("#nomor").val(output.no_hasil);
            $("#simpan").prop("disabled",false);
          }
        } // Munculkan alert error
      });
    }else{
      $("#nomor").val("");
      $("#nomor").val("");
    }
  }
  </script>
   <?php if($this->session->flashdata('notif')){?>
        <script type="text/javascript">
            new Noty({     
                text: '<?php echo $this->session->flashdata('pesan'); ?>',
                timeout: 3000,
                theme: "metroui",
                type: "<?php echo $this->session->flashdata('type'); ?>",                
            }).show();
        </script>
        <?php } ?>
</body>
</html>