<?php session_start(); ?>
<?php require_once('config.php'); ?>
<?php 

	//checking whether the user is logged in or not
	if (!isset($_SESSION['id'])) {
		header('Location: index.php');
	}

	if(isset($_GET['succesful'])){
		echo "<script> alert ('Profile Updated successfully.');</script>";
	}


 ?>


 <?php 

 	 //retrive user data

 	$empID = $_SESSION['id'];

		$sql = "SELECT * FROM employee WHERE id = '$empID'";
		$result = mysqli_query($con, $sql);


		$data = mysqli_fetch_assoc($result);
		$username = $data['name'];
		$designation = $data['designation'];

  

  ?>

<!DOCTYPE html>
<html>
<head>

	<title>Infinity Solutions LMS</title>
	
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<link rel="stylesheet" type="text/css" href="styles/managementdashboard.css">
	


</head>

<body>

<!--head section starts-->

	<hr class="hr">
		<img src="images/header.png" width="100%">
	<div>	
	<p class="nav"><b>  <a href="home.php" class="navbtn" >Home </a>  <a href="aboutus.php" class="navbtn" >About Us </a>    <a href="contactus.php" class="navbtn" >Contact Us</a> <a href="logout.php" class="navbtn" >Log out</a></b></p>  	
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
		<button type="button" class="button btn button2"><a href="leavehistory.php?id=<?php echo $_SESSION['id'] ?>"><span>My Leave History</span></a></button><br><br>
		<a href="update.php" name="update" class="link">Update My Profile</a><br><br>
		<a href="changepassword.php" name="changepassword" class="link">Change Password</a><br><br>
		
		</div>
	</div>
	</nav>
	
	
	<article>
	<p align="center" class="admin"><b>Management Dashboard</b></p><br>
	<p class="caption"><b>Latest Leave Applications : </b></p><br>
	
	<div align="center" class="leave">
	

		<table  width="100%">
			<tr>
				<th>Employee ID</th>
				<th>Leave Type</th>
				<th>Status</th>
				<th>Action</th>
				
			</tr>



			<?php 
			
			//displaying all the leave history on the management dashboard

				$sql = "SELECT leaveID, empID, leaveType, status FROM emp_leave ORDER BY leaveID DESC";
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

					
						echo "<tr><td>".$row["empID"]."</td><td>"
						.$row["leaveType"]."</td><td>"
						.$status."</td><td><button type='submit' class='button btn' ><a href='action.php?id=$id'><span>Review</span></a></button>
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
	
	<br><br>
	<div align="center">
	
	<button type="button" class="button btn button2" ><a href="employeereports.php"><span>View Reports</span></a></button>  <button type="button" class="button btn button2"><a href="manageemployees.php"><span>Employees</span></a></buttons>  <button type="button" class="button btn button2"><a href="employeedashboard.php"><span>Apply Leave</span></a></button>   <button type="button" class="button btn button2"><a href="inquiry.php"><span>View Inquiries</span></a></button>
	
	</div>
	</article>
	</section>
	</div>




	<br><br>



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