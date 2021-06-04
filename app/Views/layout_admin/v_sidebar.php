<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>/public/template/index3.html" class="brand-link">
      <img src="<?= base_url() ?>/public/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GERATISIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>/public/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session('name'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url().route_to('admin.dashboard'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-university"></i>
              <p>
                Beasiswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().route_to('admin.company.index'); ?>" class="nav-link">
              <i class="nav-icon ion ion-home"></i>
              <p>
                Pengguna Perusahaan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().route_to('admin.public.index'); ?>" class="nav-link">
              <i class="nav-icon ion ion-ios-people"></i>
              <p>
                Pengguna Publik
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  