<?= $this->extend('layout_admin/app') ?>

<?= $this->section('import_styles') ?>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url('public/template/plugins/fontawesome-free/css/all.min.css') ?>">
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url('public/template/dist/css/adminlte.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">List Pengguna Publik</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="public-table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Nama Lengkap</th>
        <th>No HP</th>
        <th>Alamat</th>
      </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<?= $this->endSection() ?>

<?= $this->section('import_scripts') ?>
<!-- jQuery -->
<script src="<?= base_url('public/template/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('public/template/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('public/template/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public/template/dist/js/adminlte.min.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->section('custom_script') ?>
<script>
$( document ).ready(function() {
	$("#public-table").DataTable({
		processing: true,
	    serverSide: true,
	    responsive: true,
	    ajax: {
          url:"<?= base_url('admin/public/ajax_fetch_all') ?>",
          type: "POST"
        }
	});
});
</script>
<?= $this->endSection() ?>