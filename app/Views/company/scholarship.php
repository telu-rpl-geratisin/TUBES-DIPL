<?= $this->extend('company/company_layout') ?>

<?= $this->section('main') ?>
<main id="main" class="mb-5 pb-5">
  <div class="header-image">
    <img src="<?= base_url() ?>/public/img/bg-balcony.jpg">
  </div>
  <div class="container">
    <h3 class="font-weight-bolder mt-5 mb-2">Daftar Beasiswa</h3>
    <hr>
    <div class="row">
      <?php foreach($scholarships as $scholarship): ?>
        <!-- single blog -->
        <div class="col-md-4 col-sm-4 col-xs-12 my-3">
          <div class="single-blog">
            <div class="single-blog-img">
              <a href="blog.html">
                <img src="<?= base_url() ?>/public/storage/images/<?= $scholarship['photo'] ?>" alt="">
              </a>
            </div>
            <div class="blog-text">
              <?php if($scholarship['type'] == 'company'): ?>
                <span class="badge badge-primary my-2">Perusahaan</span>
              <?php elseif($scholarship['type'] == 'public'): ?>
                <span class="badge badge-success my-2">Publik</span>
              <?php endif; ?>
              <h4>
                <a href="<?= base_url() ?>/company/scholarship/<?= $scholarship['id'] ?>"><?= $scholarship["name"] ?></a>
              </h4>
              <p>
                <?= word_limiter($scholarship['description'], 200) ?>
              </p>
            </div>
            <span>
              <a href="<?= base_url() ?>/company/scholarship/<?= $scholarship['id'] ?>" class="ready-btn">Lihat</a>
            </span>
          </div>
        </div>
        <!-- end single blog -->
      <?php endforeach; ?>
    </div>
  </div>
</main>
<?= $this->endSection() ?>