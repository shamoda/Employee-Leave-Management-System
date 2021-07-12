<?php session_start(); ?>
<?php require_once('config.php'); ?>

 <?php 

if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$user = $_POST['user'];
	$designation = $_POST['designation'];
	$photo = ""; //$_POST['photo'];
	$password = $_POST['password'];

	$query = "INSERT INTO leave_balance (balance_id, num, empID) VALUES ('', '40', '$id')";
	$query_result = mysqli_query($con, $query);


	$sql = "INSERT INTO employee (id, name, email, mobile, user, designation, photo, password) 
			VALUES ('$id', '$name', '$email', '$mobile', '$user', '$designation', '$photo', '$password')";

	$result_set = mysqli_query($con, $sql);


//$sql = "SELECT * FROM employee WHERE id = '$id'";
//$result = mysqli_query($con, $sql);

if($result_set){
	$propic = $_FILES['photo'];


	$propicName = $_FILES['photo']['name'];
	$propicTmpName = $_FILES['photo']['tmp_name'];
	$propicSize = $_FILES['photo']['size'];
	$propicError = $_FILES['photo']['error'];
	$propicType = $_FILES['photo']['type'];


	$filetype = explode('.', $propicName);
	$fileActualType = strtolower(end($filetype));

	$allowed = array('jpg');

	if(in_array($fileActualType, $allowed)){

		if($propicError === 0){

			if($propicSize < 5000000){

				$propicNameNew = $id .".".$fileActualType;
				$destination = 'images/profile/'.$propicNameNew;
				move_uploaded_file($propicTmpName, $destination);

				$sql = "UPDATE employee SET photo = 1 WHERE id = $id";
				$result = mysqli_query($con, $sql);

				header("Location: manageemployees.php?success=yes");


			}else {
				header("Location: register.php?imgerror=yes");
			}


		}else {
			header("Location: register.php?error=yes");
		}


	}else{
		header("Location: register.php?imgtype=yes");
	}


}else {

	
	header("Location: register.php?IDexists=true");

}

}


  ?>