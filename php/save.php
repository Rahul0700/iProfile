<?php
	include 'database.php';

	
	// User Registration call 
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


	// User Detail updation call  
	if($_POST['type']==2){
		$email=$_POST['email'];
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


	// User autheticate call  
	if($_POST['type']==3){
		$email=$_POST['email'];
		  
		  
		// If more than one user with same email thrw error
		$sql = "SELECT * FROM iprofile where email='$email'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$hash=$row["password"];
			}
			echo json_encode(array("statusCode"=>200, "password"=>$hash));
		}
		else {
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);
	}
?>
