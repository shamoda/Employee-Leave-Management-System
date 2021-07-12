<?php session_start(); ?>
<?php require_once('config.php'); ?>

<?php 

	$id = $_GET['id'];

	$sql = "UPDATE emp_leave SET status = 1 WHERE leaveID = '$id'";
	$result = mysqli_query($con, $sql);

	if($result){
		
		header("Location: managementdashboard.php");
	}





 ?>