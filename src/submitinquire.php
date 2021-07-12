<?php session_start(); ?>
<?php require_once('config.php'); ?>

<?php 

if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$inquiry = $_POST['inquiry'];
	$empID = $_SESSION['id'];


		$query = "INSERT INTO inquiry (inquireID, email, description, empID) VALUES ('', '$email', '$inquiry', '$empID')";
		$result = mysqli_query($con, $query);
		
			if ($result) {
				header("Location: contactus.php?success=yes");
			}else{
				header("Location: contactus.php?error=yes");
			}





}

 ?>