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
            document.getElementById("name").innerHTML=dataResult.name;
            document.getElementById("email").innerHTML=localStorage.getItem("email");
            if(dataResult.dob==null && dataResult.city==null && dataResult.phone==null){
              document.getElementById("doblabel").style.display ="none";
              document.getElementById("phonelabel").style.display ="none";
              document.getElementById("citylabel").style.display ="none";
              document.getElementById("progressBar").style.width="40%";
              document.getElementById("progressBar").innerHTML="40%";
            }
            else{
              document.getElementById("dob").innerHTML=dataResult.dob;
              document.getElementById("phone").innerHTML=dataResult.phone;
              document.getElementById("city").innerHTML=dataResult.city;
              document.getElementById("progressBar").style.width="100%";
              document.getElementById("progressBar").innerHTML="100%";
            }
          }
        }
      });
});