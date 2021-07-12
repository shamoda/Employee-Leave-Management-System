<?php session_start(); ?>
<?php require_once('config.php'); ?>
<?php 

	

 ?>

<!DOCTYPE html>
<html>
<head>

	<title>Infinity Solutions LMS</title>
	
	<link rel="stylesheet" type="text/css" href="styles/forgetpassword.css">
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<script src="js/forgetpassword.js"></script>
	
	


</head>

<body>


<!--head section starts-->

	<hr class="hr">
	<img src="images/header.png" width="100%">
	<div>	
	<p class="nav"><b><a href="home.php" class="navbtn" >Home </a> <a href="aboutus.php" class="navbtn" >About Us </a>    <a href="contactus.php" class="navbtn" >Contact Us</a> <a href="logout.php" class="navbtn" >Log out</a></b></p>	
	</div>
		

	<hr class="hr"><br>
  <center>
  
  
  
<p ><b style ="color:black; font-size:40px;">Forgot password</b></p><br><br>
<div style="width:35%">
<p style="color:white; background: red"><b style="color:white;">Please verify it is you,</b></p><br>
<form action="submitforgetpwd.php" method="POST" onsubmit="return checkvalue()">

    <b>Enter employee id:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type= "text" name="id" class ="txt" required>
	  <br><br><br>
    <b>Enter your email:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="email" name="email" class ="emil" pattern="[a-z A-Z)0-9+%_-]+@[a-zA-Z]+\.[a-z]{2,3}" required>
	    <br><br><br>
    <b>Enter your mobile number:</b>
      <input type="tel"  name="mobile" class ="phn" required><br/>
	    <br><br><br>
     <p id="mid" class="para" style="color: black; background: #75E7F7" >Are you sure want to display your password ?</p><br/>
	 <button type="submit" class="button btn" name="submit"><span>Show</span></button>
      

	</form>

</div>
  </center>



	
	
	<br><br><br><br>
	







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