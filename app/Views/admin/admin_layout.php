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
            <a class="sidebar-nav-link" href="#">
              <i class="bi bi-speedometer"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a class="sidebar-nav-link" href="#">
              <i class="bi bi-people"></i>
              <span>Pengguna Publik</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- SIDEBAR END -->

    <main>
      <!-- HEADER START -->
      <header>
        header ...
      </header>
      <!-- HEADER END -->
      <?= $this->renderSection('main') ?>
    </main>
  </div>

  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>