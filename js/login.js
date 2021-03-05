// Form submission
$(document).ready(function() {
  $('#login').on('click', function() {
    var email = $('#email').val();
    var password = $('#password').val();
    if(email!="" && password!="" ){
      $.ajax({
        url: "save.php",
        type: "POST",
        data: {
          type:2,
          email: email,
          password: password
        },
        cache: false,
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            location.href = "welcome.php";
          }
          else if(dataResult.statusCode==201){
            $("#error").show();
            $('#error').html('Invalid EmailId or Password !');
          }

        }
      });
    }
    else{
      alert('Please fill all the field !');
    }
  });
});
