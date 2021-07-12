<?php session_start(); ?>
<?php require_once('config.php'); ?>

<?php 






if(isset($_POST['submit'])){
	$leavetype = $_POST['leavetype'];
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
	$description = $_POST['description'];
	$empID = $_SESSION['id'];



	$sql2 = "SELECT * FROM leave_balance WHERE empID = '$empID'";
	$sql2_result = mysqli_query($con, $sql2);

	$get_value = mysqli_fetch_assoc($sql2_result);
	$value = $get_value['num'];

if($value > 0){


	  // Calulating the difference in timestamps 
    $diff = strtotime($fromdate) - strtotime($todate); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    $days = $diff / 86400;

			if($days < 0){
							$query = "SELECT * FROM leave_balance WHERE empID = '$empID'";
							$query_result = mysqli_query($con, $query);

							$data = mysqli_fetch_assoc($query_result);
							$num = $data['num'];

						if(abs($days) < $num){

								$days1 = $num - abs($days);

								$balance = "UPDATE leave_balance SET num = '$days1' WHERE empID = '$empID'";
								$execute = mysqli_query($con, $balance);





								$sql = "INSERT INTO emp_leave (leaveID, leaveType, fromDate, toDate, description, empID) VALUES ('', '$leavetype', '$fromdate', '$todate', '$description', '$empID')";
								$result = mysqli_query($con, $sql);

								if ($result) {
									header("Location: employeedashboard.php?leaveapplied=yes");
								}else{
									header("Location: employeedashboard.php?error=yes");
								}




						}else{
							header("Location: contactus.php?exceeding=yes");
						}


				



			}else{
					header("Location: employeedashboard.php?dayerror=yes");
			}
}
else{
			header("Location: contactus.php?limitexceeded=yes");
}




}








	



 ?>