Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");

$("#login-form").submit(function() {
    
	$("#login-form button").attr("disabled", "disabled");
  
  var username = $("#login-username").val();
  var password = $("#login-password").val();
  
  // alert(username);
  // alert(password);
  Parse.User.logIn(username, password, {
    success: function(user) {
      alert("logged in user!");
      window.location.href = "index.html";
    },

    error: function(user, error) {
      $("#login-form .alert").html(error.message).show();
      $("#login-form button").removeAttr("disabled");
    }
  });

  

  return false;
});