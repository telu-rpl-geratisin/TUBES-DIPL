<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?> | GERATISIN</title>

  <?= $this->renderSection('import_styles') ?>
  
  <!-- Page specific style -->
  <?= $this->renderSection('custom_style') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?= $this->include('layout_admin/v_navbar') ?>
  <?= $this->include('layout_admin/v_sidebar') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?= $this->include('layout_admin/v_header') ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?= $this->renderSection('content') ?>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?= $this->include('layout_admin/v_footer') ?>
</div>
<!-- ./wrapper -->

<?= $this->renderSection('import_scripts') ?>

<!-- Page specific script -->
<?= $this->renderSection('custom_script') ?>
</body>
</html>