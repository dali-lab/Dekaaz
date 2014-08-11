
$("#fb-login-form").submit(function() {
	$("#fb-login-form button").attr("disabled", "disabled");

        window.fbAsyncInit = function() {
        Parse.FacebookUtils.init({
        appId      : '520144374763187', // Facebook App ID
        channelUrl : 'http://localhost:8888/dekaaz', // Channel File
        status     : true, // check login status
        cookie     : true, // enable cookies to allow Parse to access the session
        xfbml      : true  // parse XFBML
    });
      };


  Parse.FacebookUtils.logIn(null, {
    success: function(user) {
      // alert("YES?");
      if (!user.existed()) {
        // alert("YES1");
        FB.api('/me', {fields: 'name'}, function(response) {
          Parse.User.current().setUsername(response.name, null);
          Parse.User.current().save();
          window.location.href = "index.html";
          // alert(user.getUsername());
          // alert(user.getUsername());
        });
        // alert("User signed up and logged in through Facebook!");
      } else {
        window.location.href = "index.html";
        // alert("YES2");
        // alert("User logged in through Facebook!");
        // var user = Parse.User.current();
        // FB.api('/me', {fields: 'name'}, function(response) {
        //   alert(response.name);
        //   alert(user.getUsername());
        //   alert(user.getUsername());
        // });
      }
    },
    error: function(user, error) {
      alert("User cancelled the Facebook login or did not fully authorize.");
    }
  });

  
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

  return false;
});