<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Home | Geratisin</title>
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
</head>

<body class="hold-transition layout-top-nav">
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
        <li><a class="nav-link scrollto active" href="<?= base_url() ?>/geratisin/pengguna">Home</a></li>
        <li><a class="nav-link scrollto" href="#beasiswa">Beasiswa</a></li>
        
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url() ?>/public/template2/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">USERNAME</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url() ?>/public/template2/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  USERNAME
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="col-xs-4 text-center">
                  <a href="<?= base_url() ?>/Profile_Pengguna" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url() ?>/Login/logout" class="btn btn-default btn-flat">Log out</a>
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
  <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('<?= base_url() ?>/public/template3/assets/img/hero-carousel/1.jpg')">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Bersekolah Tidak Harus Mahal </h2>
                <p class="animate__animated animate__fadeInUp">Kemenangan adalah seuatu hal yang harus kalian rencanakan kawan</p>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?= base_url() ?>/public/template3/assets/img/hero-carousel/2.jpg')">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Jika Ada Sesuatu Yang Tidak Hilang Sesuatu Itu Adalah Ilmu </h2>
                <p class="animate__animated animate__fadeInUp">Membantu tidak membuat apa yang kita memiliki </p>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?= base_url() ?>/public/template3/assets/img/hero-carousel/3.jpg')">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Jika Ada Kemiskinan Di Situ Pendidikan Tidak Merata</h2>
                <p class="animate__animated animate__fadeInUp">Yang Pintar Mencurangi Yang Bodoh Begitulah Cara Kerja Dunia Ini</p>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->"

  <main id="main">
    <!-- ======= Beasiswa Section ======= -->
    <div id="beasiswa" class="blog-area">
      <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Beasiswa Pilihan</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start Left Blog -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="blog.html">
                    <img src="<?= base_url() ?>/public/template3/assets/img/blog/1.jpg" alt="">
                  </a>
                </div>
                <div class="blog-meta">
                  <span class="comments-type">
                    <i class="fa fa-comment-o"></i>
                    <a href="#">13 comments</a>
                  </span>
                  <span class="comments-type">
                    <i class="fa fa-comment-o"></i>
                    <a href="#">rating</a>
                  </span>
                  <span class="date-type">
                    <i class="fa fa-calendar"></i>2016-03-05
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a href="blog.html">HAA ? Beasiswa</a>
                  </h4>
                  <p>
                    Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                  </p>
                </div>
                <span>
                  <a href="blog.html" class="ready-btn">Lihat</a>
                </span>
              </div>
              <!-- Start single blog -->
            </div>
            <!-- End Left Blog-->
            <!-- Start Left Blog -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="blog.html">
                    <img src="<?= base_url() ?>/public/template3/assets/img/blog/2.jpg" alt="">
                  </a>
                </div>
                <div class="blog-meta">
                  <span class="comments-type">
                    <i class="fa fa-comment-o"></i>
                    <a href="#">130 comments</a>
                  </span>
                  <span class="comments-type">
                    <i class="fa fa-comment-o"></i>
                    <a href="#">rating</a>
                  </span>
                  <span class="date-type">
                    <i class="fa fa-calendar"></i>2016-03-05
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a href="blog.html">Program Biasiswa Pemerintah</a>
                  </h4>
                  <p>
                    Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                  </p>
                </div>
                <span>
                  <a href="blog.html" class="ready-btn">Lihat</a>
                </span>
              </div>
              <!-- Start single blog -->
            </div>
            <!-- End Left Blog-->
            <!-- Start Right Blog-->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="blog.html">
                    <img src="<?= base_url() ?>/public/template3/assets/img/blog/3.jpg" alt="">
                  </a>
                </div>
                <div class="blog-meta">
                  <span class="comments-type">
                    <i class="fa fa-comment-o"></i>
                    <a href="#">10 comments</a>
                  </span>
                  <span class="comments-type">
                    <i class="fa fa-comment-o"></i>
                    <a href="#">rating</a>
                  </span>
                  <span class="date-type">
                    <i class="fa fa-calendar"></i>2016-03-05
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a href="blog.html">Beasiawa PT Brazzer.id</a>
                  </h4>
                  <p>
                    Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                  </p>
                </div>
                <span>
                  <a href="blog.html" class="ready-btn">Lihat</a>
                </span>
              </div>
                <span>
                    <a href="<?= base_url() ?>/Beasiswa" class="ready-btn">Lihat Lebih Banyak</a>
                </span>
            </div>
            <!-- End Right Blog-->
          </div>
        </div>
      </div>
    </div>
    <!-- End Beasiswa Section -->

  </main>
  <!-- End main --> 
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

</body>
</html>
