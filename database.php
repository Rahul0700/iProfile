<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="profile_management";
	$conn = mysqli_connect($servername, $username, $password,$db) or die("Error " . mysqli_error($connection));

	//fetch table rows from mysql db
	$sql = "select name,email,dob,city,phone from iprofile";
	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

	//create an array
	$emparray = array();
	while($row =mysqli_fetch_assoc($result))
	{
			$emparray[] = $row;
	}
	$fp = fopen('data.json', 'w');
	fwrite($fp, json_encode($emparray));
	fclose($fp);
?>
