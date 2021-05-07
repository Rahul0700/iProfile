<?php
      include 'database.php';
      session_start();
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $email = $_SESSION['email'];


        // Collect current user data
        $sql = "SELECT * FROM iprofile where email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $name=$row["name"];
            $dob=$row["dob"];
            $phone=$row["phone"];
            $city=$row["city"];
          }
        }
        else {
          echo "Error";
        }
        mysqli_close($conn);   
      }
      else {
        echo "<script> location.href='login.html';alert('You dont have access to the page Please login to continue') </script>";
      }
      echo '<div class="card-body">
            <h5 class="card-title"><?php echo $name; ?></h5>
            </div>';
      if ($dob=="" && $phone=="" && $city=="")
      {
        echo '
          <ul class="list-group list-group-flush">
            <li class="list-group-item"> Email : '. $email.'</li>
          </ul>
          <div class="mt-2">Profile status</div>
          <div class="progress my-2">
            <div class="progress-bar progress-bar-striped bg-success" style="width: 40%;" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40 %</div>
          </div>
          <div class="card-body">
            <a href="update.html" class="card-link text-decoration-none">Complete profile</a>
            <a href="./php/logout.php" class="card-link text-decoration-none">Logout</a>
          </div>';
      }else{
        echo '
          <ul class="list-group list-group-flush">
            <li class="list-group-item"> Email : '. $email.'</li>
            <li class="list-group-item"> DOB : '. $dob.'</li>
            <li class="list-group-item"> Phone : '. $phone.'</li>
            <li class="list-group-item"> City : '. $city.'</li>
          </ul>
          <div class="card-body">
            <a href="update.html" class="card-link text-decoration-none">Update profile</a>
            <a href="./php/logout.php" class="card-link text-decoration-none">Logout</a>
          </div>';
      }
    ?>
