<?php session_start(); ?>
<?php require_once('config.php'); ?>
<?php 

	//checking whether the user is logged in or not
	if (!isset($_SESSION['id'])) {
		header('Location: index.php');
	}

 ?>

<!DOCTYPE html>
<html>
<head>
			
<title>Management</title>
	<script src="js/action.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<link rel="stylesheet" type="text/css" href="styles/action.css">
</head>

<body>

<!--head section starts-->

	<hr class="hr">
	<img src="images/header.png" width="100%">
	<div>	
	<p class="nav"><b> <a href="home.php" class="navbtn" >Home </a> <a href="aboutus.php" class="navbtn" >About Us </a>    <a href="contactus.php" class="navbtn" >Contact Us</a> <a href="logout.php" class="navbtn" >Log out</a></b></p>	
	</div>
	<hr class="hr">
	<br><br>
	<h1 align="center"><b>Leave Details</b></h1>
	<br><br>
<section>
	<article>
	<div  align="center">
	<div class="row">
	
		<table >



			<tr>
					<th>Leave Type</th>
					<th>Description</th>
					<th>From Date</th>
					<th>To Date</th>
					<th>Action</th>
					
				</tr>
				<?php 

					$leaveid = $_GET['id'];
				
					$sql = "SELECT * FROM emp_leave WHERE leaveID = '$leaveid'";
					$result = $con -> query($sql);
					if ($result -> num_rows > 0) {
						
						while($row = $result -> fetch_assoc()) {
							$id = $row["leaveID"];
						
							echo "<tr><td>".$row["leaveType"]."</td><td>"
							.$row["description"]."</td><td>"
							.$row["fromDate"]."</td><td>"
							.$row["toDate"]."</td><td><button type='submit' class='button btn' ><a href='approve.php?id=$id'><span>Approve</span></a></button>
							<button type='submit' class='button btn' ><a href='reject.php?id=$id'><span>Reject</span></a></button></td></tr>";
						
						}
					
					}
					else {
						
						echo "No results found.";
						
						}
						
					
				
					
					$con->close();
				
				?>




</table>

	</article>
	</section>
	<br><br>
	
	<br><br><br><br><br><br>
	
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