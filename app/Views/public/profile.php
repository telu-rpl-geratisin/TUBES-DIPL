<?= $this->extend('public/public_layout') ?>

<?= $this->section('custom_style') ?>
<style type="text/css">
  .profile-details {
  }
  #profile-picture {
    height: 250px;
    width: 250px;
    object-fit: cover;
    margin-top: -50px;
  }
  .profile-details-table th, 
  .profile-details-table td 
  {
    padding: .5rem 1.25rem .5rem 0;
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<main id="main" class="mb-5">
  <div class="header-image">
    <img src="<?= base_url() ?>/public/img/bg-balcony.jpg">
  </div>
  <div class="profile-details container">
    <div class="row">
      <div class="col-4 px-5">
        <img id="profile-picture" src="<?= base_url() ?>/public/storage/images/<?= $user_data['photo'] ?>">
      </div>
      <div class="col-8 py-5">
        
        <?php if(!empty(session('msg'))): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session('msg') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <h3 class="font-weight-bolder mb-3"><?= $user_data['name'] ?></h3>
        <table class="profile-details-table mb-4">
          <tr>
            <th>Tipe Pengguna</th>
            <td><?= $user_data['type'] ?></td>
          </tr>
          <tr>
            <th>Username</th>
            <td><?= $user_data['username'] ?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?= $user_data['email'] ?></td>
          </tr>
          <tr>
            <th>Username</th>
            <td><?= $user_data['username'] ?></td>
          </tr>
          <tr>
            <th>No HP</th>
            <td><?= $user_data['contact'] ?></td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td><?= $user_data['address'] ?></td>
          </tr>
          <tr>
            <th>Kode Pos</th>
            <td><?= $user_data['postal_code'] ?></td>
          </tr>
        </table>
        <a href="<?= base_url() ?>/pub/edit_profile" class="btn btn-primary">Ubah Data Profil</a>
      </div>
    </div>
  </div>
</main>
<?= $this->endSection() ?> 
