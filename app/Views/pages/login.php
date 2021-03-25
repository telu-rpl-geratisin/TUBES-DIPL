<!DOCTYPE html>
<html>
<head>
	<title>Login | GERATISIN</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<div class="login-page">
		<div class="card center">
			<h2 class="title">Login</h2>
			<form class="login-form">
				<div class="form-section__wrapper">
					<div class="form-section__label">Tipe Pengguna :</div>
					<div class="form-section__input">
						<input type="radio" id="input-public" name="user-type" value="public">
		  				<label for="public">Publik</label><br>
		  				<input type="radio" id="input-company" name="user-type" value="company">
		  				<label for="input-company">Perusahaan</label><br>
		  				<input type="radio" id="input-admin" name="user-type" value="admin">
		  				<label for="input-admin">Admin</label><br>
		  			</div>
		  		</div>
		  		<div class="form-section__wrapper">
		  			<div class="form-section__label">Username :</div>
		  			<div class="form-section__input">
		  				<input type="text" id="input-username" name="username">
		  			</div>
		  		</div>
		  		<div class="form-section__wrapper">
		  			<div class="form-section__label">Password :</div>
		  			<div class="form-section__input">
		  				<input type="password" id="input-password" name="password">
		  			</div>
		  		</div>
		  		<button class="form-section__button" type="submit">Login</button>
			</form>

		</div>
	</div>
</body>
</html>