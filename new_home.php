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
</head>
<body>
<img src="images/DekaazTransparent.png" style="width: 1500px; position: absolute; left:0; right:0; margin-left:auto; margin-right:auto; z-index: 10; margin-top: 100px;"/>
 <div style="width: 500px; position: absolute; left:0; right:0; margin-top: 700px; margin-left: auto; margin-right:auto; z-index: 10;">

		<div id="input-wrapper" style="position: absolute; margin-left: auto; margin-right: auto">
			<!-- Everything wrapped inside the "dekaaz-maker" div specifies the input boxes into which the user can enter their dekaaz. Once the "poem-submit" button is clicked, the Dekaaz is saved to the Parse Database. Refer to "Dekaaz Saved to Database" section in "feed.js" to see how this is done. 

			As the user types words into the input fields, there will be real-time updates in the "syll_count" div, giving the user feedback on how many syllables he/she has used so far. Refer to: "Syllable Counting Using Wordnik" section in the "feed.js" file for the code for syllable counting.
			-->
			<div id="dekaaz-maker" style="width: 100%; height: 150px;">
			
				<div style="width: 50%; height:100px; display: inline;">
					<input type="text" id="poem-input-1" placeholder="Two Syllables" class="lines">
			
					<input type="text" id="poem-input-2" placeholder="Three Syllables" class="lines">
			
					<input type="text" id="poem-input-3" placeholder="Five Syllables" class="lines">
					<br/>
				</div>
			
				<div style="width: 40%;  float: right; display: inline; text-align: right;" id="syll_count">0 syllables
				</div>
		
			</div>
			<div>
        <div class="croaker" croakcb="1" style="margin-top: 30px; float: left; width: 200px"></div>

        <input style="margin-top: 30px; float: left; text-align: center !important; width: 100px" type="button" id="poem-submit" value="Add">
        
        <!-- end copy/paste -->
      </div>
      </div>
        <script type="text/javascript" src="utils.js"></script>
        <script type="text/javascript">
          var isEditing = false;
        </script>
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
</div>

    <div id="myCanvasContainer" style="position: relative;  border: 1px solid black">
      <canvas width="1200" height="1200" id="myCanvas">
        <p>Anything in here will be replaced on browsers that support the canvas element</p>
      </canvas>
    </div>
    <div id="tags">
      <ul>
        <li><a href="/index.php"><image src="images/1.png"/></a></li>
<li><a href="/index.php"><image src="images/2.png"/></a></li>
<li><a href="/index.php"><image src="images/3.png"/></a></li>
<li><a href="/index.php"><image src="images/4.png"/></a></li>
<li><a href="/index.php"><image src="images/5.png"/></a></li>
<li><a href="/index.php"><image src="images/6.png"/></a></li>
<li><a href="/index.php"><image src="images/7.png"/></a></li>
      </ul>
    </div>
  </body>
</html>