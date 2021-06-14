<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Geratisin | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><b>GERATISIN PENGGUNA</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silakan Login </p>
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
    <?= form_open('/login') ?>
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="username" value="<?= old('username'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="password" value="<?= old('password'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close() ?>
      </form>
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?= base_url('Daftar_Pengguna') ?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>/public/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/public/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/public/template/dist/js/adminlte.min.js"></script>
</body>
</html>
