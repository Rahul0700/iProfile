<?php
	include 'dbconnection_details.php';
	$conn = mysqli_connect($servername, $username, $password,$db) or die("Error " . mysqli_error($connection));
	
	
	// Prepared statements
	$registerstmt = $conn->prepare("INSERT INTO `iprofile`( `name`, `email`, `password`)
	VALUES (?,?,?)");
	$registerstmt->bind_param("sss", $name, $email, $hash);

	$updatestmt = $conn->prepare("UPDATE iprofile SET dob = ?, phone = ?, city = ?
	WHERE email = ?");
	$updatestmt->bind_param("siss", $dob, $phone, $city, $email);
?>
