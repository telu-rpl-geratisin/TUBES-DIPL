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
		<form>
			<h1 class="text-center mb-5">GERATISIN</h1>
			<div class="mb-3">
			  <label for="username" class="form-label">Username</label>
			  <input type="text" class="form-control" id="username" placeholder="">
			</div>
			<div class="mb-3">
			  <label for="password" class="form-label">Password</label>
			  <input type="password" class="form-control" id="password" placeholder="">
			</div>
			<div class="mb-4">
				<label for="user-type" class="form-label">Tipe Pengguna:</label>
				<select class="form-select" id="user-type" aria-label="Default select example">
				  <option selected>Pilih</option>
				  <option value="1">Publik</option>
				  <option value="2">Perusahaan</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary w-100">Login</button>
			<p class="mt-5 mb-3 text-muted text-center">© 2021</p>
		</form>
	</main>
</body>
</html>