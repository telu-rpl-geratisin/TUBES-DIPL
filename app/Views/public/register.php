<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Mendaftar | Geratisin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>/public/css/register.css" rel="stylesheet">
</head>
<body class="bg-light">
    
<div class="container">
  <div class="py-5 text-center">
    <h1 class="mb-5 font-weight-bolder">Geratisin</h1>
    <h2>Form Pendaftaran</h2>
    <p class="lead">Silahkan isi form dibawah sesuai dengan data anda.</p>
  </div>

  <div class="row justify-content-center">
    <div class="" style="width: 100%; max-width: 400px;">

      <?php if(!empty(session('msg'))): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= session('msg') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <?php if(!empty(session('data_error'))): ?>
        <?php foreach (session('data_error') as $value): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $value ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <form action="<?= base_url() ?>/pub/register" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="fullname">Nama Lengkap</label>
          <input name="name" type="text" class="form-control" id="fullname" placeholder="" value="<?= old('name') ?>" required>
        </div>

        <div class="form-group mb-3">
          <label for="uploadPhoto">Upload Foto Profil <span class="text-muted">(Opsional)</span></label>
          <input name="photo" type="file" class="form-control-file" id="uploadPhoto">
        </div>

        <div class="mb-3">
          <label for="contact">No HP <span class="text-muted">(Opsional)</span></label>
          <input name="contact" type="text" class="form-control" id="contact" placeholder="" value="<?= old('contact') ?>">
        </div>

        <div class="mb-3">
          <label for="address">Alamat <span class="text-muted">(Opsional)</span></label>
          <input name="address" type="text" class="form-control" id="address" placeholder="" value="<?= old('address') ?>">
        </div>

        <div class="mb-3">
          <label for="postal_code">Kode Pos <span class="text-muted">(Opsional)</span></label>
          <input name="postal_code" type="number" class="form-control" id="postal_code" placeholder="" value="<?= old('postal_code') ?>">
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <input name="email" type="email" class="form-control" id="email" placeholder="pengguna@email.com" value="<?= old('email') ?>" required>
        </div>

        <div class="mb-3">
          <label for="username">Username</label>
          <input name="username" type="text" class="form-control" id="username" placeholder="pengguna123" value="<?= old('username') ?>" required>
        </div>

        <div class="mb-3">
          <label for="password">Password</label>
          <input name="password" type="password" class="form-control" id="password" placeholder="" value="<?= old('password') ?>" required>
        </div>

        <!-- <div class="mb-5">
          <label for="pass_confirm">Konfirmasi Password</label>
          <input name="pass_confirm" type="password" class="form-control" id="pass_confirm" placeholder="">
        </div> -->

        <button class="btn btn-primary btn-lg btn-block" type="submit">Mendaftar</button>
        <hr class="my-3">
        <p>Sudah punya akun? Kembali ke halaman <a href="<?= base_url() ?>/pub/login">Login</a></p>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mt-5 mb-3 text-muted">&copy; Geratisin - 2021</p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</div>
</body>
</html>
