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
  <script type="text/javascript" src="parse.js"></script>


  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>

  <script type="text/javascript">stLight.options({publisher: "3b8f0c68-515f-47b3-9466-8ea8a1762008", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

  <!-- popup iframe for edit button -->
  <link rel="stylesheet" href="css/colorbox.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="js/jquery.colorbox.js"></script>

  
  
  <!-- -->

<!--  <script type="text/javascript" src="processing.js"></script>-->


<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
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

<script>
var poemid = "<?php
  echo $_GET['id'];
?>";
</script>

  <div id="main" style="margin-bottom: 20px;">

		<div id="input-wrapper">
			<!-- Everything wrapped inside the "dekaaz-maker" div specifies the input boxes into which the user can enter their dekaaz. Once the "poem-submit" button is clicked, the Dekaaz is saved to the Parse Database. Refer to "Dekaaz Saved to Database" section in "feed.js" to see how this is done. 

			As the user types words into the input fields, there will be real-time updates in the "syll_count" div, giving the user feedback on how many syllables he/she has used so far. Refer to: "Syllable Counting Using Wordnik" section in the "feed.js" file for the code for syllable counting.
			-->
			<div id="dekaaz-maker" style="width: 100%; height: 150px;">
			
				<div style="width: 50%; margin-left: 10px; float: left !important; display: inline;">
					<input type="text" id="poem-input-1" class="lines">
			
					<input type="text" id="poem-input-2" class="lines">
			
					<input type="text" id="poem-input-3" class="lines">
					<br/>
				</div>
			
				<div style="width: 40%; float: right !important; display: inline; text-align: right;" id="syll_count">0 syllables
				</div>
		
			</div>
			<div>
        <div class="croaker" croakcb="1"></div>
        <br/>
				<div id="audio"></div>
				<br/>
        <input style="text-align: left !important;" type="button" id="poem-submit" value="Add">
        
        <!-- end copy/paste -->
      </div>
      </div>
        <script>
          var isEditing = true;
        </script>
        <script type="text/javascript" src="utils.js"></script>
        <script type="text/javascript" src="home.js"></script>
        <script type="text/javascript" src="poemedit.js"></script>
      </body>
</html>
