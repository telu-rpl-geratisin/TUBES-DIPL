<?= $this->extend('company/company_layout') ?>

<?= $this->section('custom_style') ?>
<style type="text/css">
  .edit-scholarsip {
    width: 600px;
    margin: 0 auto;
  }
  .edit-scholarsip-card{
    margin-top: -50px;
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<main id="main" class="mb-5">
  <div class="header-image">
    <img src="<?= base_url() ?>/public/img/bg-balcony.jpg">
  </div>
  <div class="edit-scholarsip container">
    <div class="card edit-scholarsip-card">
      <div class="card-body p-5">
        <?php if(!empty(session('msg'))): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session('msg') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <h3 class="font-weight-bolder">Form Verifikasi Perusahaan</h3>
        <h5>Untuk <?= $company_name ?></h5>
        <span>Lihat petunjuk terkait dokumen verifikasi perusahaan <a href="<?= base_url() ?>/company/company_verification_instruction">Disini</a>.</span>

        <form class="mt-4" action="<?= base_url() ?>/company/verify_company/<?= $company_id ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <div class="form-group mb-3">
            <label for="uploadDoc">Upload Dokumen Verifikasi</label>
            <input name="document" type="file" class="form-control-file" id="uploadDoc">
          </div>

          <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Ajukan Verifikasi Perusahaan</button>
          
          <p>Kembali ke <a href="<?= base_url() ?>/company/profile">Halaman Profil</a></p>

          
        </form>
      </div>
    </div>
  </div>
</main>
<?= $this->endSection() ?>
