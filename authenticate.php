<?php
include 'database.php';
session_start();
if ( isset( $_POST['submit'] ) )
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $check=mysqli_query($conn,"select * from iprofile where email='$email' and password='$password'");
  if (mysqli_num_rows($check)>0)
  {
    $_SESSION['email']=$email;
    $_SESSION['loggedin'] = true;
    echo "<script> location.href='welcome.php'; </script>";
  }
  else if($_POST['email']=="" || $_POST['password']==""){
    echo "<script> location.href='login.php';alert('Please fill all the fields') </script>";
  }
  else{
    echo "<script> location.href='login.php';alert('Email id and password did not match') </script>";
  }
  mysqli_close($conn);
}
?>
