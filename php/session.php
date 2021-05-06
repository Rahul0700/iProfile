<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $email = $_SESSION['email'];
        echo '<input type="hidden" id="email" value="'.$email.'">';
    }
    else {
        echo "<script> location.href='../login.html';alert('You dont have access to the page Please login to continue') </script>";
    }
?>