<style type="text/css">	<?php include "style.css" ?></style>
<?php 

	$username = "";
	$password = "";
	if(isset($_POST['submit']))
	{
		if(isset($_POST['uname'])&&isset($_POST['pwd']))
		{

			$username = $_POST['uname'];
			$password = $_POST['pwd'];

									////////////////////////connection to database//////////////////////////////

			$serveradd = "127.0.0.1";
			$servername = "root";
			$dbname = "jk";
			$conn = new mysqli($serveradd,$servername,"",$dbname);

			if($conn->connect_error)
			{
				die("ERROR!!!");
			}

									//////////////////////////fetching data///////////////////////////////////

			$sql = "SELECT uname,password FROM newform WHERE uname = '$username' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$p = $row['password'];
				if($p==$password)
				{
					if(isset($_POST['remember']))
					{
						setcookie('username',$username,time()+60*60*7);
						setcookie('password',$p,time()+60*60*7);
					}
					session_start();
			 		$_SESSION['uname'] = $username;
					header('location:welcome.php');
				}
				else
				{
					echo "<div id='profile'>Incorrect password entered!!!<br><a href='login.php'>Try again</a></div>";
				}	
			}
			else
			{
				echo "<div id='profile'>Invalid credentials entered!!!<br><a href='login.php'>Try again</a></div>";
			}
		}
		else
		{
			echo "<div id='profile'>Enter username and password<br><a href='login.php'>Login again</a></div>";
		}	
	}

?>