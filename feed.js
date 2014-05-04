Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");

var soundFile;

 function croakCallbackFunction(croak_id,croakmp3source,callbackCode)
 {
    if(callbackCode==1){
           
           var str = '<audio controls><source src="' + croakmp3source + '" type="audio/mpeg">Your browser does not support this audio format.</audio>';
           
           soundFile = croakmp3source;
		   $('#audio').html(str);

    }
 }

function logoutFunc() {
	$("#logout-button").attr("disabled", "disabled");

	Parse.User.logOut();
	window.location.href = "signup.html";
}

function getRealUsername(user) {

	return user.getUsername();
}

function attachUserLinks() {
	$(".user").click(function() {
		setCookie("user_account", $(this).attr('id'), 1);
		window.location.href = "account.php";
	});
}

function paginateDekaazs(num) {
	// num = 100;
 //    var options = {
 //        currentPage: 3,
 //        totalPages: Math.ceil(num/10)
 //    }
 	$('.pagination ul').empty();
    var x = '<li><a href="javascript:goToPreviousPage()">←</a></li>';
    $('.pagination ul').append(x);
 	// x = '<li class="active" id="' + 1 + '"><a href="javascript:goToPage(1)">1</a></li>';
 	// $('.pagination ul').append(x);
 	// if(Math.floor(num/10) == 0) {
 	// 	x = '<li class="active" id="1"><a href="javascript:goToPage(' + 1 + ')">' + 1 + '</a></li>';
  // 		$('.pagination ul').append(x);
 	// }
 	for (var i=1; i<=Math.ceil(num/10); i++)
  	{
  		if(i == 1) {
  			x = '<li class="active" id="' + i + '"><a href="javascript:goToPage(' + i + ')">' + i + '</a></li>';
  			$('.pagination ul').append(x);
  			continue;
  		}
  		x = '<li id="' + i + '"><a href="javascript:goToPage(' + i + ')">' + i + '</a></li>';
 		$('.pagination ul').append(x);
  	}
    // $('.pagination ul').append('<li class="disabled"><a href="#">...</a></li>');
	$('.pagination ul').append('<li><a href="javascript:goToAfterPage(' + Math.floor(num/10) + ')">→</a></li>');
    // $('#example').bootstrapPaginator(options);
    $('#incomplete-items li').slice(10).hide();
    $('#incomplete-items li').slice(0, 10).show();

    // attachPaginationEvents(Math.ceil(num/10));
}

function goToPage(num) {
	$('#incomplete-items li').slice(0, num*10-10).hide();
	$('#incomplete-items li').slice(num*10-10, num*10).show();
	$('#incomplete-items li').slice(num*10).hide();
	$('.active').removeClass('active');
	$('#' + num).addClass('active');
	
}

function goToPreviousPage() {
	var num = $('.active').attr('id');
	if(num-1 >= 1) {
		goToPage(num-1);
	}
}

function goToAfterPage(maxnum) {
	var num = parseInt($('.active:last').attr('id'));
	if(num+1 <= maxnum) {
		goToPage(num+1);
	}
}

function attachPaginationEvents(num) {
 	for (var i=1; i<=Math.floor(num/10); i++)
  	{
  		$('#' + i).click(function() {
  			return false;
  		});
  	}
}

function getCookie(cname)
{
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) 
	  {
	  var c = ca[i].trim();
	  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
	  }
	return "";
}

function setCookie(cname,cvalue,exdays)
{
	var d = new Date();
	d.setTime(d.getTime()+(exdays*24*60*60*1000));
	var expires = "expires="+d.toGMTString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
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

	function populate(val, owner_param, owner_id_param) {


		// console.log(Parse.User.current().get('role'));
		// if(Parse.User.current().get('role') != null) {
		// 	console.log(Parse.User.current().get('role'));
		// }

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
			});

			incompleteItemList.prepend(content);
			
			// Parse.User.current().fetch({
		 //  	success: function(author) {
		 //  		if(author.get('role') == 0) {
		  			
		 //  		}
		 //  	  }
		 //  	});
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
			});
			incompleteItemList.prepend(content);
		}

		// The following three variables are arrays of integers that hold the syllable
		// counts for each word of each line of the Dekaaz
		var first_line_syllables = val.get('line1syll');
		var second_line_syllables = val.get('line2syll');
		var third_line_syllables = val.get('line3syll');

		// This line sets the image. I have set it to be Logo.png, but you can
		// set the image with Processing, given the three arrays of int's directly above.
		//$('#incomplete-items:first>li img').attr('src', 'images/Logo.png');
		//Processing.reload();
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
		  	alert(error.message);
		  }
		});

		return false;

		
	});

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
		

			

			//-------
			

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

			// for (var k=0;k<syll_arr.length;k++)
			// {
			// 	for (var k=0;k<syll_arr.length;k++)
			// 	{
			// 		for(var l=0;l<syll_arr[k] - 1;l++) {
			// 			bool.push(true);
			// 		}
			// 		bool.push(false);
			// 	}
			// }

			// console.log(bool);
			// return null;

			// var structure = new Array();
			// structure[0] = 2;
			// structure[1] = 3;
			// structure[2] = 5;

			// var current_index = 0;

			// var solution = new Array();
			// solution[0] = new Array();
			// solution[1] = new Array();
			// solution[2] = new Array();


			// for (var i=0;i<syll_arr.length;i++)
			// { 
			// 	structure[current_index] -= syll_arr[i];
			// 	solution[current_index][solution[current_index].length] = syll_arr[i];
			// 	if(structure[current_index] == 0) {
			// 		current_index++;
			// 	}
			// }
			// console.log(solution);
			// return solution;
		
	}

	/* 
	Dekaaz Saved to Database:
	Save a Dekaaz to the database, and update the Shared Dekaaz's to include this newly created Dekaaz 
	*/
	submitBtn.on('click', function(e) {
		
	
		//Save the current Dekaaz
		var textLine1 = Y.one('#poem-input-1').get('value');
		var textLine2 = Y.one('#poem-input-2').get('value');
		var textLine3 = Y.one('#poem-input-3').get('value');
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
				noTasksMessage.addClass('hidden');
				var owner_name;
				if(Parse.User.current() != null) {
					console.log(Parse.User.current().get("username"));
					owner_name = Parse.User.current().getUsername();
					populate(item, owner_name, Parse.User.current().id);
				} else {
					owner_name = "Unknown";
					populate(item, owner_name, null);
				}

				input1.set('value', '').focus();
				input2.set('value', '').focus();
				input3.set('value', '').focus();
				
		  }
		});


	});
	
	
	

	/* Dekaaz Listing: Retrieve the 10 most recent Dekaazs, and load the 
	'#todo-items-template' which can be found in "index.html", passing in the Dekaaz's */
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
						    //Processing.reload();


							attachUserLinks();
							if(i == results.length - 1) {
								paginateDekaazs(results.length);
							}
						  }
						});
					} else {
						populate(val, "Unknown", null);
						attachUserLinks();
						if(i == results.length - 1) {
							paginateDekaazs(results.length);
						}
					}

			});
			
	  },
	  error: function(error) {
	    alert("Error when retrieving Todos: " + error.code + " " + error.message);
	  }
	});
	Processing.reload();
});

/* 
Helper method for counting syllables in the parameter, word.
This is a backup method for counting syllables, in case Wordnik is unable to count the syllables.
 */
function new_count(word) {
  word = word.toLowerCase();                                     //word.downcase!
  if(word.length == 0) { return 0; }
  if(word.length <= 3) { return 1; }                             //return 1 if word.length <= 3
  word = word.replace(/(?:[^laeiouy]es|ed|[^laeiouy]e)$/, '');   //word.sub!(/(?:[^laeiouy]es|ed|[^laeiouy]e)$/, '')
  word = word.replace(/^y/, '');                                 //word.sub!(/^y/, '')
  return word.match(/[aeiouy]{1,2}/g).length;                    //word.scan(/[aeiouy]{1,2}/).size
}

var sylls;

/* 
Syllable Counting Using Wordnik
 */
$(document).ready(function() {
	/* We will use an example to illustrate the code. Consider the following Dekaaz:
	
		world
		hello
		yen

	The Dekaaz is invalid, but it is simple enough to illustrate the code.
	The following comments are oriented towards this example.
	*/
	setInterval(function() {
	
	/* sylls is an array that will, in the end, hold the number of syllables in each word of the Dekaaz, 
	but with 0's in the first and last index.
	In the example above, sylls will, in the end, be [0, 1, 2, 1, 0]
	The reason we pad the beginning and end of the array with 0's is explained later.
	 */
	sylls = new Array();
	
	/* curr_dekaaz holds " world hello yen "
	Later on, we will break curr_dekaaz into its constituent words based on whitespace.
	The reason I added spaces to the beginning and end of the Dekaaz is because it is possible the user may have added
	spaces unintentionally to the beginning or end of each input field when entering the Dekaaz. 
	Then, when the split method for Strings is applied, the String " world hello yen " will produce different results
	from "world hello yen". The first will produce ["", "world", "hello", "yen", ""], while the second will produce
	[world", "hello", "yen"]
	To establish conformity, I add whitespace to the beginning, end, and in between each two consecutive lines. Then,
	the split method will always produce ["", "world", "hello", "yen", ""] as the result.
	 */
	var curr_dekaaz = " " + $("#poem-input-1").val() + " " + $("#poem-input-2").val() + " " + $("#poem-input-3").val() + " ";
	/* Apply the split method. str is now an array, of size 5, holding ["", "world", "hello", "yen", ""] */
	var str = curr_dekaaz.replace("[^a-zA-Z0-9\\s]", "").split(/\s+/g);
	
	var num = 0;

	var dict = {};

	for(var k = 0; k<str.length; k++) {
		/* individ_word: a single word in the str array, after cutting out whitespace characters (tabs, new line characters, etc) */
		var individ_word = str[k].replace(/\s+/g, "");

		/* if individ_word is blank, then we set the corresponding sylls index to be 0, and continue with the next word.
		Note: this means the first and last index of sylls will be 0.
		*/
		if(individ_word === "") {
			num++;
			sylls[k] = 0;
			continue;
		}
		
		/* Make a GET request to the following wordnik website, which returns a syllablized version of the word.
		For example, try going to the "http://api.wordnik.com:80/v4/word.json/hello/hyphenation?useCanonical=false&limit=50&api_key=ce29061c70e7717832853064a0d05a221520eb145cb41d00e"
		website, and look at the results.
		*/
		var urlWordnik = "http://api.wordnik.com:80/v4/word.json/" + individ_word + "/hyphenation?useCanonical=false&limit=50&api_key=ce29061c70e7717832853064a0d05a221520eb145cb41d00e";
		
		$.ajax({
	        type: 'GET',
	        url: urlWordnik,
	        dataType: 'json',
	        success: function (data) {
	        	// console.log(data);
	        	/* The response from Wordnik is a json object, essentially an array with each index representing a syllable.
	        	Unfortunately, the json object does not contain the entire word (only the syllables), and ajax requests do not return
	        	results in the order the requests were sent. For example, if we ask for the syllables for "world", "hello", and "yen",
	        	Wordnik may not return the syllables for "world" followed by syllables for "hello" followed by syllables of "yen"
	        	
	        	So, we must search through str to see which word the json response for Wordnik corresponds to. We
	        	use indexOf to accomplish this. For example, if the json response is an array with "hel" and "lo", we loop
	        	through the Strings of str, and once we reach "hello", we call "hello".indexOf("hel"), which will not return -1,
	        	in which case, we set sylls[m] to be 2, where m is the index of "hello" in str, and 2 is the number of syllables of "hello"
	        	
				It is possible that Wordnik cannot produce syllables for certain words. For example, "afterlife" does not work
				for Wordnik. In this case, the sylls array will not hold a syllable count for "afterlife". We see how we handle
				this case later.
	        	*/

	        	if(data.length != 0) {
	        		var found_syll_word = 0;
		        	
		        	for(var l = 0; l<str.length; l++) {
		        		var dekaaz_word = "";
		        		for(var k = 0; k<data.length; k++) {
		        			dekaaz_word += data[k].text.toLowerCase();
		        		}
		        		if(dekaaz_word === str[l]) {
		        			found_syll_word = 1;
		        			dict[str[l].toLowerCase()] = data.length;
		        			break;
		        		}
		        	}

		        }
	        	
	        	num++;
	        	/* Eventually, num will reach 5, the size of str, in which case we have all the syllable counts.
	        	We then set the HTML of the #syll_count div to display this syllable count.

	        	Note: if for some reason, sylls array is missing a syllable count for a word (i.e. there is a null
	        		in the sylls array because Wordnik could not count the syllables for the word, like "afterlife"), 
	        		then we call our new_count helper method to count the syllables for the 
	        		word. */
	        	if(num == str.length) {
	        		console.log("Got to last word");
	        		for(var l = 0; l<str.length; l++) {

	        			if(sylls[l] == 0) {
	        				continue;
	        			}
	        			if(dict[str[l]] == null) {
	        				sylls[l] = new_count(str[l]);
	        			} else {
	        				sylls[l] = dict[str[l]];
	        			}
	        		}

	            	$("#syll_count").html('<div style="width: 100%;">The syllables for each word are: ' + 
	            		sylls.slice(1, sylls.length - 1).toString() + '</div>');
	            }
	        },
	        error: function(req, err){  alert('error: ' + err.message + ', ' + err); }
	    });
	}
	

		
	}, 1000);

});
