<?= $this->extend('public/public_layout') ?>

<?= $this->section('custom_style') ?>
<style type="text/css">
  .edit-profile {
    width: 600px;
    margin: 0 auto;
  }
  .edit-profile-card{
    margin-top: -50px;
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<main id="main" class="mb-5">
  <div class="header-image">
    <img src="<?= base_url() ?>/public/img/bg-balcony.jpg">
  </div>
  <div class="edit-profile container">
    <div class="card edit-profile-card">
      <div class="card-body p-5">
        <h3 class="font-weight-bolder mb-5">Form Edit Profil</h3>
        <form action="<?= base_url() ?>/pub/edit_profile/<?= $user_data['id'] ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="mb-3">
            <label for="fullname">Nama Lengkap</label>
            <input name="name" type="text" class="form-control" id="fullname" value="<?= $user_data['name'] ?>">
          </div>

          <div class="form-group mb-3">
            <label for="uploadPhoto">Upload Foto Profil Baru</span></label>
            <input name="photo" type="file" class="form-control-file" id="uploadPhoto">
          </div>

          <div class="mb-3">
            <label for="contact">No HP</label>
            <input name="contact" type="text" class="form-control" id="contact" value="<?= $user_data['contact'] ?>">
          </div>

          <div class="mb-3">
            <label for="address">Alamat</label>
            <input name="address" type="text" class="form-control" id="address" value="<?= $user_data['address'] ?>">
          </div>

          <div class="mb-4">
            <label for="postal_code">Kode Pos</label>
            <input name="postal_code" type="number" class="form-control" id="postal_code" value="<?= $user_data['postal_code'] ?>" >
          </div>

          <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Edit Profil</button>
          
          <p>Kembali ke <a href="<?= base_url() ?>/pub/profile">Halaman Profil</a></p>

          
        </form>
      </div>
    </div>
  </div>
</main>
<?= $this->endSection() ?>
