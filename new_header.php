<!DOCTYPE html>
<head>
  <meta charset="utf-8">

  <title>Dekaaz</title>
  <meta name="description" content="Dekaaz App">
  <meta name="viewport" content="width=device-width">
  
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
  <link href="css/twitter-bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
  <script type="text/javascript">var switchTo5x=true;</script>

  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://croak.it/talk/croakit_talk.js"></script>
  <script src="http://yui.yahooapis.com/3.6.0/build/yui/yui-min.js"></script>
  <script src="tagcanvas.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="parse.js"></script>

<script type="text/javascript">
      window.onload = function() {
        try {
          TagCanvas.Start('myCanvas','tags',{
            textColour: '#000000',
            outlineColour: '#ffffff',
            reverse: true,
            depth: 0.8,
            maxSpeed: 0.05
          });
        } catch(e) {
          // something went wrong, hide the canvas container
          document.getElementById('myCanvasContainer').style.display = 'none';
        }
      };
    </script>


  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>

  <script type="text/javascript">stLight.options({publisher: "3b8f0c68-515f-47b3-9466-8ea8a1762008", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

  <!-- popup iframe for edit button -->
  <link rel="stylesheet" href="css/colorbox.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="js/jquery.colorbox.js"></script>

  
  
  <!-- -->

<!--  <script type="text/javascript" src="processing.js"></script>-->


<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".dropdown-toggle").dropdown();
});  
</script>


<style>
/*#example ul {
  width: 100%;
}
#example {
  width: 100%;
}*/
body {
  margin: 0;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 13px;
  line-height: 18px;
  color: #333333;
  background-color: #ffffff;
  
  padding: 0 20px;
}
a {
  color: #0088cc;
  text-decoration: none;
}
a:hover {
  color: #005580;
  text-decoration: underline;
}

h2 { padding-top: 20px; }
h2:first-of-type { padding-top: 0; }
ul { padding: 0; }

.pagination {
  height: 36px;
  margin: 18px 0;
}
.pagination ul {
  display: inline-block;
  *display: inline;
  /* IE7 inline-block hack */

  *zoom: 1;
  margin-left: 0;
  margin-bottom: 0;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}
.pagination li {
  display: inline;
}
.pagination a {
  float: left;
  padding: 0 14px;
  line-height: 34px;
  text-decoration: none;
  border: 1px solid #ddd;
  border-left-width: 0;
}
.pagination a:hover,
.pagination .active a {
  background-color: #f5f5f5;
}
.pagination .active a {
  color: #999999;
  cursor: default;
}
.pagination .disabled span,
.pagination .disabled a,
.pagination .disabled a:hover {
  color: #999999;
  background-color: transparent;
  cursor: default;
}
.pagination li:first-child a {
  border-left-width: 1px;
  -webkit-border-radius: 3px 0 0 3px;
  -moz-border-radius: 3px 0 0 3px;
  border-radius: 3px 0 0 3px;
}
.pagination li:last-child a {
  -webkit-border-radius: 0 3px 3px 0;
  -moz-border-radius: 0 3px 3px 0;
  border-radius: 0 3px 3px 0;
}
.pagination-centered {
  text-align: center;
}
.pagination-right {
  text-align: right;
}
.pager {
  margin-left: 0;
  margin-bottom: 18px;
  list-style: none;
  text-align: center;
  *zoom: 1;
}
.pager:before,
.pager:after {
  display: table;
  content: "";
}
.pager:after {
  clear: both;
}
.pager li {
  display: inline;
}
.pager a {
  display: inline-block;
  padding: 5px 14px;
  background-color: #fff;
  border: 1px solid #ddd;
  -webkit-border-radius: 15px;
  -moz-border-radius: 15px;
  border-radius: 15px;
}
.pager a:hover {
  text-decoration: none;
  background-color: #f5f5f5;
}
.pager .next a {
  float: right;
}
.pager .previous a {
  float: left;
}
.pager .disabled a,
.pager .disabled a:hover {
  color: #999999;
  background-color: #fff;
  cursor: default;
}
/*#main {
  border: solid #ddd;
  border-width: 1 1px 1px 1px;
}*/

</style>
</head>

<body style="background-color: white !important;">
  <div id="fb-root"></div>

  <script src="//connect.facebook.net/en_US/all.js"></script> 
    <script>
    Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");

        window.fbAsyncInit = function() {
          Parse.FacebookUtils.init({
          appId      : '520144374763187', // Facebook App ID
          channelUrl : 'http://localhost:8888/dekaaz', // Channel File
          status     : true, // check login status
          cookie     : true, // enable cookies to allow Parse to access the session
          xfbml      : true  // parse XFBML
        });

        $("#FacebookLink").click(function() {
          alert("in doIt function");

          if(Parse.FacebookUtils.isLinked(Parse.User.current()) {
            Parse.FacebookUtils.link(Parse.User.current(), null, {
              success: function(currentUser) {
               alert("Woohoo, user logged in with Facebook!");
              },
              error: function(currentUser, error) {
               alert("User cancelled the Facebook login or did not fully authorize.");
              }
            });
          } else {
            Parse.FacebookUtils.unlink(Parse.User.current(), {
              success: function(user) {
                alert("The user is no longer associated with their Facebook account.");
              }
            });
          }
        });

          
        

      };

        FB.init({
            appId  : '520144374763187',
            status : true, // check login status
            cookie : true, // enable cookies to allow the server to access the session
            xfbml  : true,  // parse XFBML
            oauth : true
        });

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));


    </script>
  <!-- 
  The following script code generates the top navigation bar, with "About", "Compose", and "Log Out" buttons
  on the left, and a greeting on the right.
  The code is executed when the user logs in, and is redirected to this page. Look at the "Top Navigation Bar" section in "feed.js" file to see the actual code.
  -->
  <!--<script id="account-info" type="x/handlebars"><div style="text-align: right; width: 620px; margin: auto; background: white; padding: 0px 0px;"><div class="left" style="text-align: left !important;"><a href="about.php">About</a> | <a href="index.html" >Compose</a> | <a href="signup.html" id="logout-button">Log Out</a></div><div class="right">Welcome, {username}! </div></div></script>-->
<!-- dropdown menu code from: http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-dropdowns.php -->
<script id="account-info" type="x/handlebars">
<h1><img src="images/dekaaz_no_slogan.png" style="padding-top: 10px; height: auto; max-width: 800px;"/></h1>
<div id="top-bar">
<ul class="nav nav-pills" style="margin: 5px auto 5px auto; padding-bottom: 0px;">
    
    <!--<li><a href="home.php">Home</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="dekaaz.php">Collections</a></li>
    <li><a href="index.php" >Compose</a></li>-->

    <li><a href="new_home.php">Home</a></li>
    <li><a href="index.php">Collections</a></li>
    <li><a href="submit.php">Submit</a></li>
 <li><a href="about.php" >Connect</a></li>
    <li><a href="about.php">Connect</a></li>
    


    <!--<li><a href="#" onClick="logoutFunc()" id="logout-button">{message}</a></li>-->
    <li class="dropdown pull-right">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">{greeting}<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="myaccount.php">Profile Page</a></li>
            <li><a href="personal_feed.php">Personal Feed</a></li>
            <li><a href="#" onClick="logoutFunc()" id="logout-button">{message}</a></li>
            <!--<li><a href="#">Sent Items</a></li>
            <li class="divider"></li>
            <li><a href="#">Trash</a></li>-->
        </ul>
    </li>
    <!--<li class="dropdown pull-right">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Admin <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li class="divider"></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </li>-->
  <!-- <li class="dropdown pull-right"><a style="color: black; hover; none;">{greeting}</a></li>-->
</ul></div>
</script>

  <!-- <h1><img src="images/dekaaz.png" style="padding-top: 10px; height: auto; max-width: 400px;"/></h1> -->
<!--   <div id="main" style="background-color: #F5F5F5; margin-bottom: 20px;"> -->
