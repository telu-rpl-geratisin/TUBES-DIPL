<!DOCTYPE html>
<html>
<head>
	<title>test create user</title>
</head>
<body>
<h1>Create user</h1>
<form action="<?= base_url().'/create_user' ?>" method="POST" enctype="multipart/form-data">
	<?= csrf_field() ?>
	Profile Picture : <input type="file" name="profile_picture"><br><br>
	Type : <input type="text" name="type"><br><br>
	username : <input type="text" name="username"><br><br>
	email : <input type="text" name="email"><br><br>
	password : <input type="text" name="password"><br><br>
	name : <input type="text" name="name"><br><br>
	<button type="submit">submit</button>
</form>
</body>
</html>