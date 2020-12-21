<?php

	session_start();
	session_destroy();
	echo "<div align='center'>Successfully logged out!!!<br><a href='login.php'>Login</a></div>";
	if(isset($_COOKIE['username'])&&isset($_COOKIE['password']))
	{
		$username = $_COOKIE['username'];
		$p = $_COOKIE['password'];
		setcookie('username',$username,time()-1);
		setcookie('password',$p,time()-1);
	}
?>