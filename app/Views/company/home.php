<?= $this->extend('company/company_layout') ?>

<?= $this->section('main') ?>
<!-- ======= hero Section ======= -->
<section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active" style="background-image: url('<?= base_url() ?>/public/template3/assets/img/hero-carousel/1.jpg')">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Bersekolah Tidak Harus Mahal </h2>
              <p class="animate__animated animate__fadeInUp">Kemenangan adalah seuatu hal yang harus kalian rencanakan kawan</p>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url('<?= base_url() ?>/public/template3/assets/img/hero-carousel/2.jpg')">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Jika Ada Sesuatu Yang Tidak Hilang Sesuatu Itu Adalah Ilmu </h2>
              <p class="animate__animated animate__fadeInUp">Membantu tidak membuat apa yang kita memiliki </p>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url('<?= base_url() ?>/public/template3/assets/img/hero-carousel/3.jpg')">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Jika Ada Kemiskinan Di Situ Pendidikan Tidak Merata</h2>
              <p class="animate__animated animate__fadeInUp">Yang Pintar Mencurangi Yang Bodoh Begitulah Cara Kerja Dunia Ini</p>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section><!-- End Hero Section -->"

<main id="main">
  <!-- ======= Beasiswa Section ======= -->
  <div id="beasiswa" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Beasiswa Pilihan</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach($scholarships as $scholarship): ?>
            <!-- single blog -->
            <div class="col-md-4 col-sm-4 col-xs-12">
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
                    <a href="<?= base_url() ?>/pub/scholarship/<?= $scholarship['id'] ?>"><?= $scholarship["name"] ?></a>
                  </h4>
                  <p>
                    <?= word_limiter($scholarship['description'], 200) ?>
                  </p>
                </div>
                <span>
                  <a href="<?= base_url() ?>/pub/scholarship/<?= $scholarship['id'] ?>" class="ready-btn">Lihat</a>
                </span>
              </div>
            </div>
            <!-- end single blog -->
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- End Beasiswa Section -->
</main>
<?= $this->endSection() ?>