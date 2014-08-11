Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");

$("#signup-form").submit(function() {
    
	$("#signup-form button").attr("disabled", "disabled");

  var username = $("#signup-username").val();
  var password = $("#signup-password").val();
  // alert(username);
  // alert(password);
  Parse.User.signUp(username, password, null, {
    success: function(user) {
      alert("signed up user!");
      window.location.href = "index.php";
    },

    error: function(user, error) {
      $("#signup-form .error").html(error.message).show();
      $("#signup-form button").removeAttr("disabled");
    }
  });

  

  return false;
});