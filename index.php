<?php include_once("header.php"); ?>
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
        <div class="croaker" croakcb="1"></div>
        <br/>
				<input style="text-align: left !important;" type="button" id="poem-submit" value="Add">
				<br/>

        <div id="audio"></div>
				<h2>Shared Dekaaz:</h2>



	
		<!-- HTML for SEARCH BAR; the Javascript for loading the results of the search can be found in "feed.js" under "Search Dekaazs" section -->
		<form style="width: 100%;" id="tfnewsearch" method="get" class="dekaaz_search" >
		        <input style="width: 70%;" type="text" class="tftextinput" name="q" size="21" maxlength="120">
            <input type="submit" value="search" class="tfbutton" style="border-right:solid 1px black; border: solid 1px black !important; width: 20%;">
		</form>
	
	



			<!-- this <ul> tag is populated with the entire listing of Dekaazs (look at "Dekaaz Listing" section in the "feed.js" file), or, if the Search button is clicked, this <ul> tag is populated with the search results (look at "Search Dekaazs" section in the "feed.js" file) using Javascript. The HTML for the Dekaaz's can be seen in the "todo-items-template" script seen immediately after the <ul> tag. -->
			<ul id="incomplete-items">
				<li id="no-incomplete-message">There are no Dekaaz yet. Consider writing one!</li>
			</ul>

            <script id="todo-items-template" type="x/handlebars">
        
        <div style="display: inline-block; width: 47%; ">
        {line1}<br/>
        {line2}<br/>
        {line3}<br/>
        Author: <a id="{owner_id}" class="user">{owner}</a><br/>

        <!--facebook likes-->
        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
        </div>
        {audio}

        <!--delete button for admin-->
        <br/>
        <input style="text-align: left !important; height: 40px; " type="button" class="deleteBtn" id="{id}" value="Delete" onClick="deletePoem('{id}')"/>
        <br>    
        </div>

        <!--Dekaaz pics-->
        <div style="display: inline-block; width: 47%; vertical-align: top; float: right;">
        

        <canvas id="mysketch-{id}" data-processing-sources="form.pde" style="max-height: 100px; max-width 100px; float: right;" file="{file}"></canvas>
        

        </div>
        
      </script>
      <script id="todo-items-template-no-account" type="x/handlebars">
        
        <div style="display: inline-block; width: 47%; ">
        {line1}<br/>{line2}<br/>{line3}<br/>Author: {owner}<br/>
        {audio}
        <!--delete button for admin-->
        <br/>
        <input style="text-align: left !important; height: 40px; " type="button" class="deleteBtn" id="{id}" value="Delete" onClick="deletePoem('{id}')"/>
        <br> 
        </div>
        <div style="display: inline-block; width: 47%; vertical-align: top; float: right;">
        <canvas id="mysketch-{id}" data-processing-sources="form.pde" style="max-height: 100px; max-width 100px; float: right;" file="{file}"></canvas>

        </div>
        
      </script>

		</div>
	
  </div>
<div class="pagination pagination-centered" style="width:100%;">
        <ul style="width:100%;">

        </ul>
</div>    



  <script type="text/javascript">
    Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");
    var xx = 0;
    var syllable_map = {};
    syllable_map["test"] = "test";
    var ids = new Array();
    var allpoems = new Array();

      Dekaaz = Parse.Object.extend("Dekaaz");
      query = new Parse.Query(Dekaaz);
      
      // query.include("syllarray");
      query.descending('createdAt');


      query.find({
          success: function(results) {
            $.each(results, function( index, value ) {
              ids.push(value.id); 
              syllable_map[value.id] = value.get("syllarray");
              allpoems.push(value.get("line1") + " " + value.get("line2") + " " + value.get("line3"));
            });
            syllable_map["test"] = "nottest";
            // console.log(syllable_map);
            // console.log(ids);
            return syllable_map;

          },
          error: function(error) {
            alert("Error when retrieving: " + error.code + " " + error.message);
          }
      });

    function getSyllableArray() {
      var y = 5;
      
      while(syllable_map["test"] == "test") {

        // console.log("SDF");
        y++;
      }
      
      console.log(syllable_map);

      var ret = syllable_map[ids[xx]];
      console.log("SSS");
      console.log(allpoems[xx]);
      console.log(xx);
      // console.log(ids);
      console.log(ids[xx]);
      console.log(ret);

      xx++;
      return ret;
    }


    
  </script>
	<!-- The feed that contains all the parse JS stuff, keys, etc-->
	<script type="text/javascript" src="feed.js">
	</script>
	<script id="bottom_paginator" type="x/handlebars">

          <li class="active"><a href="#">10</a></li>
          <li class="disabled"><a href="#">...</a></li>
          <li><a href="#">20</a></li>

  </script>
	
</body>

</html>
