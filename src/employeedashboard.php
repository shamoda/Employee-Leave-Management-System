<?php session_start(); ?>
<?php require_once('config.php'); ?>
<?php 

	//checking whether the user is logged in or not
	if (!isset($_SESSION['id'])) {
		header('Location: index.php');
	}


	//displaying popup messages according to the reason.
	if(isset($_GET['leaveapplied'])){
		echo "<script> alert ('Leave applied successfuly. Your leave application is under review.');</script>";
	}

	if(isset($_GET['error'])){
		echo "<script> alert ('ERROR! your leave application was failed.');</script>";
	}

	if(isset($_GET['dayerror'])){
		echo "<script> alert ('ERROR! Leave period is invalid.');</script>";
	}


	if(isset($_GET['succesful'])){
		echo "<script> alert ('Profile Updated successfully.');</script>";
	}

	

 ?>

 <?php 
 //retrive relavent data 

 	$empID = $_SESSION['id'];

		$sql = "SELECT * FROM employee WHERE id = '$empID'";
		$result = mysqli_query($con, $sql);


		$data = mysqli_fetch_assoc($result);
		$username = $data['name'];
		$designation = $data['designation'];

		$sql = "SELECT * FROM leave_balance WHERE empID = '$empID'";
		$result = mysqli_query($con, $sql);


		$data = mysqli_fetch_assoc($result);
		$num = $data['num'];
		

  ?>

<!DOCTYPE html>
<html>
<head>

	<title>Infinity Solutions LMS</title>
	
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<link rel="stylesheet" type="text/css" href="styles/employeedashboard.css">
	


</head>

<body>

<!--head section starts-->

	<hr class="hr">
		<img src="images/header.png" width="100%">
	<div>	
	<p class="nav"><b> <a href="home.php" class="navbtn" >Home </a>  <a href="aboutus.php" class="navbtn" >About Us </a>    <a href="contactus.php" class="navbtn" >Contact Us</a> <a href="logout.php" class="navbtn" >Log out</a></b></p>  	
	</div>
	
	<hr class="hr">
	<br>
	
	<div>
	<section>
	<nav>
	<div align="center">
		<img <?php echo "src=images/profile/".$_SESSION['id'].".jpg"; ?> alt="profile picture" id="propic" width="150" height="150">
		<br><br><br>
		<p id="designation"><b><?php echo $designation; ?></b></p><br>
		<p id="empid"><b><?php echo $_SESSION['id']; ?></b></p><br>
		<p id="name"><b><?php echo $username; ?></b></p><br><br><br><br><br><br><br>
		
		
		<div>
		<button type="button" class="button btn"><a href="leavehistory.php?id=<?php echo $_SESSION['id'] ?>"><span>My Leave History</span></a></button><br><br>
		<a href="update.php" name="update" class="link">Update My Profile</a><br><br>
		<a href="changepassword.php" name="changepassword" class="link">Change Password</a><br>
		</div>
	</div>
	</nav>
	
	
	<article>
	<p align="center" class="admin"><b>My Dashboard</b></p><br><br><br>
	
	
	<div>
	<div class="row">
		<div class="column1">
		
		<div class="row">
		<div class="columnlabel" align="center">
		<b style="color: red;">Leave Balance   :</b><br><br><br><br>
		<b>Employee ID   :</b><br><br><br><br>
		<b>Leave Type   :</b><br><br><br><br>
		<b>From Date   :</b><br><br><br><br>
		<b>To Date   :</b><br><br><br><br>
		<b>Description   :</b><br><br><br><br>
		
		
		
		
		</div>
		<div class="columninput">
		
		<form method="POST" name="applyleave" action="applyleave.php">
		<input type="text" name="num" placeholder="Leave Balance" class="inputarea" value="<?php echo $num; ?>" readonly><br><br><br><br>
		
		<input type="text" name="empid" placeholder="employee id" class="inputarea" value="<?php echo $_SESSION['id']; ?>" readonly><br><br><br><br>
		
		<select class="inputarea" name="leavetype" required>
		<option value="Casual">Casual Leave</option>
		<option value="Medical">Medical Leave</option>
		<option value="Study">Study Leave</option>
		<option value="Other">Other</option>
		</select><br><br><br><br>
		
		<input type="date" name="fromdate" class="inputarea" required><br><br><br><br>
		
		<input type="date" name="todate" class="inputarea" required><br><br><br>
		
		<textarea rows="4" cols="22" name="description" placeholder="futher details" class="inputarea" required></textarea><br><br><br>
		
		
		<button type="submit" class="button btn button2" name="submit"><span>Apply Leave</span></button><br>
		</form>
		
		</div>
		
	
		
		
	</div>
		
		
		
		</div>
		<div class="column2">
		<iframe src="https://calendar.google.com/calendar/embed?height=350&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FColombo&amp;showTz=0&amp;showCalendars=0&amp;showTabs=0&amp;showPrint=0&amp;showDate=1&amp;showNav=1&amp;showTitle=0&amp;src=ZW4ubGsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%230B8043" style="border-width:0" width="300" height="350" frameborder="0" scrolling="no"></iframe>
		
		
		</div>
		
	
		
		
	</div>
	</div>
	
	<br><br>

	</article>
	</section>
	</div>




	<br>



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