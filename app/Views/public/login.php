<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Login | Geratisin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

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
    <link href="<?= base_url() ?>/public/css/login.css" rel="stylesheet">
</head>
<body class="text-center">
    
<form action="<?= base_url() ?>/pub/login" method="post" class="form-signin">
  <?= csrf_field() ?>
  <h1 class="mb-5 font-weight-bolder">Geratisin</h1>
  <h1 class="h3 mb-3 font-weight-normal">Silahkan login</h1>
  
  <?php if(!empty(session('msg'))): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session('msg') ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
  
  <?php 
      $val_errors = session('val_errors');
      $data_error = session('data_error');
  ?>
  <?php if(!is_null($val_errors)): ?>
      <div class="alert alert-danger alert-dismissible">
          <ul>
              <?php foreach ($val_errors as $value): ?>
                 <li> <?= esc($value) ?> </li>
              <?php endforeach; ?>
          </ul>
      </div>
  <?php endif; ?>
  <?php if(!is_null($data_error)): ?>
      <div class="alert alert-danger alert-dismissible">
          <?= $data_error; ?>
      </div>
  <?php endif; ?>

  <label for="username" class="sr-only">Username</label>
  <input name="username" type="text" id="username" class="form-control" placeholder="Username" value="<?= old('username'); ?>" required autofocus>
  
  <label for="inputPassword" class="sr-only">Password</label>
  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" value="<?= old('password'); ?>" required>
  
  <p>Belum punya akun? <a href="<?= base_url() ?>/pub/register">Mendaftar sekarang</a></p>

  <button class="mt-3 btn btn-lg btn-primary btn-block" type="submit">Login</button>
  
  <p class="mt-5 mb-3 text-muted">&copy; Geratisin - 2021</p>
</form>


    
  </body>
</html>
