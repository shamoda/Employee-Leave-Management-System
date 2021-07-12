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
		echo "<script> alert ('Your inquiry is under review. Administrative officer will contact you soon via E-mail.');</script>";
	}

	if(isset($_GET['error'])){
		echo "<script> alert ('ERROR! Inquiry failed.');</script>";
	}

	if(isset($_GET['limitexceeded'])){
		echo "<script> alert ('Your leave limit was exceeded. You cannot apply for leave. Please contact Administrative officer to extend your leave limit.');</script>";
	}

	if(isset($_GET['exceeding'])){
		echo "<script> alert ('ERROR! Your leave limit is exceeding. Contact Administrative Officer to extend your leave limit');</script>";
	}


  ?>

<!DOCTYPE html>
<html>
<head>

	<title>Infinity Solutions LMS</title>
	
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<link rel="stylesheet" type="text/css" href="styles/contactus.css">
	<script src="js/contactus.js"></script>


</head>

<body>

<!--head section starts-->

	<hr class="hr">
	<img src="images/header.png" width="100%">
	<div>	
	<p class="nav"><b> <a href="home.php" class="navbtn" >Home </a> <a href="aboutus.php" class="navbtn" >About Us </a>    <a href="#" class="navbtn" >Contact Us</a> <a href="logout.php" class="navbtn" >Log out</a></b></p>
	</div>
	<hr class="hr">
	<br><br>
	
	<p align="center" class="title"><b>Contact Us</b></p><br><br><br>
	
	<section>
	<nav>
	<div>
	<p>
	<b>Head Office</b><br><br>
	Infinity Solutions (Pvt) Ltd<br>
	Kandy Road, Malabe.<br>
	Tel : 011 2234807 <br> &nbsp; &nbsp; &nbsp; &nbsp; 011 2234888 <br> 
	Fax : 011 3435488 <br>
	E-mail : infinitysolutions@gmail.com <br> 
	</p>
	
	
	</div>
	
	
	<div>
	<p><br>
	<b>Colombo Branch</b><br><br>
	Infinity Solutions (Pvt) Ltd <br>
	Main street, Colombo. <br>
	Tel : 011 2452544 <br>
	Fax : 011 2453422 <br>
	E-mail : supportinfinity@gmail.com <br>
	</p>
	</div>
	</nav>
	
	
	
	<artical><br>
	<div>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798511757687!2d79.97075581472053!3d6.914677495003798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri+Lanka+Institute+of+Information+Technology!5e0!3m2!1sen!2slk!4v1566576495003!5m2!1sen!2slk" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	</artical>
	
	
	</section><br><br><br><br>
	
	
	<div class="inquire">
	
	<div class="popup issue" onclick="contactus()">  <b>Any Issue ?</b> &nbsp;&nbsp; click me... <span class="popuptext" id="clickme"> <b>Got an issue ? </b><br><br> Just fill the below form briefly to contact an administrative officer. <br><br></span></div>  <br><br>
	
	
	<form method="POST" action="submitinquire.php">
	Contact company management :  <input type="text" class="input" placeholder="employee id" name="empid" value="<?php echo $_SESSION['id']; ?>" readonly><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="email" class="input" placeholder="E-mail" name="email" required><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <textarea rows="4" class="input" placeholder="your inquiry" name="inquiry" required></textarea>&nbsp;&nbsp;&nbsp;
	<button type="submit" name="submit" class="button btn"><span>Submit</span></button><br>
	</form>

	</div>




<br><br><br><br><br>




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