<?php
	include 'database.php';
	session_start();

	// Registration query
	if($_POST['type']==1){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];

		$duplicate=mysqli_query($conn,"select * from iprofile where email='$email'");
		if (mysqli_num_rows($duplicate)>0)
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
			$sql = "INSERT INTO `iprofile`( `name`, `email`, `password`)
			VALUES ('$name','$email','$password')";
			if (mysqli_query($conn, $sql)) {
				echo json_encode(array("statusCode"=>200));
			}
			else {
				echo json_encode(array("statusCode"=>201));
			}
		}
		mysqli_close($conn);
	}

	// Login query
	if($_POST['type']==2){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$check=mysqli_query($conn,"select * from iprofile where email='$email' and password='$password'");
		if (mysqli_num_rows($check)>0)
		{
			$_SESSION['email']=$email;
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);
	}
?>
