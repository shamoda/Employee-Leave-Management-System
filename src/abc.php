<?php require_once('config.php'); ?>
<?php 

		

$id = 1111;

$query = "SELECT * FROM employee WHERE id = '{$id}' ";


			$result_set = mysqli_query($con, $query);
	while ($row = $result_set->fetch_assoc()) {
    $ans = $row['user'];
}						

echo $ans . " is the user type";


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>

</body>
</html>
<?php mysqli_close($con); ?>