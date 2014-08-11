<?php include_once("new_header.php"); ?>
  <div id="main" style="background-color: none; margin-bottom: 20px;">

		
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
      </body>
</html>
