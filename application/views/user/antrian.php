<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>KEMENAG </title>

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
    background: #2c3e50;
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
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Antrian Kemenag</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu 
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <?php if(empty($this->session->userdata('id_user'))) {?>
            <li class="nav-item mx-0 mx-lg-1" >
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo site_url(); ?>login">Home</a>
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

      <!-- Masthead Avatar Image -->
      

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0"><img class="masthead-avatar mb-5" src="<?=base_url();?>css/assets/img/logo-kecil.png" alt=""><br> KEMENAG KOTA MALANG</h1><br>
      <div class="row">
          <div class="col-md-12" style="border: thin solid; ">
            <h3>NO ANTRIAN SAAT INI</h3>
          <!-- <h1 style="margin-top: 5px;"><?php echo $this->db->get('antrian','id_instansi', 11)->num_rows(); ?> -->
</h1>
          </div>
      </div>
        <div class="row" style="margin-top: 60px">
          <div class="col-md-4" style="border: thin solid; margin:center; ">
          <h3><?php echo $this->db->get('layanan','id_instansi', 11)->num_rows(); ?></h3>
            <!-- <h3><?php echo $nomor; ?></h3> -->
            <H6>UMUM DAN KESEKRETARIATAN</H6>
          </div>
          <div class="col-md-4" style="border: thin solid; ">
          <h3><?php echo $this->db->get('user','id_instansi', 11)->num_rows(); ?></h3>
            <!-- <h3><?php echo $nomor; ?></h3> -->
            <H6>PENDIDIKAN</H6></div>
          <div class="col-md-4" style="border: thin solid; ">
          <h3><?php echo $this->db->get('user_role','id_instansi', 11)->num_rows(); ?></h3>
            <!-- <h3><?php echo $nomor; ?></h3> -->
            <H6>AGAMA DAN PHU </H6></div>
        </div>
        </div>
        <h4 class="masthead mb-0" style="margin-top: 10px !important;padding: 20px; " >.Selamat Datang di Kementrian Agama Kota Malang. 
        <br>.Silahkan Ambil No Antrian.</h4>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Masthead Subheading -->
        <div class="row" style="width: 60%; margin-left:250px;">
          <div class="col-md-5 text-right">
            <label><h5>Nomor Antrian Anda :</label></h5>
          </div>
          <div class="col-md-2 text-justify"><h5><?php 
          echo 
           $this->db->get('user_role','id_instansi', 11)->num_rows();
           ?> 
          </div>
          <?php if(!empty($id_antrian)){?>
            <div class="col-md-5">
                 <a href="<?php echo base_url('Index/cetak')."/".$id_antrian ?>" style="color: #000; background: #fff; padding: 10px;" target="_blank">Cetak</a>
            </div>
          <?php } ?>
        </div>
        <div class="row" style="width: 60%; margin-left:250px;">
          <div class="col-md-5 text-right"><label><h5>Layanan :</label></h5></div>
          <div class="col-md-5 text-justify"><h5><?php echo $this->db->get('log','id_instansi', 11)->num_rows();?></h5></div>
        </div>
    </div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="registrasi">
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
                <form action="<?php echo site_url(); ?>antrianclient/post_process" class="needs-validation" method="POST">
                <div class ="row">
                <div class ="col-md-2">
                  <h6><label>Tanggal Antrian</label></h6>   
                  </div>
                    <div class="col-md-5">
                      <input type="date" id="tanggal" name="tanggal" class="form-control" value="" placeholder="Tanggal" required="">
                    </div>
                  </div>
                  <br>
                  <div class ="row">
                    <div class ="col-md-2">
                      <h6><label>Pilih Layanan</label></h6>   
                    </div>
                    <div class="col-md-5">
                    <select class="form-control" id="id_layanan" name="id_layanan">
                      <option value="" > Pilih </option>
                      <?php foreach ($antrian as $rows) : ?>
                          <option value="<?php echo $rows->id_layanan; ?>" data-price="<?php echo $rows->kode; ?>"><?php echo $rows->id_layanan; ?> - <?php echo $rows->nama_layanan; ?></option>
                      <?php endforeach; ?>
                    </select>
                    </div>
                  </div>  
                  <br>
                  <div class ="row">
                    <div class ="col-md-2">
                      <h6><label>Kode Antrian </label></h6>    
                    </div>
                    <div class="col-md-5">
                      <input type="text" name="kode" id="kode" value="" disabled="" class="form-control" required readonly>
                    </div>
                  </div>
                  <br>

                  <div class ="row">
                    <div class ="col-md-2">
                      <h6><label>No Antrian </label></h6>    
                    </div>
                    <div class="col-md-5">
                    <!-- <input  class="form-control" nama="nomor" type="text" id="kode1" style="width: 20%;margin-right: 67px;" required="" disabled="" > -->
                      <?php
                      $i="001";
                      foreach ($antrian1 as $rows) : ?>
                      <input type="text" name="kode1" id="kode1" value="" disabled="" class="form-control" style="width: 20%;margin-right: 67px;">
                      <input type="hidden" name="kode" id="kode" value="" class="form-control">
                      <input type="hidden" name="nomor" value="<?php echo $i++; ?>" >
                     
                      <!-- <input type="text" id="nomor" id="kode1" name="nomor" class="form-control" value="<?php echo $i++; ?>" placeholder="" required="" style="width: 20%;margin-right: 67px;" > -->

                        <!-- <input value="00<?php echo $i++; ?>"class="form-control" nama="nomor" type="text" id="nomor" disabled="" style="width: 90%;margin-right: 67px;"required readonly> -->
                        <tr><td></td><td>
                        </td>
                        </tr>

                        <!-- <input type="text" class="form-control" id="nomor" placeholder="" value="<?php echo $rows->nomor; ?>" name="nomor" required readonly> -->
                      <!-- <?php endforeach; ?>   -->
                        <!-- <input type="text" class="form-control" id="nomor" name="nomor" disabled="" value="<?php echo $rows->nomor; ?>" required readonly> -->
                    </div>
                  </div>
                  <br>
                  <div class="row text-right">
                    <div class="col-md-7">
                      <input type="submit" class="btn btn-primary">
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
        <p class="lead">Klik Ambil Antrian > Pilih Layanan > Klik Submit</p></center>
          <p class="lead"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
      </div>
    </div>
    </div>
  </section>
  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>&copy; Antrian KEMENAG Kota Malang </small>
    </div>
  </section>
  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
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
  <script>
    $(document).ready(function() {
      $("#id_layanan").change(function() {
        document.getElementById("kode").value = $(this).find('option:selected').attr('data-price');
        document.getElementById("kode1").value = $(this).find('option:selected').attr('data-price');
      });
      $("#id_antrian").change(function() {
        document.getElementById("nomor").value = $(this).find('option:selected').attr('data-price1');
      });
    });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script type="text/javascript">
            function isi_otomatis(){
                var nim = $("#id_layanan").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"id_layanan="+id_layanan ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nomor').val(obj.nomor);
                });
            }
        </script>
</body>

</html>
