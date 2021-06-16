<?= $this->extend('public/public_layout') ?>

<?= $this->section('custom_style') ?>
<style type="text/css">
  .scholarship-meta-table th,
  .scholarship-meta-table td
  {
    padding: .5rem;
    padding-left: 0;
    padding-right: 1rem
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('alerts') ?>
<?php if(!empty(session('msg'))): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="z-index: 1000; position: fixed; top: 100px; right: 25px;">
    <strong><?= session('msg') ?>!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<main id="main" class="mb-5">
  <div class="header-image">
    <img src="<?= base_url() ?>/public/img/bg-balcony.jpg">
  </div>
  <div class="container pt-5">
    <!-- single-blog start -->
    <article class="blog-post-wrapper mb-5">
    <div class="row">
      <h2 class="mb-4"><?= $scholarship['name'] ?></h2>
      <div class="col-md-6">
        <div class="post-thumbnail">
          <a data-toggle="modal" data-target="#brochureModal">
            <img src="<?= base_url() ?>/public/storage/images/<?= $scholarship['photo'] ?>" alt="" />
          </a>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="post-information p-0">
            <div class="entry-meta flex-col mt-0">
              <table class="scholarship-meta-table">
                <tr>
                  <th>Dipost Oleh</th>
                  <td>
                    <img src="<?= base_url() ?>/public/storage/images/<?= $author_photo ?>" style="border-radius: 16px; width: 32px;"/>
                    &nbsp;&nbsp;<?= $author ?> <?= $author_verif == 'verified' ? '<span class="fas fa-check-circle text-info"></span>' : '' ?>    
                  </td>
                </tr>
                <tr>
                  <th>Rating</th>
                  <td><span class="fas fa-star text-warning"></span> <?= $rating ?> / 5</td>
                </tr>
                <tr>
                  <th>Batas Akhir Pendaftaran</th>
                  <td><?= $scholarship['end_date'] ?></td>
                </tr>
              </table>
            </div>
            <div class="entry-content">
              <p class="font-weight-bolder">Deskripsi :</p>
              <?= $scholarship['description'] ?>
            </div>
          </div>
      </div>
    </div>
    </article>

    <!-- Brochure Modal -->
    <div class="modal fade" id="brochureModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img class="w-100" src="<?= base_url() ?>/public/storage/images/<?= $scholarship['photo'] ?>" alt="" />
          </div>
        </div>
      </div>
    </div>

    <div class="single-post-comments">
      <div class="comments-area">
        <div class="comments-heading">
          <h3><?= count($comments)?> Komentar</h3>
        </div>
        <div class="comments-list">
          <ul>
            <?php foreach ($comments as $comment): ?>
              <li>
                <div class="comments-details">
                  <div class="comments-list-img">
                    <img style="width: 50px" src="<?= base_url() ?>/public/storage/images/<?= $comment['author_photo'] ?>" alt="post-author">
                  </div>
                  <div class="comments-content-wrap">
                    <span>
                      <b><a href="#"><?= $comment['author'] ?></a></b>
                      Diposting pada 
                      <span class="post-time"><?= $comment['created_at'] ?></span>
                    </span>
                    <p><?= $comment['comment'] ?></p>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="comment-respond">
          <h3 class="comment-reply-title">Tulis Komentar</h3>
          <form action="<?= base_url() ?>/pub/scholarship/<?= $scholarship['id'] ?>/comment" method="post">
            <?= csrf_field() ?>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 comment-form-comment">
                <p>Isi Komentar</p>
                <input type="hidden" name="author_username" value="<?= session('username') ?>">
                <textarea id="message-box" name="comment_text" cols="30" rows="10"></textarea>
                <input type="submit" value="Posting Komentar">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- single-blog end -->
  </div>
</main>
<?= $this->endSection() ?>
