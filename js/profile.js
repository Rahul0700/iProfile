$(document).ready(function() {
  document.getElementById("loggeduser").innerHTML=localStorage.getItem("email")+" is logged in";
  var email = localStorage.getItem("email");
  var progress = 40;
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
        if(dataResult.dob==null || dataResult.dob=="0000-00-00"){
          document.getElementById("doblabel").style.display ="none";
        }
        else{
          document.getElementById("dob").innerHTML=dataResult.dob;
          progress+=20;
        }
        if(dataResult.city==null || dataResult.city==""){
          document.getElementById("citylabel").style.display ="none";
        }
        else{
          document.getElementById("city").innerHTML=dataResult.city;
          progress+=20;
        }
        if(dataResult.phone==null || dataResult.phone=="" || dataResult.phone==0){
          document.getElementById("phonelabel").style.display ="none";
        }
        else{
          document.getElementById("phone").innerHTML=dataResult.phone;
          progress+=20;
        }
        document.getElementById("progressBar").style.width=progress+"%";
        document.getElementById("progressBar").innerHTML=progress+"%";
      }
    }
  });
});