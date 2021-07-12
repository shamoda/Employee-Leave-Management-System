<?php 
	
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "lms";

	$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

	if (!$con) {
		die("Database connection failed".mysqli_connect_error());
	}


 ?>