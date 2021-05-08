<?php
    include 'dbconnection_details.php';
	$conn = mysqli_connect($servername, $username, $password,$db) or die("Error " . mysqli_error($connection));
	// Store in json
	$sql = "select * from iprofile";
	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

	$emparray = array();
	while($row =mysqli_fetch_assoc($result))
	{
			$emparray[] = $row;
	}
	$fp = fopen('../data.json', 'w');
	fwrite($fp, json_encode($emparray));
	fclose($fp);
	header("Location:../data.json");
?>