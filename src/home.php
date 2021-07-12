<?php session_start(); ?>
<?php require_once('config.php'); ?>

<?php 

	$user = $_SESSION['user'];

	if ($user == 1)
	{
		header('Location: managementdashboard.php');
	}else{
		header('Location: employeedashboard.php');
	}



 ?>