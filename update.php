<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iProfile</title>
    <!-- Browser note -->
    <link rel = "icon" href="./img/brand.png"
    type = "image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="./img/brand.png" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <!-- User definedd style sheets -->
    <link rel="stylesheet" href="./css/main.scss">
    <!-- User definedd script -->
    <script src="./js/update.js" charset="utf-8"></script>
  </head>
  <body>
    <nav class="navbar navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="./img/logo.svg" width="250" height="auto" alt="">
        </a>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col md-6 d-none d-lg-block mt-5" id="bg">
        </div>
        <div class="col-lg-6 col-12 border shadow-lg bg-body rounded pb-5 px-4 bg-light mt-5">
          <h3 class="py-3">Profiile Update</h3>
          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error" style="display:none">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <form method="post">
            <div class="mb-3">
              <label for="dob" class="form-label">Date of Birth</label>
              <input type="date" class="form-control" id="dob">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="number" class="form-control" id="phone">
            </div>
            <div class="mb-3">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city">
            </div>
            <?php
            session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
              $email = $_SESSION['email'];
              echo '<input type="hidden" id="email" value="'.$email.'">';
            }
            else {
              echo "<script> location.href='login.php';alert('You dont have access to the page Please login to continue') </script>";
            }
            ?>
            <button type="submit" id="update" class="btn btn-primary">Update</button>
            <a href="welcome.php">
              <button type="button" class="btn btn-danger">Close</button>
            </a>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
