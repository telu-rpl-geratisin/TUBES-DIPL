<?= $this->extend('company/company_layout') ?>

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
        <h3 class="font-weight-bolder mb-5">Informasi Verifikasi Perusahaan</h3>
        <p>Siapkan Dokumen Berikut :</p>
        <ul>
          <li>1. Profil Perusahaan</li>
          <li>2. NPWP Perusahaan</li>
          <li>3. Fotocopy KTP Direktur</li>
          <li>4. Link Website (Opsional)</li>
        </ul>
        <p>Satukan dokumen tersebut dalam 1 file pdf, kemudian upload pada halaman verifikasi perusahaan</p>
        <p>Kembali ke <a href="<?= base_url() ?>/company/verify_company/<?= $company_id ?>">Halaman Verifikasi Perusahaan</a></p>
      </div>
    </div>
  </div>
</main>
<?= $this->endSection() ?>
