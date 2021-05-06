<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iProfile</title>
    <!-- Browser note -->
    <link rel = "icon" href="../img/brand.png"
    type = "image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="../img/brand.png" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- User definedd style sheets -->
    <link rel="stylesheet" href="../css/main.scss">
  </head>
  <body>
    <div class="container">
      <div class="card border shadow-lg p-3 position-absolute top-50 start-50 translate-middle bg-body rounded" style="width: 19rem;">
        <img src="../img/profile-pic.svg" class="card-img-top" alt="...">
        <div class="card-body">
        <?php
          include 'database.php';
          session_start();
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
              $email = $_SESSION['email'];

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
              echo '<h5 class="card-title">' . $name.'</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                  <li class="list-group-item"> Email : '. $email.'</li>';
              if ($dob=="" && $phone=="" && $city=="")
              {
                  echo '</ul>
                      <div class="mt-2">Profile status</div>
                      <div class="progress my-2">
                      <div class="progress-bar progress-bar-striped bg-success" style="width: 40%;" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40 %</div>
                      </div>
                      <div class="card-body">
                      <a href="../update.html" class="card-link text-decoration-none">Complete profile</a>
                      <a href="logout.php" class="card-link text-decoration-none">Logout</a>
                      </div>';
              }else{
                  echo '<li class="list-group-item"> DOB : '. $dob.'</li>
                  <li class="list-group-item"> Phone : '. $phone.'</li>
                  <li class="list-group-item"> City : '. $city.'</li>
                  <div class="card-body">
                  <a href="../update.html" class="card-link text-decoration-none">Update profile</a>
                  <a href="logout.php" class="card-link text-decoration-none">Logout</a>
                  </div>';
              }
          }
          else {
              echo "<script> location.href='../login.html';alert('You dont have access to the page Please login to continue') </script>";
          }
      ?>
      </div>
    </div>
  </body>
</html>
