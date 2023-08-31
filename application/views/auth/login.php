
<!--
=========================================================
* Argon Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() . '/upload/logo.png'?>">
  <link rel="icon" type="image/png" href="<?= base_url() . '/upload/logo.png'?>">
  <title>
    <?=$title?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?=base_url('assets/assets/css/nucleo-icons.css')?>" rel="stylesheet" />
  <link href="<?=base_url('assets/assets/css/nucleo-svg.css')?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?=base_url('assets/assets/css/nucleo-svg.css')?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?=base_url('assets/assets/css/argon-dashboard.css?v=2.0.1')?>" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
       
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Login</h4>
                  <?php echo $this->session->flashdata('message');?>
                  
                  <p class="mb-0">Masukan Username & Password yang benar untuk login</p>
                </div>
                <div class="card-body">
                  <form role="form" method="post" action="<?php echo base_url('index.php/auth/login') ?>">
                    <div class="mb-3">
                      <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" id="myInput">
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" onclick="myFunction()">
                      <label class="form-check-label" for="rememberMe">Lihat Password</label>
                    </div>
                   
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Login</button><br><br>
                      <a href="<?=site_url('auth/cara_absen')?>">Cara Melakukan Absensi</a>
                    
                  </form>
                </div>
               
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-danger h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('upload/bglogin.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">Presensi CV. Baraya Abdi Sadaya</h4>
                <p class="text-white position-relative">Silahkan masukan akun anda ke form login dan jangan lupa untuk isi Presensi tepat waktu.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="<?=base_url('assets/assets/js/core/popper.min.js')?>"></script>
  <script src="<?=base_url('assets/assets/js/core/bootstrap.min.js')?>"></script>
  <script src="<?=base_url('assets/assets/js/plugins/perfect-scrollbar.min.js')?>"></script>
  <script src="<?=base_url('/assets/js/plugins/smooth-scrollbar.min.js')?>"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script>
    function myFunction() {
   var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url('assets/assets/js/argon-dashboard.min.js?v=2.0.1')?>"></script>
</body>

</html>