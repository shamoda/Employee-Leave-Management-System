<?php session_start(); ?>
<?php require_once('config.php'); ?>

<?php 

if(isset($_POST['submit'])){
	$cpassword = $_POST['cpassword'];
	$npassword = $_POST['npassword'];
	$rpassword = $_POST['rpassword'];
	$empID = $_SESSION['id'];


		$query = "SELECT * FROM employee
						WHERE id = '$empID' 
						LIMIT 1 ";


			$result_set = mysqli_query($con, $query);
			$result = mysqli_fetch_assoc($result_set);

			$pwd = $result['password'];




	if($cpassword == $pwd){

		if($npassword == $rpassword){

			$sql = "UPDATE employee SET password = '$npassword' WHERE id = '$empID'";
			$result = mysqli_query($con, $sql);

			if ($result) {
				header("Location: changepassword.php?success=yes");
			}else{
				header("Location: changepassword.php?error=yes");
			}

		
		}else{
			header("Location: changepassword.php?unmatched=yes");
		}

	}else{
		header("Location: changepassword.php?currentpwderror=yes");
	}



}

 ?>