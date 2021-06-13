<!DOCTYPE html>
<html>
<head>
	<title>test upload</title>
</head>
<body>
<h1>upload image</h1>
<form action="<?= base_url().'/upload' ?>" method="POST" enctype="multipart/form-data">
	<?= csrf_field() ?>
	<input type="number" name="company_user_id" placeholder="id"><br><br>
	<input type="file" name="document"><br><br>
	<button type="submit">submit</button>
</form>
</body>
</html>