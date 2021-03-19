
<head>
<!DOCTYPE html>
<html lang="en">

</head>
<script src="<?php echo base_url() ?>css/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>css/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>css/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url() ?>css/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url() ?>css/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>css/assets/vendor/scrollreveal/scrollreveal.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url() ?>css/assets/js/main.js"></script>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>BBPPMPV </title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
<link rel="shortcut icon" href="<?php echo base_url();?>css/assets/img/vedc.jpg">

<link rel="icon" href="<?php echo base_url() ?>css/assets/img/logo-kecil.png">
<link href="<?php echo base_url() ?>css/assets/img1/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Required meta tags -->
  <!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <!-- External CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>css/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>css/style4.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>css/assets/vendor/bootstrap/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url() ?>css/assets/vendor/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>css/assets/vendor/animate.css/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>css/assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>css/assets/vendor/owl.carousel/assets/owl.carousel.min.css">

  <!-- External Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


  <!-- <title><?php echo $title; ?></title> -->
</head>
<body>
<nav class="navbar navbar-default navbar-expand-lg fixed-top navbar-reduce">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">KEMENAG<span class="color-b"> KOTA MALANG</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse justify-content-center collapse" id="navbarDefault" style="">
          
</div>
<ul class="navbar-nav"> 
    <li class="nav-item">
            <a class="nav-link active" href="">Login</a>
    </li>
</ul>

          <!-- <li class="nav-item">
            <a class="nav-link" href="index.html">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Materi
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="">Habitat</a>
              <a class="dropdown-item" href="">Alat Pernafasan</a>
              <a class="dropdown-item" href="">Morfologi</a>
              <a class="dropdown-item" href="">Family</a>
              <a class="dropdown-item" href="">Kategori</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Game</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Latihan Soal</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="">Komentar</a>
          </li>
        </ul>
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button> -->
    </div>
  </nav>
      <div class="dropdown-menu dropdown-menu-right">
        <?php if ($this->session->userdata('level') == '') { ?>
          <a class="dropdown-item" href="<?php echo site_url(); ?>login">Login</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>login/reg">Registration</a>
        <?php
        } elseif ($this->session->userdata('level') == 'user') {
          ?>
          <!-- <a class="dropdown-item" href="<?php echo site_url(); ?>userclient">Beranda</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/materi">Materi
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/submateri">Habitat</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/submateri">Morfologi</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/submateri">Alat pernafasan</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/submateri">Family </a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/submateri">Kategori </a> -->
<!--         
        </a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/order">Latihan Soal</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/order">Komentar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url(); ?>login/out">Log Out</a> -->
        <?php
        } elseif ($this->session->userdata('level') == 'admin') {
          ?>
                <!-- <a class="dropdown-item" href="<?php echo site_url(); ?>userclient">Beranda</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/materi">Materi
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/submateri">Habitat</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/submateri">Morfologi</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/submateri">Alat pernafasan</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/submateri">Family </a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>userclient/submateri">Kategori </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url(); ?>login/out">Log Out</a> -->
        <?php
        }; ?>
      </div>
    </li>
  </ul>
</nav>

<body>