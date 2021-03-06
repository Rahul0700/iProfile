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
          <h3 class="py-3">Login</h3>
          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error" style="display:none">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <form method="post" action="authenticate.php">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
