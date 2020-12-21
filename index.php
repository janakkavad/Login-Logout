<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
</head>
<body>
	<?php include "saveit.php" ?>
	<style type="text/css"><?php include 'style.css'; ?></style>
	<form method="post"  enctype="multipart/form-data">
		<label for="fname">Firstname: </label>
		<input type="text" name="fname" id="fname" placeholder="Firstname"><br>
		<label for="mname">Middlename: </label>
		<input type="text" name="mname" id="mname" placeholder="Middlename"><br>
		<label for="uname">Username: </label>
		<input type="text" name="uname" id="uname" placeholder="Username"><br>
		<label for="pwd">Password: </label>
		<input type="password" name="pwd" id="pwd"><br>
		<input type="file" name="profilepic" id="profilepic"><br>
		<button type="submit" name="submit">Register</button>
	</form>
	<hr>
	<a href="login.php"><button>Or login</button></a>
</body>
</html>