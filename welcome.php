<style type="text/css">	<?php include "style.css" ?></style>
<?php
	session_start();
	$uname = $_SESSION['uname'];

				////////////////////////connection to database//////////////////////////////

			$serveradd = "127.0.0.1";
			$servername = "root";
			$dbname = "jk";
			$conn = new mysqli($serveradd,$servername,"",$dbname);

			if($conn->connect_error)
			{
				die("ERROR!!!");
			}

			$sql = "SELECT filename from newform where uname = '$uname'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$fn = $row['filename'];
			}
			$conn->close();

		echo "<img id='profile' src='$fn' width='200px'><br><h1>Welcome $uname</h1><br>";
		echo "<a href='logout.php'>Logout</a>";

?>