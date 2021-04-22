<?= $this->extend('admin\admin_layout') ?>

<?= $this->section('main') ?>
	<table class="striped">
    <thead>
      <tr>
        <th>Username</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>No HP</th>
        <th>email</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($publik as $value): ?>
        <tr>
          <td><?= $value['username']; ?></td>
          <td><?= $value['nama_pengguna']; ?></td>
          <td><?= $value['tanggal_lahir']; ?></td>
          <td><?= $value['jenis_kelamin']; ?></td>
          <td><?= $value['no_HP']; ?></td>
          <td><?= $value['email']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

<?= $this->endSection() ?>