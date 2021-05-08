$(document).ready(function() {
  $('#logout').on('click', function() {
    window.localStorage;
    localStorage.setItem("email", null);
    localStorage.setItem("loggedin", false);    
    location.href='./login.html';   
  });
});