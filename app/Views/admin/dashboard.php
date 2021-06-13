<?= $this->extend('layout_admin/app') ?>

<?= $this->section('import_styles') ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('public/template/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('public/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('public/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="<?= base_url('public/template/plugins/jqvmap/jqvmap.min.css'); ?>"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('public/template/dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('public/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('public/template/plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('public/template/plugins/summernote/summernote-bs4.min.css'); ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= $scholarship_count; ?></h3>

          <p>Beasiswa</p>
        </div>
        <div class="icon">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <a href="<?= base_url().route_to('admin.scholarship.index'); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?= $scholarship_unverified_count; ?></h3>

          <p>Beasiswa Belum Diverifikasi</p>
        </div>
        <div class="icon">
          <i class="fas fa-clipboard-check"></i>
        </div>
        <a href="<?= base_url().route_to('admin.scholarship.verify'); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= $company_count; ?></h3>

          <p>Pengguna Perusahaan</p>
        </div>
        <div class="icon">
          <i class="fas fa-building"></i>
        </div>
        <a href="<?= base_url().route_to('admin.company.index'); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?= $company_unverified_count; ?></h3>

          <p>Perusahaan Belum Diverifikasi</p>
        </div>
        <div class="icon">
          <i class="fas fa-clipboard-check"></i>
        </div>
        <a href="<?= base_url().route_to('admin.company.verify'); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= $public_count; ?></h3>

          <p>Pengguna Publik</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="<?= base_url().route_to('admin.public.index'); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
<?= $this->endSection() ?>

<?= $this->section('import_scripts') ?>
<!-- jQuery -->
<script src="<?= base_url('public/template/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('public/template/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('public/template/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('public/template/plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('public/template/plugins/sparklines/sparkline.js'); ?>"></script>
<!-- JQVMap -->
<!-- <script src="<?= base_url('public/template/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script> -->
<!-- <script src="<?= base_url('public/template/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?= base_url('public/template/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('public/template/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?= base_url('public/template/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('public/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('public/template/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('public/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public/template/dist/js/adminlte.js'); ?>"></script>
<?= $this->endSection() ?>