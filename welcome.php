<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPropel</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style media="screen">
    body{
      background-color:#5394b0;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="card border shadow-lg p-3 position-absolute top-50 start-50 translate-middle bg-body rounded" style="width: 19rem;">
        <img src="./img/profile-pic.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <?php
          include 'database.php';
          session_start();
          $email = $_SESSION['email'];
          $progress = 100;

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
          echo '<h5 class="card-title">' . $name.'</h5>';
          echo '</div>';
          echo '<ul class="list-group list-group-flush">';
          echo '<li class="list-group-item"> Email : '. $email.'</li>';
          if ($dob=="" && $phone=="" && $city=="")
          {
            echo '</ul>';
            $progress=$progress-60;
            echo '<div class="mt-2">Profile status</div>';
            echo '<div class="progress my-2">';
            echo '<div class="progress-bar progress-bar-striped bg-success" style="width: '.$progress.'%;" role="progressbar" aria-valuenow="'.$progress.'" aria-valuemin="0" aria-valuemax="100">'.$progress.'%</div>';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<a href="#" class="card-link text-decoration-none">Complete profile</a>';
            echo '</div>';
          }else{
            echo '<li class="list-group-item"> DOB : '. $dob.'</li>';
            echo '<li class="list-group-item"> Phone : '. $phone.'</li>';
            echo '<li class="list-group-item"> City : '. $city.'</li>';
            echo '<div class="card-body">';
            echo '<a href="logout.php" class="card-link text-decoration-none">Logout</a>';
            echo '</div>';
          }
          ?>
      </div>
    </div>
  </body>
</html>
