<!DOCTYPE html>
<head>
  <meta charset="utf-8">

  <title>Dekaaz</title>
  <meta name="description" content="Dekaaz App">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
  <script src="http://yui.yahooapis.com/3.6.0/build/yui/yui-min.js"></script>
  <script type="text/javascript" src="parse.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script type="text/javascript"></script>
<link href="css/twitter-bootstrap.css" rel="stylesheet">

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
  <!-- 
	The following script code generates the top navigation bar, with "About", "Compose", and "Log Out" buttons
	on the left, and a greeting on the right.
	The code is executed when the user logs in, and is redirected to this page. Look at the "Top Navigation Bar" section in "feed.js" file to see the actual code.
  -->
  
<!-- dropdown menu code from: http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-dropdowns.php -->
<script id="account-info" type="x/handlebars">
<div id="top-bar" style="text-align: right; width: 700px; margin: auto; background: white; padding: 0px 0px;"><ul class="nav nav-pills" style="margin-top: 5px;">
    <li><a href="home.html">Home</a></li>
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
    <!--<li class="dropdown pull-right">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Admin <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li class="divider"></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </li>-->
    <li class="dropdown pull-right"><a>{greeting}</a></li>
</ul></div>
</script>


  <h1><img src="images/dekaaz.png" style="padding-top: 10px; height: auto; max-width: 400px;"/></h1>
  <div id="main" style="background-color: #F5F5F5; margin-bottom: 20px;">
		
		<div id="input-wrapper">
			<!-- Everything wrapped inside the "dekaaz-maker" div specifies the input boxes into which the user can enter their dekaaz. Once the "poem-submit" button is clicked, the Dekaaz is saved to the Parse Database. Refer to "Dekaaz Saved to Database" section in "feed.js" to see how this is done. 

			As the user types words into the input fields, there will be real-time updates in the "syll_count" div, giving the user feedback on how many syllables he/she has used so far. Refer to: "Syllable Counting Using Wordnik" section in the "feed.js" file for the code for syllable counting.
			-->
			<div id="dekaaz-maker" style="width: 100%; height: 150px;">
			
				<div style="width: 50%; margin-left: 10px; float: left !important; display: inline;">
					<input type="text" id="poem-input-1" placeholder="Two Syllables" class="lines">
			
					<input type="text" id="poem-input-2" placeholder="Three Syllables" class="lines">
			
					<input type="text" id="poem-input-3" placeholder="Five Syllables" class="lines">
					<br/>
				</div>
			
				<div style="width: 40%; float: right !important; display: inline; text-align: right;" id="syll_count">0 syllables
				</div>
		
			</div>
			<div>
				<input style="text-align: left !important;" type="button" id="poem-submit" value="Add">
				<br/>
				<h2>Shared Dekaaz:</h2>



	
		<!-- HTML for SEARCH BAR; the Javascript for loading the results of the search can be found in "feed.js" under "Search Dekaazs" section -->
		<form style="width: 100%;" id="tfnewsearch" method="get" class="dekaaz_search" >
		        <input style="width: 80%;" type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton" style="border-right:solid 1px black; border: solid 1px black !important; width: 20%;">
		</form>
	
	



			<!-- this <ul> tag is populated with the entire listing of Dekaazs (look at "Dekaaz Listing" section in the "feed.js" file), or, if the Search button is clicked, this <ul> tag is populated with the search results (look at "Search Dekaazs" section in the "feed.js" file) using Javascript. The HTML for the Dekaaz's can be seen in the "todo-items-template" script seen immediately after the <ul> tag. -->
			<ul id="incomplete-items">
				<li id="no-incomplete-message">There are no Dekaaz yet. Consider writing one!</li>
			</ul>
			<script id="todo-items-template" type="x/handlebars">
				<li class="list-item">

				<!--<input type="checkbox" id="{id}">-->
				
				<div style="display: inline-block; width: 47%; ">
				{line1}<br/>{line2}<br/>{line3}<br/><a id="{owner_id}" class="user">{owner}</a><br/>
				</div>
				<div style="display: inline-block; width: 47%; vertical-align: top; float: right;">
					<img src="images/form.png" style="max-height: 100px; max-width: 100px; float: right;"/>
				</div>
				
				</li>
			</script>
			<!--<img src="Logo.png" style="max-height: 100px; max-width: 100px; "/>-->
		</div>
	
  </div>
		<!--<div id="example"></div>-->
<div class="pagination pagination-centered" style="width:100%;">
        <ul style="width:100%;">

        </ul>
</div>    
	<!-- The feed that contains all the parse JS stuff, keys, etc-->
	<script type="text/javascript" src="modified_feed.js">
	</script>
	<script id="bottom_paginator" type="x/handlebars">

          <li class="active"><a href="#">10</a></li>
          <li class="disabled"><a href="#">...</a></li>
          <li><a href="#">20</a></li>

</script>
	
</body>

</html>
