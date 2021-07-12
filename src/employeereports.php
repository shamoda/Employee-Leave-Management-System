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
	
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<link rel="stylesheet" type="text/css" href="styles/employeereports.css">
	


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
      <h1>Employee Reports</h1>
	
<form method="POST" action=""><b>Search by Employee ID : </b><input type="text" name="search" placeholder="search by id..." required> <input type="submit" class="button btn button2" name="submit" value="search" ></form><br>

			<table  width="100%">
			<tr>
				<th>Leave ID</th>
				<th>Employee ID</th>
				<th>Leave Type</th>
				<th>From Date</th>
				<th>To Date</th>
				<th>Status</th>
				
				
			</tr>
		
			<?php 



			if(!isset($_POST['submit'])){
			
				$sql = "SELECT leaveID, empID, leaveType, status, fromDate, toDate FROM emp_leave ORDER BY leaveID DESC";
				$result = $con -> query($sql);
				if ($result -> num_rows > 0) {
					
					while($row = $result -> fetch_assoc()) {
						$id = $row["leaveID"];
						$statusTmp = $row["status"];

						if($statusTmp == 0){

							$status = 'Not reviewed';

						}else if($statusTmp == 1){

							$status = 'Approved';

						}else if($statusTmp == 2){

							$status = 'Rejected';

						}

					
						echo "<tr><td>".$row["leaveID"]."</td><td>"
						.$row["empID"]."</td><td>"
						.$row["leaveType"]."</td><td>"
						.$row["fromDate"]."</td><td>"
						.$row["toDate"]."</td><td>"
						.$status."</td></tr>";
					
					}
				
				}
				else {
					
					echo "<p style='background: #75E7F7'>No results found.</p>";
					
					}
					
				
			
				
				$con->close();
			
			}


			if (isset($_POST['submit'])) {

				$search = $_POST['search'];


				$sql = "SELECT leaveID, empID, leaveType, status, fromDate, toDate FROM emp_leave WHERE empID = $search ORDER BY leaveID DESC";
				$result = $con -> query($sql);
				if ($result -> num_rows > 0) {
					
					while($row = $result -> fetch_assoc()) {
						$id = $row["leaveID"];
						$statusTmp = $row["status"];

						if($statusTmp == 0){

							$status = 'Not reviewed';

						}else if($statusTmp == 1){

							$status = 'Approved';

						}else if($statusTmp == 2){

							$status = 'Rejected';

						}

					
						echo "<tr><td>".$row["leaveID"]."</td><td>"
						.$row["empID"]."</td><td>"
						.$row["leaveType"]."</td><td>"
						.$row["fromDate"]."</td><td>"
						.$row["toDate"]."</td><td>"
						.$status."</td></tr>";
					
					}
				
				}
				else {
					
					echo "<p style='background: #75E7F7'>No results found.</p>";
					
					}
					
				
			
				
				$con->close();

				
			}



			?>
	
	</table>
</center>




	
	
	
	
	
	<br><br><br><br><br><br><br><br><br>
	







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