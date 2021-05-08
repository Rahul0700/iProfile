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
                email: email,
                password: password
              },
              cache: false,
              success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    window.localStorage;
                    localStorage.setItem("email", dataResult.email);
                    localStorage.setItem("loggedin", dataResult.loggedin);
                    location.href = "home.html";
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