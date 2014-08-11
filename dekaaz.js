
var currentDekaaz = 0;

//shows one Dekaaz on the webpage, and hides the rest
//clicking the left and right arrows allows user to view other Dekaaz
function individualizeDekaazs(num) {

    $('#incomplete-items li').slice(currentDekaaz+1).hide();
    $('#incomplete-items li:eq(' + currentDekaaz + ')').show();
    $(window).keydown(function(e){
    	//when the right arrow key is clicked, show the next Dekaaz
	    if(e.which === 39){
	        if(currentDekaaz<num-1){
	            $('#incomplete-items li:eq(' + currentDekaaz + ')').hide();
	            currentDekaaz = currentDekaaz+1;
	            $('#incomplete-items li:eq(' + currentDekaaz + ')').show();
	        }
	    }
	    //when the left arrow key is clicked, show the previous Dekaaz
	    else if(e.which === 37){
    		if(currentDekaaz>0){
	            $('#incomplete-items li:eq(' + currentDekaaz + ')').hide();
	            currentDekaaz = currentDekaaz-1;
	            $('#incomplete-items li:eq(' + currentDekaaz + ')').show();
	        }
	    }
	});
    
}

YUI().use('node', function(Y) {
	
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

	/* 
	The following code applies to the top navigation bar 
	(Refer to the #account-info element in header.php for the HTML) 
	*/
	$(document).ready(function() {

		//if the user is not logged in, redirect to signup.html
		var currentUser = Parse.User.current();
		var name;
		
		//if the user is logged into his Dekaaz account
		if (currentUser) {
			var username;
			
			//if the user is logged into his Dekaaz account,
			//but has logged out of the associated Facebook account,
			//redirect the user to signup.html
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
			/* initialize content to hold the HTML under '#account-info' script tag in header.php */
			mess = "Log Out";
			/* initialize content to hold the HTML under '#account-info' script tag in header.php */
			var content = Y.Lang.sub(Y.one('#account-info').getHTML(), {
				greeting: name,
				message: mess
			});

			accountInfo.prepend(content);
			
		} 
		//if the user is not logged into his Dekaaz account
		else {
			name = "No Account";
			mess = "Log In";
			/* initialize content to hold the HTML under '#account-info' script tag in index.html */
			var content = Y.Lang.sub(Y.one('#account-info').getHTML(), {
				greeting: name,
				message: mess
			});

			accountInfo.prepend(content);
			$("#top-bar li:nth-last-child(2)").hide();
		}

	});

	//populates the page with Dekaaz poems
	function populate(val, owner_param, owner_id_param, role) {

		var syllarray = val.get("syllarray");
		var num = 0;
		for(var index_syllarray = 0; index_syllarray < syllarray.length; index_syllarray++) {
			var weight = Math.pow(2, index_syllarray);
			num += syllarray[index_syllarray]*weight;

		}

		num++;

		var fileName = "" + num + ".png";

		if(owner_id_param == null) {
			var audioHTML;
			if(val.get('Sound') != null) {
				audioHTML = '<audio controls><source src="' + val.get('Sound') + '" type="audio/mpeg">Your browser does not support this audio format.</audio>';
			} else {
				audioHTML = 'NO AUDIO AVAILABLE';
			}
			
			var content = Y.Lang.sub(Y.one('#todo-items-template-no-account').getHTML(), {
				line1: val.get('line1'),
				line2: val.get('line2'),
				line3: val.get('line3'),
				owner: owner_param,
				createdAt: val.get('createdAt'),
				audio: audioHTML,
				id: val.id,
				file: fileName,
			});
			incompleteItemList.prepend(content);
		} else {
			var audioHTML;
			if(val.get('Sound') != null) {
				audioHTML = '<audio controls><source src="' + val.get('Sound') + '" type="audio/mpeg">Your browser does not support this audio format.</audio>';
			} else {
				audioHTML = 'NO AUDIO AVAILABLE';
			}
			var content = Y.Lang.sub(Y.one('#todo-items-template').getHTML(), {
				line1: val.get('line1'),
				line2: val.get('line2'),
				line3: val.get('line3'),
				owner: owner_param,
				owner_id: owner_id_param,
				createdAt: val.get('createdAt'),
				audio: audioHTML,
				id: val.id,
				file: fileName,
			});
			incompleteItemList.prepend(content);
		}

		var canvas = document.getElementById("mysketch-" + val.id);
		var context = canvas.getContext('2d');
		var imageObj = new Image();
        imageObj.onload = function() {
          context.drawImage(this, 0, 0);
        };

        imageObj.src = './images/' + fileName;

		// The following three variables are arrays of integers that hold the syllable
		// counts for each word of each line of the Dekaaz
		var first_line_syllables = val.get('line1syll');
		var second_line_syllables = val.get('line2syll');
		var third_line_syllables = val.get('line3syll');

		// This line sets the image. I have set it to be Logo.png, but you can
		// set the image with Processing, given the three arrays of int's directly above.
		// $('#incomplete-items:first>li img').attr('src', 'images/Logo.png');
	}

	/* Search Dekaazs */
	$(".dekaaz_search").submit(function() {
		Dekaaz = Parse.Object.extend("Dekaaz");
		query = new Parse.Query(Dekaaz);
		
		query.descending('createdAt');
		/* get the search query, and put it in str; if the search query has only spaces, then do nothing and return false */
		var str = $("#tfnewsearch .tftextinput").val();
		
		/* split the search query (based on whitespace) into an array of Strings.
		Each Dekaaz in the database has a "words" attribute, which is an array of strings containing the keywords of
		each Dekaaz. Look at "/dekaaz/MyCloudCode/cloud/main.js" file to see exactly how the words array is generated based on a given Dekaaz.
		Use the Parse.Query object's containedIn method to search the database for Dekaaz's whose words attribute contains
		the words in the search query.
		Empty the current list of Dekaazs.
		For each of the results of the query, load the HTML under the '#todo-items-template' script tag into the content var.
		Now that content var has all the HTML for the Dekaaz's, prepend it to the incompleteItemList, 
		which is just the '#incomplete-items' tag in "index.html"

		Later on, we might want to do "Or" search queries; refer to site here: https://www.parse.com/questions/search-full-text-search-and-or-queries
		 */

		var array;
		Parse.Cloud.run('averageStars', {"query" : str}, {
		  success: function(data) {
		  	array = data;
		    query.containedIn("words", array);
		    query.include("username");
			query.find({
			  success: function(results) {
			  	console.log(results);
			  	incompleteItemList.empty();
			  	Y.Array.each(results, function(val, i, arr) {
			  		// console.log("results length");
			  		// console.log(results.length);
			  		var author = val.get('parent');
			  		// console.log(author.getUsername() + " ; " + author.id);
			  		if(author != null) {
				  		author.fetch({
						  success: function(author) {
						    var author_name = author.getUsername();
						  	populate(val, author.getUsername(), author.id);
						  	if(i == results.length - 1) {
								paginateDekaazs(results.length);
							}
						  }
						});
					} else {
						populate(val, "Unknown", null);
						if(i == results.length - 1) {
							paginateDekaazs(results.length);
						}
					}

				});
			  },
			  error: function(error) {
			    alert("Error when retrieving: " + error.code + " " + error.message);
			  }
			});
		  },
		  error: function(error) {
		  	
		  }
		});

		return false;

		
	});
	
	
	

	/* Dekaaz Listing: Retrieve the 10 most recent Dekaazs, and load the 
	'#todo-items-template', passing in the Dekaaz's */
	Dekaaz = Parse.Object.extend("Dekaaz");
	query = new Parse.Query(Dekaaz);
	// query.limit(10);
	query.descending('createdAt');
	query.find({
	  success: function(results) {
			if (results.length > 0) {
				noTasksMessage.addClass('hidden');
			}
			//Append each of the incomplete tasks to the Incomplete List
			Y.Array.each(results, function(val, i, arr) {


			  		var author = val.get('parent');
			  		if(author != null) {
				  		author.fetch({
						  success: function(author) {
						    var author_name = author.getUsername();

						    populate(val, author_name, author.id);
							attachUserLinks();
							if(i == results.length - 1) {
								individualizeDekaazs(results.length);
							}
						  }
						});
					} else {
						populate(val, "Unknown", null);
						attachUserLinks();
						if(i == results.length - 1) {
							individualizeDekaazs(results.length);
						}
					}
			});
			
	  },
	  error: function(error) {
	    alert("Error when retrieving Todos: " + error.code + " " + error.message);
	  }
	});
	
});
