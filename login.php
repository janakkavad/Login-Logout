<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
 	<style type="text/css">	<?php include "style.css" ?></style>
	<form method="post" action="authenticate.php">
		<label for="uname">Username: </label>
		<input type="text" name="uname" id="uname" placeholder="Username"><br>
		<label for="pwd">Password: </label>
		<input type="password" name="pwd" id="pwd"><br>
		<label for="remember">Remember me</label>
		<input type="checkbox" id="remember" value="yes" name="remember"><br>
		<button type="submit" name="submit">Login</button>
	</form>
	<hr>
	<a href="index.php"><button>Or Register</button></a>
</body>
</html>
<?php
	if(isset($_COOKIE['username'])&&isset($_COOKIE['password']))
	{
		$username = $_COOKIE['username'];
		$p = $_COOKIE['password'];
		echo "<script>
				document.getElementById('uname').value = '$username';
				document.getElementById('pwd').value = '$p';
		</script>";
	}

?>