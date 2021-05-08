<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title; ?> | GERATISIN</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">    
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <!-- custom css for dashboard -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/admin/dashboard.css" />
    <!-- css datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
</head>
<body>
  <div class="wrapper">
    <!-- SIDEBAR START -->
    <div class="sidebar bg-dark text-light">
      <div class="brand text-center">
        <h5 class="brand-text">GERATISIN</h5>
      </div>
      <div class="h-100">
        <ul class="sidebar-nav">
          <li>
            <a class="sidebar-nav-link <?= ($title == 'Dashboard') ? 'active' : ''; ?>" href="dashboard">
              <i class="bi bi-speedometer"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a class="sidebar-nav-link <?= ($title == 'Beasiswa') ? 'active' : ''; ?>" href="beasiswa">
              <i class="bi bi-people"></i>
              <span>Beasiswa</span>
            </a>
          </li>
          <li>
            <a class="sidebar-nav-link <?= ($title == 'Pengguna Publik') ? 'active' : ''; ?>" href="pengguna-publik">
              <i class="bi bi-people"></i>
              <span>Pengguna Publik</span>
            </a>
          </li>
          <li>
            <a class="sidebar-nav-link <?= ($title == 'Pengguna Perusahaan') ? 'active' : ''; ?>" href="pengguna-perusahaan">
              <i class="bi bi-people"></i>
              <span>Pengguna Perusahaan</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- SIDEBAR END -->

    <main>
      <!-- HEADER START -->
      <header>
        <div class="header-wrapper d-flex justify-content-end">
          <div class="user-profile">
            <img src="<?= base_url(); ?>/public/img/person01.jpg" alt="profile-picture">
            <span class="fw-bold d-block">Andi Prayoga</span>
          </div>
        </div>
      </header>
      <!-- HEADER END -->

      <div class="main-wrapper">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
          </ol>
        </nav>
        <?= $this->renderSection('main') ?>
      </div>
    </main>
  </div>

  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>