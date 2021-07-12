<?php session_start(); ?>
<?php require_once('config.php'); ?>

 <?php 

if(isset($_POST['submit'])){


		$id1 = $_POST['id'];
		$email1 = $_POST['email'];
		$mobile1 = $_POST['mobile'];

		$empID = $id1;

		$query = "SELECT * FROM employee
						WHERE id = '$empID' 
						LIMIT 1 ";


			$result_set = mysqli_query($con, $query);
			$result = mysqli_fetch_assoc($result_set);

			$pwd = $result['password'];


			$id = $result['id'];
			$email = $result['email'];
			$mobile = $result['mobile'];
		
		


	if ($id1 == $id) {
		
		if ($email1 == $email) {
			
			if ($mobile1 == $mobile) {
				
				header("Location: index.php?success=".$pwd);

			}else{
				header("Location: index.php?mobileerror=yes");
			}

		}else{
			header("Location: index.php?emailerror=yes");
		}

	}else{
		header("Location: index.php?iderror=yes");
	}



}


  ?>