<?php session_start(); ?>
<?php require_once('config.php'); ?>

<?php 

	$id = $_GET['id'];

	$sql = "DELETE FROM emp_leave WHERE empID = '$id'";
	$result = mysqli_query($con, $sql);

	$sql = "DELETE FROM leave_balance WHERE empID = '$id'";
	$result = mysqli_query($con, $sql);

	$sql = "DELETE FROM inquiry WHERE empID = '$id'";
	$result = mysqli_query($con, $sql);

	$sql = "DELETE FROM employee WHERE id = '$id'";
	$result = mysqli_query($con, $sql);

	if($result){
		
		header("Location: manageemployees.php?removed=yes");
	}else{
		header("Location: manageemployees.php?notremoved=yes");
	}





 ?>