<?php session_start(); ?>
<?php require_once('config.php'); ?>
<?php 

	//checking whether the user is logged in or not
	if (!isset($_SESSION['id'])) {
		header('Location: index.php');
	}

 ?>

 <?php 

 	if(isset($_GET['success'])){
		echo "<script> alert ('Your Password Changed Successfuly.');</script>";
	}

	if(isset($_GET['error'])){
		echo "<script> alert ('ERROR! While updating the password.');</script>";
	}

	if(isset($_GET['unmatched'])){
		echo "<script> alert ('ERROR! New passwords does not match. Re-enter passwords.');</script>";
	}

	if(isset($_GET['currentpwderror'])){
		echo "<script> alert ('ERROR! Current password does not match. Re-enter current password');</script>";
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
	<p class="nav"><b> <a href="home.php" class="navbtn" >Home </a> <a href="aboutus.php" class="navbtn" >About Us </a>    <a href="contactus.php" class="navbtn" >Contact Us</a> <a href="logout.php" class="navbtn" >Log out</a></b></p>  	
	</div>
	<hr class="hr">
	
		
<div class = "container">

<br>
<p align="center" class="admin"><b>Change Password</b></p><br><br>


<center>
<form method="POST" action="changepwd.php">
<p><b>
Enter current password: <input type="password" name="cpassword" required><br><br><br></p>
<p>
Enter new password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password"  name="npassword" required><br><br><br></p>
<p>
Re-Enter new password: <input type="password"  name="rpassword" required><br><br><br></p>


<button type="submit" name="submit" class="button btn button2"><span>Change Password</span></button><br><br><br>	
</form>
</center>
</div>	
</div>

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











