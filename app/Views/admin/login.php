<!DOCTYPE html>
<html>
<head>
	<title>Login | GERATISIN</title>
	<!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- custom css for login -->
  <link rel="stylesheet" href="<?= base_url(); ?>/public/css/admin/login.css" />
</head>
<body>
	<main class="form-login">
		<form action="<?= base_url('admin/login/verify') ?>" method="post">
			<h1 class="text-center">GERATISIN</h1>
			<h5 class="text-center mb-5 fw-normal">ADMIN</h5>

      <?= csrf_field() ?>
      <div class="mb-3">
			  <label for="username" class="form-label">Username</label>
			  <input type="text" value="<?= set_value('username'); ?>" class="form-control <?= (isset($errors['username'])) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username') ?>">
        <div class="invalid-feedback">
          <?php if(isset($errors['username'])): ?>
            <?= $errors['username']; ?>
          <?php endif; ?>
        </div>		
      </div>
			<div class="mb-4">
			  <label for="user_password" class="form-label">Password</label>
			  <input type="password" value="<?= set_value('user_password'); ?>" class="form-control <?= (isset($errors['user_password'])) ? 'is-invalid' : ''; ?>" id="user_password" name="user_password" value="<?= old('user_password') ?>">
        <div class="invalid-feedback">
          <?php if(isset($errors['user_password'])): ?>
            <?= $errors['user_password']; ?>
          <?php endif; ?>
        </div>
      </div>

			<button type="submit" class="btn btn-primary w-100">Login</button>
			<p class="mt-5 mb-3 text-muted text-center">© 2021</p>
		</form>
	</main>
</body>
</html>