<?php include_once("header.php"); ?>
<h1><img src="images/dekaaz.png" style="padding-top: 10px; height: auto; max-width: 400px;"/></h1>
  <div id="main" style="background-color: #F5F5F5; margin-bottom: 20px;">
<!--<!DOCTYPE html>
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
  
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://croak.it/talk/croakit_talk.js"></script>

  <script src="http://yui.yahooapis.com/3.6.0/build/yui/yui-min.js"></script>
  <script type="text/javascript" src="parse.js"></script>

  <script type="text/javascript" src="processing.js"></script>

  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
	      $(".dropdown-toggle").dropdown();
    });  
  </script>


  <style>
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


    </script> -->
  <!-- 
	The following script code generates the top navigation bar, with "About", "Compose", and "Log Out" buttons
	on the left, and a greeting on the right.
	The code is executed when the user logs in, and is redirected to this page. Look at the "Top Navigation Bar" section in "feed.js" file to see the actual code.
  -->
  <!--<script id="account-info" type="x/handlebars"><div style="text-align: right; width: 620px; margin: auto; background: white; padding: 0px 0px;"><div class="left" style="text-align: left !important;"><a href="about.php">About</a> | <a href="index.html" >Compose</a> | <a href="signup.html" id="logout-button">Log Out</a></div><div class="right">Welcome, {username}! </div></div></script>-->
<!-- dropdown menu code from: http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-dropdowns.php -->
<!--<script id="account-info" type="x/handlebars">
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
            
        </ul>
    </li>
    <li class="dropdown pull-right"><a>{greeting}</a></li>
</ul></div>
</script>


  <h1><img src="images/dekaaz.png" style="padding-top: 10px; height: auto; max-width: 400px;"/></h1>
  <div id="main" style="background-color: #F5F5F5; margin-bottom: 20px;">-->
		
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
        <div class="croaker" croakcb="1"></div>
        <br/>
				<div id="audio_div"></div>
				<br/>
        <input style="text-align: left !important;" type="button" id="poem-submit" value="Add">
        
        <!-- end copy/paste -->
      </div>
      </div>
        <script type="text/javascript" src="utils.js"></script>
        <script type="text/javascript" src="home.js"></script>
        <script type="text/javascript">

          function decompose(syll_arr) {

            var structure = new Array();
            structure[0] = 2;
            structure[1] = 3;
            structure[2] = 5;
            var struct_index = 0;

            var totalSyllCount = 0;
            for (var p=0;p<syll_arr.length;p++)
            {
              totalSyllCount += syll_arr[p];
              if(totalSyllCount == structure[struct_index]) {
                struct_index++;
                totalSyllCount = 0;
              } else {
                if(totalSyllCount > structure[struct_index]) {
                  alert("Syll Count Wrong!");
                  return null;
                }
              }
            }

            var current_index = 0;

            var solution = new Array();
            solution[0] = new Array();
            solution[1] = new Array();
            solution[2] = new Array();

            var bool = new Array();

            for (var i=0;i<syll_arr.length;i++)
            { 
              structure[current_index] -= syll_arr[i];
              solution[current_index][solution[current_index].length] = syll_arr[i];
              if(structure[current_index] == 0) {
                for (var k=0;k<solution[current_index].length;k++)
                {
                  for(var l=0;l<solution[current_index][k] - 1;l++) {
                    bool.push(true);
                  }
                  bool.push(false);
                }
                bool.pop();
                current_index++;
              }
            }
            console.log(bool);
            return bool;
          }

          var submitBtn = $("#poem-submit");
          var input1 = $("#poem-input-1"),
          input2 = $("#poem-input-2"),
          input3 = $("#poem-input-3");

          /* 
          Dekaaz Saved to Database:
          Save a Dekaaz to the database, and update the Shared Dekaaz's to include this newly created Dekaaz 
          */
          submitBtn.on('click', function(e) {
            
          
            //Save the current Dekaaz
            var textLine1 = $('#poem-input-1').val();
            var textLine2 = $('#poem-input-2').val();
            var textLine3 = $('#poem-input-3').val();

            alert(textLine1 + " " + textLine2 + " " + textLine3);

            var Dekaaz = Parse.Object.extend("Dekaaz");
            var dekaazPoem = new Dekaaz();
            

            dekaazPoem.set("line1", textLine1);
            dekaazPoem.set("line2", textLine2);
            dekaazPoem.set("line3", textLine3);
            var decomposed_array = decompose(sylls.slice(1, sylls.length - 1));
            if(decomposed_array == null) {
              return;
            }
            // dekaazPoem.set("line1syll", decomposed_array[0]);
            // dekaazPoem.set("line2syll", decomposed_array[1]);
            // dekaazPoem.set("line3syll", decomposed_array[2]);
            dekaazPoem.set("syllarray", decomposed_array);
            dekaazPoem.set("Sound", soundFile);

            if(Parse.User.current() != null) {
              dekaazPoem.set("parent", Parse.User.current());
            }
            alert("Thank you for submitting a Dekaaz!");
            //Once it is saved, show it in the list of dekaaz.
            dekaazPoem.save(null, {
              success: function(item) {

                if(Parse.User.current() != null) {
                  Parse.User.current().relation("Post").add(dekaazPoem);
                  var curr_username = Parse.User.current().getUsername();
                  Parse.User.current().save();
                  Parse.User.current().setUsername(curr_username);
                }

                input1.val('');
                input2.val('');
                input3.val('');
                
              }
            });


          });
      </script>
      </body>
</html>
