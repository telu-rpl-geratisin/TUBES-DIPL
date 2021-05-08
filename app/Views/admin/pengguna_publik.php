<?= $this->extend('admin\admin_layout') ?>

<?= $this->section('custom_head') ?>

<?= $this->endSection('custom_head') ?>

<?= $this->section('main') ?>
	<div class="card p-3">
		<h5 class="fw-bold mb-3">Pengguna Publik</h5>
		<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user['nama_depan'].' '.$user['nama_belakang']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['tanggal_lahir']; ?></td>
                    <td><?= $user['jenis_kelamin']; ?></td>
                    <td><?= $user['no_hp']; ?></td>
                    <td>NONE</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
	    $('#example').DataTable();
		} );
	</script>
<?= $this->endSection('main') ?>