<?php
	include 'database.php';
	session_start();
	if($_POST['type']==1){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$hash = password_hash($password,
		          PASSWORD_DEFAULT);
		$duplicate=mysqli_query($conn,"select * from iprofile where email='$email'");
		if (mysqli_num_rows($duplicate)>0)
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
			if ($registerstmt->execute()) {
				echo json_encode(array("statusCode"=>200));
			}
			else {
				echo json_encode(array("statusCode"=>201));
			}
		}
		$registerstmt->close();
		mysqli_close($conn);
	}
	if($_POST['type']==2){
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$email = $_SESSION['email'];
		}
		$dob=$_POST['dob'];
		$phone=$_POST['phone'];
		$city=$_POST['city'];
		$duplicate=mysqli_query($conn,"select * from iprofile where email='$email'");
		if (mysqli_num_rows($duplicate)<0)
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
			if ($updatestmt->execute()) {
				echo json_encode(array("statusCode"=>200));
			}
			else {
				echo json_encode(array("statusCode"=>201));
			}
		}
		$updatestmt->close();
		mysqli_close($conn);
	}
?>
