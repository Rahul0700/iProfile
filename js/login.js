// Form submission
$(document).ready(function() {
  $('#login').on('click', function() {
    var email = $('#email').val();
    var password = $('#password').val();
    if(email!="" && password!=""){
      $.ajax({
        url: "./php/save.php",
        type: "POST",
        data: {
          type:3,
          email: email
          },
        cache: false,
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            if(window.atob(dataResult.password)==password){
              localStorage.setItem("email", email);
              localStorage.setItem("loggedin", true);
              location.href = "home.html";
            }
            else{
              $("#error").show();
              $('#error').html('Email and password unmatched');                    
            }
          }
          else if(dataResult.statusCode==201){
            $("#error").show();
            $('#error').html('Invalid Request !');
          } 
        }
      });
      alert('Please wait while we process your request');
    }
    else{
      alert('Please fill all the field !');
    }
  });
});