<?php
include 'database.php';
session_start();
if ( isset( $_POST['submit'] ) )
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $sql = "SELECT * FROM iprofile where email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $hash=$row["password"];
    }
  }
  else {
    echo "Error";
  }
  $verify = password_verify($password, $hash);
  if($_POST['email']=="" || $_POST['password']==""){
      echo "<script> location.href='../login.html';alert('Please fill all the fields') </script>";
    }
  if ($verify) {
    $_SESSION['email']=$email;
    $_SESSION['loggedin'] = true;
    echo "<script> location.href='./welcome.php'; </script>";
  } else {
      echo "<script> location.href='../login.html';alert('Email id and password did not match') </script>";
  }
  mysqli_close($conn);
}
?>
