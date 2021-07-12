<?php session_start(); ?>
<?php require_once('config.php'); ?>

 <?php 

if(isset($_POST['submit'])){

		$empID = $_SESSION['id'];

		$sql = "SELECT * FROM employee WHERE id = '$empID'";
		$result = mysqli_query($con, $sql);


		$data = mysqli_fetch_assoc($result);
		$userdata = $data['user'];
		$pwd = $data['password'];


	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$user = $userdata;
		$designation = $_POST['designation'];
		$password = $pwd;


	$sql = "UPDATE employee SET 
			id = '$empID',
			name = '$name',
			email = '$email',
			mobile = '$mobile',
			user = '$user',
			designation = '$designation', 
			photo = 1,
			password = '$password'
			WHERE id = '$empID'";

	$result_set = mysqli_query($con, $sql);



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

		
			if($propicSize < 5000000){

				$propicNameNew = $empID .".".$fileActualType;
				$destination = 'images/profile/'.$propicNameNew;
				move_uploaded_file($propicTmpName, $destination);

				$sql = "UPDATE employee SET photo = 1 WHERE id = $id";
				$result = mysqli_query($con, $sql);

				header("Location: employeedashboard.php?succesful=yes");


			}else {
				header("Location: update.php?imgerror=yes");
			}


}else {

	
	header("Location: update.php?error=yes");

}

}


  ?>