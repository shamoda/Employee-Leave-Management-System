<?php session_start(); ?>
<?php require_once('config.php'); ?>
<?php 

	//checking whether the user is logged in or not
	if (!isset($_SESSION['id'])) {
		header('Location: index.php');
	}

	if(isset($_GET['IDexists'])){
		echo "<script> alert ('User ID is already exists.');</script>";
	}

	if(isset($_GET['imgerror'])){
		echo "<script> alert ('ERROR! Image size is too big.');</script>";
	}

	if(isset($_GET['error'])){
		echo "<script> alert ('ERROR! While adding new user.');</script>";
	}

	if(isset($_GET['imgtype'])){
		echo "<script> alert ('ERROR! Invalid image type. Please upload jpg image.');</script>";
	}


 ?>

<!DOCTYPE html>
<html>
<head>
<title>Infinity Solutions LMS</title>
	
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
</head>

<body>

<!--head section starts-->

	<hr class="hr">
	<img src="images/header.png" width="100%">
	<div>	
	<p class="nav"><b><a href="home.php" class="navbtn" >Home </a> <a href="aboutus.php" class="navbtn" >About Us </a>    <a href="contactus.php" class="navbtn" >Contact Us</a> <a href="logout.php" class="navbtn" >Log out</a></b></p> 	
	</div>
	<hr class="hr">
<center>

<div>

<h1><center>Register a New Employee</center></h1><br>
<center>
<form method="POST" action="signup.php" enctype="multipart/form-data">
<p>
<b>Employee ID        :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Enter Employee ID" name="id" required><br><br></p>
<p>
<b>Name with intials        :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Enter Name" name="name" required><br><br></p>
<p>
<b>Email        :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" placeholder="Enter Email" name="email" required><br><br></p>
<p>
<b>Mobile number        :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="tel" placeholder="Enter mobile no" name="mobile" required><br><br></p>
<p>
<b>Register as 	:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select name="user">
					  <option value="0">Employee</option>
					  <option value="1">Administrative Officer</option>
					</select><br><br> </p>
<p>
<b>Designation       :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Enter Employee Designation" name="designation" required><br><br></p>
<p>
<b>Upload a photo    :</b><input type="file" placeholder="Choose photo" name="photo" required><br><br></p>
<p>
<b>Temporary Password:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password"  required><br><br></p>
<br>
<button type="submit" name="submit" class="button btn button2"><span>Register</span></button><br><br>

</form>
</center>	



<!--footer section starts-->


<hr class="hr"><br>
	<div class="footerdiv">
	<center>
		<h3 class="footer">Infinity Solutions (Pvt) Ltd</h3><br>
		<h5 class="footer">&copy; Copyright 2019 Infinity Solutions (Pvt) Ltd. All rights reserved.</h5>
	</center>
		





	
	</div>
</body>
</html>















