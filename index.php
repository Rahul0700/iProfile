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
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <style media="screen">
    body{
      background-color:#5394b0;
    }
    #bg
    {
      background:url(./img/bg-img.jpg);
      background-repeat: no-repeat;
      background-size: contain;
      background-position: center;
    }
    h3 {
      font-family: 'Pacifico', cursive;
    }
    /* Password info  */
    ul, li {
        margin:0;
        padding:0;
        list-style-type:none;
    }
    form ul li {
        margin:10px 20px;

    }
    input:focus {
        border:1px solid #b9d4e9;
        border-top-color:#b6d5ea;
        border-bottom-color:#b8d4ea;
        box-shadow:0 0 5px #b9d4e9;
    }
    #pswd_info {
      position:absolute;
      width:250px;
      padding:10px;
      background:#fefefe;
      font-size:.875em;
      border-radius:5px;
      box-shadow:0 1px 3px #ccc;
      border:1px solid #ddd;
    }
    #pswd_info h4 {
        margin:0 0 10px 0;
        padding:0;
        font-weight:normal;
        font-size:1em;
    }
    #pswd_info::before {
        content: "\25B2";
        position:absolute;
        top:-12px;
        left:45%;
        font-size:14px;
        line-height:14px;
        color:#ddd;
        text-shadow:none;
        display:block;
    }
    .invalid {
        background:url(./img/cross.png) no-repeat 0 50%;
        padding-left:22px;
        line-height:24px;
        color:#ec3f41;
    }
    .valid {
        background:url(./img/tick.png) no-repeat 0 50%;
        padding-left:22px;
        line-height:24px;
        color:#3a7d34;
    }
    #pswd_info {
    display:none;
    }
    /* END */
    </style>
  </head>
  <body>
    <nav class="navbar navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="./img/logo.jpg" width="250" height="auto" alt="">
        </a>
      </div>
    </nav>
    <div class="container">
      <div class="row">

        <div class="col md-6 d-none d-lg-block mt-5" id="bg">
        </div>
        <div class="col-lg-6 col-12 border shadow-lg bg-body rounded pb-5 px-4 bg-light mt-5">

          <h3 class="py-3">Signup</h3>
          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error" style="display:none">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <form method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" required>
              <div id="nameHelp" class="form-text" style="display:none"></div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" required>
              <div id="pswdHelp" class="form-text" style="display:none"></div>
              <div id="pswd_info">
                  <h4>Password must meet the following requirements:</h4>
                  <ul>
                      <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                      <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                      <li id="number" class="invalid">At least <strong>one number</strong></li>
                      <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                  </ul>
              </div>
            </div>
            <button type="submit" id="register" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <a class="fw-lighter text-decoration-none text-light p-2 m-0" style="font-size:.5em;" href="https://www.freepik.com/vectors/people">People vector created by grmarc - www.freepik.com</a>
      <div class="fw-lighter text-decoration-none text-light p-2" style="font-size:.5em;">Logo made by <a class="fw-lighter text-decoration-none text-light" href="https://www.designevo.com/" title="Free Online Logo Maker">DesignEvo free logo creator</a></div>
    </div>
  </body>
  <script>
  $(document).ready(function() {
    $('input[type=password]').keyup(function() {
      var pswd = $('#password').val();
      if ( pswd.length < 8 ) {
          $('#length').removeClass('valid').addClass('invalid');
      } else {
          $('#length').removeClass('invalid').addClass('valid');
      }
      if ( pswd.match(/[A-z]/) ) {
          $('#letter').removeClass('invalid').addClass('valid');
      } else {
          $('#letter').removeClass('valid').addClass('invalid');
      }

      //validate capital letter
      if ( pswd.match(/[A-Z]/) ) {
          $('#capital').removeClass('invalid').addClass('valid');
      } else {
          $('#capital').removeClass('valid').addClass('invalid');
      }

      //validate number
      if ( pswd.match(/\d/) ) {
          $('#number').removeClass('invalid').addClass('valid');
      } else {
          $('#number').removeClass('valid').addClass('invalid');
      }
    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });
   function required(name,email,password) {
     if (!password.match(/[A-z]/)  || !password.match(/\d/) || password.length < 8 || !password.match(/[A-Z]/)) {
        alert("Your password isn't strong would you like to continue ")
      }
    if( name == ''  || name == "null") {
        $("#nameHelp").show();
        $('#nameHelp').html('This field is required');
        return false;               // Your code to handle error
     }
     else if (email == ''  || email == "null") {
       $("#emailHelp").show();
       $('#emailHelp').html('This field is required');
       return false;
     }
     else if (password == ''  || password == "null") {
       $("#pswdHelp").show();
       $('#pswdHelp').html('This field is required');
       return false;
     }
     else{
       return true;
     }
  }
  $('#register').on('click', function() {
		$("#register").attr("disabled", "disabled");
		var name = $('#name').val();
		var email = $('#email').val();
		var password = $('#password').val();
    if (required(name,email,password)) {
      $.ajax({
        url: "save.php",
        type: "POST",
        data: {
          type: 1,
          name: name,
          email: email,
          password: password
        },
        cache: false,
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            location.href = "login.php";
          }
          else if(dataResult.statusCode==201){
            $("#error").show();
            $('#error').html('Email ID already exists !');
            $("#register").removeAttr("disabled");
          }
        }
      });
      }
      else{
        $("#register").removeAttr("disabled");
      }
    });
  });
  </script>
</html>
