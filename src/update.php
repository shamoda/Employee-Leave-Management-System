<?php session_start(); ?>
<?php require_once('config.php'); ?>
<?php 

	//checking whether the user is logged in or not
	if (!isset($_SESSION['id'])) {
		header('Location: index.php');
	}



	if(isset($_GET['error'])){
		echo "<script> alert ('ERROR! Profile Update failed.');</script>";
	}

	if(isset($_GET['imgerror'])){
		echo "<script> alert ('ERROR! Image size is too big.');</script>";
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

<h1><center>Update My Profile</center></h1>
<center>
<div>
<div>
<fieldset class="formal bg" align="center">


<?php 

	$empID = $_SESSION['id'];

		$sql = "SELECT * FROM employee WHERE id = '$empID'";
		$result = mysqli_query($con, $sql);



		$data = mysqli_fetch_assoc($result);

		$id = $data['id'];
		$name = $data['name'];
		$email = $data['email'];
		$mobile = $data['mobile'];
		$designation = $data['designation'];

 ?>


<form method="post" name="Updatemyprofile" action="submitupdate.php" enctype="multipart/form-data">

<p>
<b>Employee ID        :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  name="id" value="<?php echo $id; ?>" readonly><br><br></p>
<p>
Name with intials        :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Enter Name" value="<?php echo $name; ?>" name="name" required><br><br></p>
<p>
Email        :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" placeholder="Enter Email" value="<?php echo $email; ?>" name="email" required><br><br></p>
<p>
Mobile number        :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="tel" placeholder="Enter mobile no" name="mobile" value="<?php echo $mobile; ?>" required><br><br></p>
<p>
Designation       :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Enter Employee Designation" value="<?php echo $designation; ?>" name="designation" required><br><br></p>
<p>
Upload a photo    :&nbsp;<input type="file" placeholder="Choose photo" name="photo"><br><br></p>

<button type="submit" name="submit" class="button btn button2"><span>Update</span></button><br><br>
</form>
</center>
</fieldset>
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

