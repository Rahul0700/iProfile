<?php
  include 'database.php';
  // Collect current user data
  $email=$_POST['email'];
  $sql = "SELECT * FROM iprofile where email='$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $name=$row["name"];
      $dob=$row["dob"];
      $phone=$row["phone"];
      $city=$row["city"];
    }
    echo json_encode(array("statusCode"=>200,"name"=>$name,"dob"=>$dob,"phone"=>$phone,"city"=>$city));
  }
  else {
		echo json_encode(array("statusCode"=>201));
	}
  mysqli_close($conn); 
?>
