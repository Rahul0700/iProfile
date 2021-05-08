// Form submission
$(document).ready(function() {
  document.getElementById("loggeduser").innerHTML=localStorage.getItem("email")+" is logged in";
  var email = localStorage.getItem("email");


  $.ajax({
    url: "./php/welcome.php",
    type: "POST",
    data: {
      email:email,
    },
    cache: false,
    success: function(dataResult){
      var dataResult = JSON.parse(dataResult);
      if(dataResult.statusCode==200){
        if(dataResult.dob!=null && dataResult.dob!="0000-00-00"){
          document.getElementById("dob").value=dataResult.dob;
        }
        if(dataResult.city!=null && dataResult.city!=""){
          document.getElementById("city").value=dataResult.city;
        }
        if(dataResult.phone!=null && dataResult.phone!="" && dataResult.phone!="0"){
          document.getElementById("phone").value=dataResult.phone;
        }
      }
    }
  });

    
  $('#update').on('click', function() {
    var dob = $('#dob').val();
    var phone = $('#phone').val();
    var city = $('#city').val();
    $.ajax({
      url: "./php/save.php",
      type: "POST",
      data: {
        type:2,
        email:email,
        phone: phone,
        dob: dob,
        city:city
      },
      cache: false,
      success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        if(dataResult.statusCode==200){
          location.href = "home.html";
        }
        else if(dataResult.statusCode==201){
          $("#error").show();
          $('#error').html('Invalid Request !');
        }
      }
    });
    alert("Your details have been updated");
  });
});