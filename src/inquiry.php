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

	<title>Infinity Solutions LMS</title>
	
	<link rel="stylesheet" type="text/css" href="styles/inquiry.css">
	


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
	<h1>Employees' Inquiries</h1><br>
	
	<table  width="100%">
				<tr>
					<th>Inquire ID</th>
					<th>Employee ID</th>
					<th>Description</th>
					<th>E-mail</th>
					
					
				</tr>
				<?php 
				
					$sql = "SELECT * FROM inquiry ORDER BY inquireID DESC";
					$result = $con -> query($sql);
					if ($result -> num_rows > 0) {
						
						while($row = $result -> fetch_assoc()) {
							$id = $row["inquireID"];
						
							echo "<tr><td>".$row["inquireID"]."</td><td>"
							.$row["empID"]."</td><td>"
							.$row["description"]."</td><td>"
							.$row["email"]."</td></tr>";
						
						}
					
					}
					else {
						
						echo "<p style='background: #75E7F7'>No results found.</p>";
						
						}
						
					
				
					
					$con->close();
				
				?>
		
		</table>
	

</center>
	
	
	
	<br><br><br><br>
	<br><br><br><br>
	<br><br><br>














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