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
        <th>Aksi</th>
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
          <td>
            <a href="#detail-pengguna-modal" class="btn-info-user btn-floating btn waves-effect waves-light blue modal-trigger"><i class="material-icons">info</i></a>
            <a class="btn-floating btn waves-effect waves-light red"><i class="material-icons">delete</i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Modal Structure -->
  <div id="detail-pengguna-modal" class="modal">
    <div class="modal-content">
      <h4>Detail Pengguna</h4>
      <table class="striped">
        <tr>
          <th>Username</th>
          <td id="detail-username">andi</td>
        </tr>
        <tr>
          <th>Name</th>
          <td  id="detail-name">Andi Andidi</td>
        </tr>
        <tr>
          <th>Tanggal Lahir</th>
          <td  id="detail-tanggal-lahir">2000-01-01</td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td  id="detail-jenis-kelamin">Laki-laki</td>
        </tr>
        <tr>
          <th>No HP</th>
          <td  id="detail-no-hp">08123456789</td>
        </tr>
        <tr>
          <th>Email</th>
          <td  id="detail-email">andi@gmail.com</td>
        </tr>
      </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.modal');
      var instances = M.Modal.init(elems);

      document.querySelector('.btn-info-user').addEventListener('click', function() {
        const username = this.getAttribute('data-username');  
        const data = {
          "username": username
        };
        const res = fetch('http://localhost/DIPL-TUBES/user/get', 'POST', data);

        document.querySelector('#detail-username').innerHTML = res.username;
        document.querySelector('#detail-name').innerHTML = res.name;
        document.querySelector('#detail-tanggal-lahir').innerHTML = res.tanggal_lahir;
        document.querySelector('#detail-jenis-kelamin').innerHTML = res.jenis_kelamin;
        document.querySelector('#detail-no-hp').innerHTML = res.np_hp;
        document.querySelector('#detail-email').innerHTML = res.email;
      })
    });
  </script>

<?= $this->endSection() ?>