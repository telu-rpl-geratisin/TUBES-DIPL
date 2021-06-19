<?= $this->extend('company/company_layout') ?>

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
    <strong><?= session('msg') ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<?php if(!empty(session('error_msg'))): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert" style="z-index: 1000; position: fixed; top: 100px; right: 25px;">
    <strong><?= session('error_msg') ?>!</strong>
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
                  <td>
                    <span class="fas fa-star text-warning"></span> <?= $rating ?> / 5&nbsp;&nbsp;
                    <?php if($allow_rating): ?>
                      <a data-toggle="modal" data-target="#ratingModal" class="btn btn-primary">Beri Rating</a>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <th>Batas Akhir Pendaftaran</th>
                  <td><?= $scholarship['end_date'] ?></td>
                </tr>
                <tr>
                  <th>Link</th>
                  <td><a href="<?= $scholarship['link'] ?>">Buka Link</a></td>
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
                      <?php if($comment['user_id'] == session('user_id')): ?>
                        <button data-toggle="modal" data-target="#deleteCommentModal" class="btn btn-danger btn-sm text-light" data-comment-id="<?= $comment['id'] ?>">hapus</button>
                      <?php endif; ?>
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
          <form action="<?= base_url() ?>/company/scholarship/<?= $scholarship['id'] ?>/comment" method="post">
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

<!-- Rating Modal -->
<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ratingModalLabel">Beri Rating</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>/company/insert_rating" method="post">
          <?= csrf_field() ?>
          <input type="hidden" name="scholarship_id" value="<?= $scholarship['id'] ?>">
          <input type="hidden" name="user_id" value="<?= session('user_id') ?>">
          <div class="form-group">
            <label for="inputRating">Rating</label>
            <input name="rating" type="number" class="form-control" id="inputRating" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Masukkan angka 1 - 5</small>
          </div>
          <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Input</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete Confirm Modal -->
<div class="modal fade" id="deleteCommentModal" tabindex="-1" aria-labelledby="deleteCommentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCommentModalLabel">Hapus Komentar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          Anda yakin ingin menghapus komentar ini?
      </div>
      <div class="modal-footer justify-content-center">
          <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <a id="btnDeleteComment" href="" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('custom_script') ?>
<script type="text/javascript">
$('#deleteCommentModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var commentId = button.data('comment-id'); // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-footer #btnDeleteComment').attr('href', '<?= base_url() ?>/company/delete_comment/'+commentId);
})
</script>
<?= $this->endSection() ?>