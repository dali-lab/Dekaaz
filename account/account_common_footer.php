    var Dekaaz, 
    query,
    noTasksMessage = Y.one('#no-incomplete-message'),
    submitBtn = Y.one("#poem-submit"),
    incompleteItemList = Y.one('#incomplete-items'),
    accountInfo = Y.one('body'),
    completeItemList = Y.one('#complete-items'),
    input1 = Y.one("#poem-input-1"),
    input2 = Y.one("#poem-input-2"),
    input3 = Y.one("#poem-input-3");

    /* Top Navigation Bar: when the page is ready, get the current user's username, and pass the username to the 
    script tag identified by '#account-info', which will generate HTML code. This HTML code is saved in the content
    variable, which is prepended to the body */
    $(document).ready(function() {

      var currentUser = Parse.User.current();
      
      var name;
      
      if (currentUser) {
        var username;
        
        if(Parse.FacebookUtils.isLinked(currentUser)) {
        
        
      
          FB.getLoginStatus(function(response) {
            if (response.status != 'connected') {
              Parse.User.logOut();
              window.location.href = "signup.html";
            }
          });
        } 
        username = currentUser.getUsername();

        name = "Welcome, " + username + "!";
        /* initialize content to hold the HTML under '#account-info' script tag in index.html */
        mess = "Log Out";
        /* initialize content to hold the HTML under '#account-info' script tag in index.html */
        var content = Y.Lang.sub(Y.one('#account-info').getHTML(), {
          greeting: name,
          message: mess
        });

        accountInfo.prepend(content);
      } else {
        name = "No Account";
        mess = "Log In";
        /* initialize content to hold the HTML under '#account-info' script tag in index.html */
        var content = Y.Lang.sub(Y.one('#account-info').getHTML(), {
          greeting: name,
          message: mess
        });

        accountInfo.prepend(content);
      }

    });
  });

</script>

<script>
<?php include_once("account/account.js"); ?>
</script>

</body>
</html>