<?php

	$firstname = "";
	$middlename = "";
	$username = "";
	$password = "";
	if(isset($_POST['submit']))
	{
			$firstname = $_POST['fname'];
			$middlename = $_POST['mname'];
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


						/////////////////////////////uploading photo///////////////////////////////
		$folder = "fileuploads/";
		$file_type = strtolower(pathinfo(basename($_FILES['profilepic']['name']),PATHINFO_EXTENSION));
		$idd = uniqid();
		$filename = $folder.$idd.".".$file_type;

		$imagesize = getimagesize($_FILES['profilepic']['tmp_name']);

		if($imagesize==true)
		{
			$upload = 1;
		}

		else
		{
			$upload = 0;
		}

		if(file_exists($filename))
		{
			$upload = 0;
			echo "File already exist.";
		}

		if($_FILES['profilepic']['size']>5000000)
		{
			$upload = 0;
			echo "Too large file";
		}

		if($file_type!="jpg" &&$file_type!="png" && $file_type!="jpeg" && $file_type!="gif")
		{
			echo "File format not supported!!"."<br>";
			$upload = 0;
		}
		if($upload == 1)
		{
			if(move_uploaded_file($_FILES['profilepic']['tmp_name'], $filename))
			{
			
			}
		}
		else
		{
			echo "File is not uploaded.";
		}
								////////////////////////uploading data to DB///////////////////////////////

		$setdata = $conn->prepare("insert into newform values (?,?,?,?,?)");
		$setdata->bind_param("sssss",$firstname,$middlename,$username,$password,$filename);
		$setdata->execute();
		$setdata->close();
	}
?>