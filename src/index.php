<?php session_start(); ?>
<?php require_once('config.php'); ?>

<?php 
	//displaying popup messages according to the reason.

	if(isset($_GET['mobileerror'])){
		echo "<script> alert ('ERROR! Mobile number is incorrect.');</script>";
	}

	if(isset($_GET['emailerror'])){
		echo "<script> alert ('ERROR! E-mail address is incorrect.');</script>";
	}

	if(isset($_GET['iderror'])){
		echo "<script> alert ('ERROR! Employee ID is incorrect.');</script>";
	}

	/*if(isset($_GET['success'])){

		$pwd = $_GET['pwd'];
		echo "<script> alert ('Your password is $pwd ');</script>";
	}*/

 ?>

<?php 
	
	//check submission
	if(isset($_POST['submit'])) {

		$errors = array();

		//check user entered user name and password
		if (!isset($_POST['empid'])) {
			$errors[] = 'Please enter valid employee ID.';
		}

		if (!isset($_POST['pwd'])) {
			$errors[] = 'Please enter valid password.';
		}


		//check for any error
		if (empty($errors)) {
			
			$id = mysqli_real_escape_string($con, $_POST['empid']);
			$password = mysqli_real_escape_string($con, $_POST['pwd']);


			$query = "SELECT * FROM employee
						WHERE id = '{$id}'
						AND password = '{$password}' 
						LIMIT 1 ";


			$result_set = mysqli_query($con, $query);

			if($result_set){
				$check = mysqli_num_rows($result_set);
				//check for valid records
				if ($check == 1) {

					//creating session variables
					$session = mysqli_fetch_assoc($result_set);
					$_SESSION['designation'] = $session['designation'];
					$_SESSION['id'] = $session['id'];
					$_SESSION['name'] = $session['name'];
					$_SESSION['user'] = $session['user'];
					

					//check for the user type
					$query = "SELECT * FROM employee WHERE id = '{$id}' ";

					$result_set = mysqli_query($con, $query);

					while ($row = $result_set->fetch_assoc()) {

 			  			 $user = $row['user'];
					}	

					//redirecting to the relevant dashboard
					if ($user == 1) {
						header('Location: managementdashboard.php');
					}else{
						header('Location: employeedashboard.php');
					}
					

					
				}else{

					$errors[] = 'Invalid employee ID / Password';
				}

			}else{

				$errors[] = 'Database query failed';
			}

		}

	}	
		

?>

<!DOCTYPE html>
<html>
<head>

	<title>Infinity Solutions LMS</title>
	
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<link rel="stylesheet" type="text/css" href="styles/home.css">


</head>

<body>

<!--head section starts-->

	<hr class="hr">
	<img src="images/header.png" width="100%">
	<div>	
	<p class="nav"><b> <a href="aboutus.php" class="navbtn" >About Us </a>    <a href="contactus.php" class="navbtn" >Contact Us</a></b></p>
	</div>
	<hr class="hr">
	<br>
	
	
	<div>
	<section>
	<nav>
	<div>
	<img class="wallpaper" src="images/homebackground.png" height="500" width="500">
	</div>
	</nav>
	
	<artical>
	<div>
	<div>
	<fieldset class="form1 bg"  align="center">
		<form method="post" id="logindetails">
	
		<p class="login"><b>Login</b></p>

		<?php if (isset($errors) && !empty($errors)) {

			echo '<p style="color:white; background: red"><b>Invalid employee ID / Password.</b></p>';
		} ?>

		<?php if(isset($_GET['logout'])){
			echo '<p style="color:white; background: green"><b>You were logged out.</b></p>';

		}

		?>

		<?php if(isset($_GET['success'])){
			echo "<p style='color:white; background: red'><b> Your password is -    ".$_GET['success']."    - Set a new password after you logged in.</b></p>";

		}



		 ?>
		
		<input type="text" name="empid" placeholder="employee id" class="input" required><br><br><br>
		
		<input type="password" name="pwd" placeholder="password" class="input" required><br><br><br>
		
		<input type="checkbox" name="rememberme" > Remember me<br><br><br>
		
		<button type="submit" name="submit" class="button btn" style="vertical-align:middle"><span>Sign in </span></button> <br><br><br>
		
		</form>
		
		<a href="forgetpassword.php" class="forgotpwd">Forget Password ?</a><br>
		
	</fieldset>
	<br>
	
	</div>
	</div>
	</artical>
	</section>
	</div>

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

<?php mysqli_close($con); ?>