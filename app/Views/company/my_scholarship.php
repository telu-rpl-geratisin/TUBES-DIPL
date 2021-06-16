<?= $this->extend('company/company_layout') ?>

<?= $this->section('import_style') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('custom_style') ?>
<style type="text/css">
	.my-scholarship-card {
		margin-top: -50px;
	}
</style>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<main id="main" class="mb-5 pb-5">
  <div class="header-image">
    <img src="<?= base_url() ?>/public/img/bg-balcony.jpg">
  </div>
  <div class="container">
  	<div class="card my-scholarship-card">
  		<div class="card-header">
  			<h3 class="font-weight-bolder">Beasiswa Saya</h3>
  		</div>
  		<div class="card-body p-3">
  			<table id="scholarship-table" class="table table-bordered table-striped" style="width:100%">
		      <thead>
			      <tr>
			        <th>Nama</th>
			        <th>Akhir Pendaftaran</th>
			        <th>Link</th>
			        <th>Status</th>
			        <th>Aksi</th>
			      </tr>
		      </thead>
		      <tbody>
		      	<?php foreach ($scholarships as $scholarship): ?>
		      		<tr>
		      			<td><?= $scholarship['name'] ?></td>
		      			<td><?= $scholarship['end_date'] ?></td>
		      			<td><?= $scholarship['link'] ?></td>
		      			<?php
		      				$badge = '';
                  switch ($scholarship['status']) {
                    case 'unverified':
                        $badge = '<span class="badge badge-secondary">Belum<br>Terverifikasi</span>';
                        break;
                    case 'verified':
                        $badge = '<span class="badge badge-success">Terverifikasi</span>';
                        break;
                    case 'denied':
                        $badge = '<span class="badge badge-danger">Verifikasi<br>Ditolak</span>';
                        break;
                    default:
                        break;
                  }
		      			?>
		      			<td><?= $badge ?></td>
		      			<td>
		      				<a href="<?= base_url() ?>/company/scholarship/<?= $scholarship['id'] ?>" class="btn btn-primary">Lihat</a>
		      				<a href="<?= base_url() ?>/company/edit_scholarship/<?= $scholarship['id'] ?>" class="btn btn-primary">Edit</a>
		      				<a href="<?= base_url() ?>/company/verify_scholarship/<?= $scholarship['id'] ?>" class="btn btn-primary <?= $scholarship['status'] == 'verified' ? 'disabled' : '' ?>">Verifikasi</a>
		      			</td>
		      		</tr>
		      	<?php endforeach ?>
		      </tbody>
		    </table>
  		</div>
  	</div>
  </div>
</main>
<?= $this->endSection() ?>

<?= $this->section('import_script') ?>
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
<?= $this->endSection() ?>

<?= $this->section('custom_style') ?>
<script type="text/javascript">
$( document ).ready(function() {
	const table = $("#scholarship-table").DataTable();
});
</script>
<?= $this->endSection() ?>