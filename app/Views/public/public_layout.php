<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= $title ?> | Geratisin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/template/dist/css/adminlte.min.css">
  <!-- Favicons -->
  <link href="<?= base_url() ?>/public/template3/assets/img/favicon.png" rel="icon">
  <link href="<?= base_url() ?>/public/template3/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>/public/template3/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/public/template3/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/public/template3/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>/public/template3/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/public/template3/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/public/template3/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>/public/template3/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <style type="text/css">
    .logo h1 {
      line-height: 61px!important;
      vertical-align: middle;
    }
    .header-image img {
      width: 100vw;
      height: 200px;
      object-fit: cover;
    }
  </style>
  <?= $this->renderSection('custom_style') ?>
</head>

<body class="hold-transition layout-top-nav">
  <?= $this->renderSection('alerts') ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1>
          <a href="<?= base_url() ?>/pub/home">
            <span>G</span>eratisin
          </a>
        </h1>
      </div>

      <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link <?= $page_id == 'home' ? 'active' : '' ?>" href="<?= base_url() ?>/pub/home">Home</a></li>
        <li><a class="nav-link <?= $page_id == 'scholarship' ? 'active' : '' ?>" href="<?= base_url() ?>/pub/scholarship/all/1">Beasiswa</a></li>
        
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url() ?>/public/template2/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= session('name') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url() ?>/public/template2/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  <?= session('name') ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <span class="col-xs-4 text-center">
                    <a class="btn btn-default btn-flat" href="<?= base_url() ?>/pub/my_scholarship">Beasiswa Saya</a>
                  </span>
                </div>
                <div class="row">
                  <span class="col-xs-4 text-center">
                    <a class="btn btn-default btn-flat" href="<?= base_url() ?>/pub/create_scholarship">Tambah Beasiswa</a>
                  </span>
                </div>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="col-xs-4 text-center">
                  <a href="<?= base_url() ?>/pub/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url() ?>/pub/logout" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </ul>
    </div>
  </header>
  <!-- End Header -->
  
  <?= $this->renderSection('main') ?>

  <!-- ======= Footer ======= -->
  <footer>
      <div class="footer-area">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="footer-content">
                <div class="footer-head">
                  <div class="footer-logo">
                    <h2><span>G</span>eratisin</h2>
                  </div>  
                  <div class="footer-icons">
                    <ul>
                      <li>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- end single footer -->
            <div class="col-md-4">
              <div class="footer-content">
                <div class="footer-head">
                  <h4>information</h4>
                  <p>
                   Geratisin Tempat Anak Indonesia Mencari Beasiswa.
                  </p>
                  <div class="footer-contacts">
                    <p><span>Tel : </span> +123 456 789</p>
                    <p><span>Email : </span> contact@geratisin.com</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- end single footer -->
            <div class="col-md-4">
            </div>
          </div>
        </div>
      </div>
      <div class="footer-area-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="copyright text-center">
                <p>
                  &copy; Copyright <strong>Geratisin</strong>. All Rights Reserved
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </footer><!-- End  Footer -->

  <?= $this->renderSection('modals') ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>/public/template3/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/public/template3/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url() ?>/public/template3/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>/public/template3/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url() ?>/public/template3/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>/public/template3/assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>
