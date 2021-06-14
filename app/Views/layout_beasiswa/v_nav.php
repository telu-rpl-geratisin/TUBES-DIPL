<body class="hold-transition layout-top-nav">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1><a href="<?= base_url("Pengguna") ?>">
          <img src="<?= base_url() ?> /public/template/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"><span>G</span>eratisin
        </a></h1>
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
      <ul>
          <li><a class="nav-link scrollto active" href="<?= base_url('pengguna') ?>">Home</a></li>
          <li><a class="nav-link scrollto" href="#beasiswa">Beasiswa</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Mitra</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#testi">Testimonial</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <!-- SEARCH FORM -->
          <li>
            <form class="form-inline ml-0 ml-md-3">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
          </li>
          <!--menu user login -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url() ?>/public/template2/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= session()->get('username') ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url() ?>/public/template2/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?= session()->get('username') ?>
                    <small>Bergabung Sejak <?= session()->get('created_at') ?> </small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <span class="col-xs-4 text-center">
                      <a href="#"><?= session()->get('username') ?>|<?= session()->get('no_hp') ?>|<?= session()->get('tanggal_lahir') ?> </a>
                    </span>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="col-xs-4 text-center">
                    <a href="<?= base_url('Profile_Pengguna') ?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('Login/logout') ?>" class="btn btn-default btn-flat">Log out</a>
                  </div>
                </li>
              </ul>
            </li>
       </ul>
        <!--end menu user login --> 
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </ul>
    </div>
  </header>
  <!-- End Header -->

    
 
