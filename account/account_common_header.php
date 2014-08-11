
<!DOCTYPE html>
<head>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="parse.js"></script>
  <script src="http://yui.yahooapis.com/3.6.0/build/yui/yui-min.js"></script>
<link href="css/twitter-bootstrap.css" rel="stylesheet">

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript">

Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");

if(Parse.User.current() == null) {
  window.location.href = 'signup.html';
}
</script>


  <meta charset="utf-8">
  <style>
    /* mixins, variables, etc. */
    /* universal */
    html {
      overflow-y: scroll;
    }

    body {
      padding-top: 60px;
    }

    section {
      overflow: auto;
    }

    textarea {
      resize: vertical;
    }

    .center {
      text-align: center;
    }
    .center h1 {
      margin-bottom: 10px;
    }

    /* typography */
    h1, h2, h3, h4, h5, h6 {
      line-height: 1;
    }

    h1 {
      font-size: 3em;
      letter-spacing: -2px;
      margin-bottom: 30px;
      text-align: center;
    }

    h2 {
      font-size: 1.2em;
      letter-spacing: -1px;
      margin-bottom: 30px;
      text-align: center;
      font-weight: normal;
      color: #eaeaea;
    }

    p {
      font-size: 1.1em;
      line-height: 1.7em;
    }

    /* header */
    #logo {
      float: left;
      margin-right: 10px;
      font-size: 1.7em;
      color: white;
      text-transform: uppercase;
      letter-spacing: -1px;
      padding-top: 9px;
      font-weight: bold;
      line-height: 1;
    }
    #logo:hover {
      color: white;
      text-decoration: none;
    }

    /* footer */
    footer {
      margin-top: 45px;
      padding-top: 5px;
      border-top: 1px solid #eaeaea;
      color: #eaeaea;
    }
    footer a {
      color: #eaeaea;
    }
    footer a:hover {
      color: #eaeaea;
    }
    footer small {
      float: left;
    }
    footer ul {
      float: right;
      list-style: none;
    }
    footer ul li {
      float: left;
      margin-left: 10px;
    }

    .debug_dump {
      clear: both;
      float: left;
      width: 100%;
      margin-top: 45px;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    aside section {
      padding: 10px 0;
      border-top: 1px solid #eaeaea;
    }
    aside section:first-child {
      border: 0;
      padding-top: 0;
    }
    aside section span {
      display: block;
      margin-bottom: 3px;
      line-height: 1;
    }
    aside section h1 {
      font-size: 1.4em;
      text-align: left;
      letter-spacing: -1px;
      margin-bottom: 3px;
      margin-top: 0px;
    }

    .gravatar {
      float: left;
      margin-right: 10px;
    }

    /* forms */
    input, textarea, select, .uneditable-input {
      border: 1px solid #bbb;
      width: 100%;
      margin-bottom: 15px;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    input {
      height: auto !important;
    }

    #error_explanation {
      color: #f00;
    }
    #error_explanation ul {
      list-style: none;
      margin: 0 0 18px 0;
    }

    /* Users index */
    .users {
      list-style: none;
      margin: 0;
    }
    .users li {
      overflow: auto;
      padding: 10px 0;
      border-top: 1px solid #eaeaea;
    }
    .users li:last-child {
      border-bottom: 1px solid #eaeaea;
    }

    /* microposts */
    .microposts {
      list-style: none;
      margin: 10px 0 0 0;
    }
    .microposts li {
      padding: 10px 0;
      border-top: 1px solid #e8e8e8;
    }

    .content {
      display: block;
    }

    .timestamp {
      color: #eaeaea;
    }

    .gravatar {
      float: left;
      margin-right: 10px;
    }

    aside textarea {
      height: 100px;
      margin-bottom: 5px;
    }

    .stats {
      overflow: auto;
    }
    .stats a {
      float: left;
      padding: 0 10px;
      border-left: 1px solid #eaeaea;
      color: gray;
    }
    .stats a:first-child {
      padding-left: 0;
      border: 0;
    }
    .stats a:hover {
      text-decoration: none;
      color: blue;
    }
    .stats strong {
      display: block;
    }

    .user_avatars {
      overflow: auto;
      margin-top: 10px;
    }
    .user_avatars .gravatar {
      margin: 1px 1px;
    }

  </style>
  <link rel="stylesheet" href="./css/bootstrap/main.css">
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


  <script id="account-info" type="x/handlebars">
<div id="top-bar" style="text-align: right; width: 700px; margin: auto; background: white; padding: 0px 0px;"><ul class="nav nav-pills" style="margin-top: 5px;">
    <li><a href="home.php">Home</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="dekaaz.php" >Dekaaz</a></li>
    <li class="active"><a href="index.html" >Compose</a></li>
    <li><a href="#" onClick="logoutFunc()" id="logout-button">{message}</a></li>
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Account <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="myaccount.php">Profile Page</a></li>
            <li><a href="personal_feed.php">Personal Feed</a></li>
            <!--<li><a href="#">Sent Items</a></li>
            <li class="divider"></li>
            <li><a href="#">Trash</a></li>-->
        </ul>
    </li>
    
    <li class="dropdown pull-right"><a>{greeting}</a></li>
</ul></div>
</script>

  


  

