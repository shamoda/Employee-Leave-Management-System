<?php session_start(); ?>
<?php require_once('config.php'); ?>
<?php 

	//checking whether the user is logged in or not
	if (!isset($_SESSION['id'])) {
		header('Location: index.php');
	}

	if(isset($_GET['removed'])){
		echo "<script> alert ('Employee removed from the system successfuly.');</script>";
	}

	if(isset($_GET['notremoved'])){
		echo "<script> alert ('ERROR! While removing the employee.');</script>";
	}


	if(isset($_GET['success'])){
		echo "<script> alert ('New employee added to the system.');</script>";
	}


 ?>

<!DOCTYPE html>
<html>
<head>
<script src="js/manageemployees.js"></script>	
	<title>Manage Employees</title>
	
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<link rel="stylesheet" type="text/css" href="styles/manageemployees.css">

</head>

<body>

<!--head section starts-->

	<hr class="hr">
	<img src="images/header.png" width="100%">
	<div>	
	<p class="nav"><b><a href="home.php" class="navbtn" >Home </a> <a href="aboutus.php" class="navbtn" >About Us </a>    <a href="contactus.php" class="navbtn" >Contact Us</a> <a href="logout.php" class="navbtn" >Log out</a></b></p> 	
	</div>
	<hr class="hr">
	<br>
	<p align="center" class="admin"><b>Manage Employees</b></p>

	<p class="add"><button  type='submit' class='button btn' ><a href='register.php' style="font-size: 20px;" ><span>Add New Employee</span></a></button></p>

	<br><br><br><br>
	<section>
	<article>
	<div style="background-color:lightblue" align="center">
	<div >
	

		<table  width="100%">
					<tr>
						<th>Employee ID</th>
						<th>Employee Name</th>
						<th>Designation</th>
						<th>Remove Employee</th>
						
					</tr>
					<?php 
					
						$sql = "SELECT * FROM employee ORDER BY id";
						$result = $con -> query($sql);
						if ($result -> num_rows > 0) {
							
							while($row = $result -> fetch_assoc()) {
								$id = $row["id"];
								

							
								echo "<tr><td>".$row["id"]."</td><td>"
								.$row["name"]."</td><td>"
								.$row["designation"]."</td><td><button type='submit' class='button btn' ><a href='remove.php?id=$id'><span>Remove</span></a></button>
								</td></tr>";
							
							}
						
						}
						else {
							
							echo "<p style='background: #75E7F7'>No results found.</p>";
							
							}
							
						
					
						
						$con->close();
					
					?>
			
			</table>












</div>			
			
	</article>
	</section>
	
	<br><br><br><br><br><br><br><br><br><br>
	


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