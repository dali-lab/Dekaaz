Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");

var soundFile;

 function croakCallbackFunction(croak_id,croakmp3source,callbackCode)
 {
    if(callbackCode==1){
           // alert('talk_id '+croak_id);
           var str = '<audio controls><source src="' + croakmp3source + '" type="audio/mpeg">Your browser does not support this audio format.</audio>';
           // alert("HI");
           soundFile = croakmp3source;
		   $('#audio').html(str);
           // alert("HEY??");
        //    var audio = $("audio");
        //    audio[0].pause();
    	   // audio[0].load();
        //    // $('audio').show();
        //    audio[0].play();
        //    alert("HERE");
           // alert('talkmp3source '+croakmp3source);
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
	// alert(maxnum);
	var num = parseInt($('.active:last').attr('id'));
	// alert(maxnum);
	// alert(num);
	// alert(num+1 <= maxnum);
	// alert(num+1);
	// alert(maxnum);
	if(num+1 <= maxnum) {
		// alert(maxnum);
		// alert(num+1);
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
		// alert(currentUser);
		if (currentUser) {
			var username;
			// alert("first");
			// alert(Parse.FacebookUtils.isLinked(currentUser));
			if(Parse.FacebookUtils.isLinked(currentUser)) {
			// alert(currentUser.get("authData"));
			// alert(currentUser.get("authData").facebook);
			
			// if(currentUser.get("authData") !== undefined 
			// 	&& currentUser.get("authData").facebook !== undefined) {
				// alert("1");
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

		if(owner_id_param == null) {
			var content = Y.Lang.sub(Y.one('#todo-items-template-no-account').getHTML(), {
				line1: val.get('line1'),
				line2: val.get('line2'),
				line3: val.get('line3'),
				owner: owner_param,
				createdAt: val.get('createdAt'),
			});
			incompleteItemList.prepend(content);
		} else {
			var content = Y.Lang.sub(Y.one('#todo-items-template').getHTML(), {
				line1: val.get('line1'),
				line2: val.get('line2'),
				line3: val.get('line3'),
				owner: owner_param,
				owner_id: owner_id_param,
				createdAt: val.get('createdAt'),
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
		$('#incomplete-items:first>li img').attr('src', 'images/Logo.png');
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

		var current_index = 0;

		var solution = new Array();
		solution[0] = new Array();
		solution[1] = new Array();
		solution[2] = new Array();

		// var indexOne = -1;
		// var indexTwo = -1;
		// var indexThree = -1;

		// var counter = 2;

		for (var i=0;i<syll_arr.length;i++)
		{ 
			structure[current_index] -= syll_arr[i];
			solution[current_index][solution[current_index].length] = syll_arr[i];
			if(structure[current_index] == 0) {
				current_index++;
			}
		}
		console.log(solution);
		return solution;
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
		
		
		/*
		//Old code from the NetTuts Parse todo tutorial	
		var text = Y.one('#list-input').get('value');
		var ListItem = Parse.Object.extend("ListItem");
		var listItem = new ListItem();
		
		listItem.set("content", text);
		listItem.set("isComplete", false);
		*/

		//Set the 
		dekaazPoem.set("line1", textLine1);
		dekaazPoem.set("line2", textLine2);
		dekaazPoem.set("line3", textLine3);
		var decomposed_array = decompose(sylls.slice(1, sylls.length - 1));
		dekaazPoem.set("line1syll", decomposed_array[0]);
		dekaazPoem.set("line2syll", decomposed_array[1]);
		dekaazPoem.set("line3syll", decomposed_array[2]);
		dekaazPoem.set("Sound", soundFile);
		// console.log(decomposed_array[0]);
		// console.log(decomposed_array[1]);
		// console.log(decomposed_array[2]);

		if(Parse.User.current() != null) {
			dekaazPoem.set("parent", Parse.User.current());
		}
		
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




				// var content = Y.Lang.sub(Y.one('#todo-items-template').getHTML(), {
				// 	// content: val.get('content'),

				// 	line1: val.get('line1'),
				// 	line2: val.get('line2'),
				// 	line3: val.get('line3'),
				// 	createdAt: val.get('createdAt'),
				// 	// author: val.get('author'),

				// 	id: val.id,
				// });
				// incompleteItemList.prepend(content);
			});
			
			//When the checkbox is clicked for any of the items in the incomplete list, update it as complete.
			// incompleteItemList.delegate('click', function (e) {
			// 	var self = this;
			// 	query = new Parse.Query(ListItem);
			// 	query.get(self.one('input').get('id'), {
			// 	  success: function(item) {
			// 	    item.set('isComplete', true);
			// 			item.save();
			// 			self.remove();

			// 			if (incompleteItemList.all('li').size() >= 1) {
			// 				noTasksMessage.removeClass('hidden');
			// 			}
						
			// 	  },
			// 	  error: function(object, error) {
			// 			alert("Error when updating todo item: " + error.code + " " + error.message);
			// 	  }
			// 	});
			// }, 'li');
	  },
	  error: function(error) {
	    alert("Error when retrieving Todos: " + error.code + " " + error.message);
	  }
	});
	
});

//I used http://stackoverflow.com/questions/15560920/ajax-text-input-value-from-php-function as a reference



// var obj = {"name": "value"}
// var jsonstr = JSON.stringify(obj);
// alert(jsonstr);
// $(".lines").keyup(function() {

//   	$.ajax({
//         type: 'POST',
//         url: "syllables.php",
//         data: {input1 : $("#poem-input-1").val(), input2 : $("#poem-input-2").val(), input3 : $("#poem-input-3").val()},
//         dataType: 'HTML',
//         success: function (data) {
//             $("#syll_count").html(data);
            
//         },
//         error: function(req, err){ console.log('my message' + err); }
//     });

// });

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
	// console.log("Array of words: ");
	// console.log(str);
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
		//alert(urlWordnik);
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

		        		// console.log("dekaaz word");
		        		// console.log(dekaaz_word);
		        		// console.log("data");
		        		// console.log(data);
		        		if(dekaaz_word === str[l]) {
		        			// console.log("HEEE");
		        			found_syll_word = 1;
		        			dict[str[l].toLowerCase()] = data.length;
		        			break;
		        		}
		        	}

		        }

	        	// console.log(dict);
	        	// 	if(str[l].toLowerCase().indexOf(data[0].text.toLowerCase()) != -1) {
	        	// 		sylls[m] = data.length;
	        	// 	}
	        	// }

	        	// if(data.length != 0) {

		        // 	for(var m = 0; m<str.length; m++) {

		        // 		/* something is wrong here; str[m] is nothing sometimes... */
		        // 		// console.log("syllables");
		        // 		// console.log(str[m].toLowerCase().indexOf(data[0].text.toLowerCase()));
		        // 		// console.log(str[m].toLowerCase());
		        // 		// console.log(data[0].text.toLowerCase());
		        // 		if(str[m].toLowerCase().indexOf(data[0].text.toLowerCase()) != -1) {
		        // 			sylls[m] = data.length;
		        // 		}
		        // 	}
	        	// }
	        	
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
	            	// alert(sylls.toString());
	            }
	            
	            // alert(sylls[k]);
	        },
	        error: function(req, err){  alert('error: ' + err.message + ', ' + err); }
	    });
		// console.log(eh);
	}
	
	// $("#syll_count").html('<div style="width: 100%;">The syllables for each word are: ' + syll_str + '</div>');
	// syll_str = "";

	// 	// $.each( str.split(/\s+/), function( value ) {
	// 	//   numSyll += new_count(value);
	// 	// });

	// 	// alert(numSyll);

		
	}, 1000);

});

// $(document).ready(function() {
// 	// alert("checkpoint 0");
// 	setInterval(function() {
// 		// var syll_str = "";
// 	var sylls = new Array();
// 	// 	// var str = $("#poem-input-1").val();
// 	// 	// str += " " + $("#poem-input-2").val();
// 	// 	// str += " " + $("#poem-input-3").val();
// 	// 	// var numSyll = "";
		
// 	// 	// var array = str.split(/\s+/);
		
		
// 	// 	// for(var i=0;i<array.length;i++){
// 	//  //        numSyll += new_count(array[i]);
// 	//  //    }

// 	//  //    $("#syll_count").html('<div style="width: 100%;">The syllables for each word are: ' + numSyll + '</div>');

// 	var curr_dekaaz = " " + $("#poem-input-1").val() + " " + $("#poem-input-2").val() + " " + $("#poem-input-3").val() + " ";
// 	var str = curr_dekaaz.replace("[^a-zA-Z0-9\\s]", "").split(/\s+/g);
// 	// alert(typeof(str));
// 	// alert('checkpoint 1');
// 	var num = 0;
// 	console.log("size of array is: " + str.length);
// 	for(var k = 0; k<str.length; k++) {
// 		var individ_word = str[k].replace(/\s+/g, "");

// 		if(individ_word === "") {
// 			//alert("NO BUENO");
// 			console.log("Blank word at index: " + k + " and num is " + num);
// 			num++;

// 			sylls[k] = 0;
// 			// if(num == str.length) {
// 			// 	alert("HOOO");
// 	            // 	for(var l = 0; l<str.length; l++) {
// 	            // 		if(sylls[l] == null) {
// 	            // 			sylls[l] = new_count(str[m]);
// 	            // 		}
// 	            // 	}
// 	            // 	$("#syll_count").html('<div style="width: 100%;">The syllables for each word are: ' + sylls.toString() + '</div>');
// 	            // 	// alert(sylls.toString());
// 	            // }
// 			continue;
// 		}
// 		// alert('checkpoint 2');
		
// 		var urlWordnik = "http://api.wordnik.com:80/v4/word.json/" + individ_word + "/hyphenation?useCanonical=false&limit=50&api_key=ce29061c70e7717832853064a0d05a221520eb145cb41d00e";
// 		//alert(urlWordnik);
// 		 $.ajax({
// 	        type: 'GET',
// 	        url: urlWordnik,
// 	        dataType: 'json',
// 	        success: function (data) {
	        	
// 	        	if(data.length != 0) {

// 	        	for(var m = 0; m<str.length; m++) {
// 	        		// alert(data[0].text.replace("[^a-zA-Z0-9\\s]", ""));
// 	        		if(str[m].toLowerCase().indexOf(data[0].text) != -1) {
// 	        			sylls[m] = data.length;
// 	        			// alert(sylls.toString());
// 	        		}
// 	        	}
// 	        	}
	        	
// 	        	num++;
// 	        	console.log("Wordnik worked: " + k + " and num is " + num);
// 	        	// alert("Got here");
// 	        	// sylls[k] = data.length;
// 	            // syll_str += data.length;
// 	            if(num == str.length) {
// 	            	for(var l = 0; l<str.length; l++) {
// 	            		if(sylls[l] == null) {
// 	            			sylls[l] = new_count(str[l]);
// 	            			// alert("THIS HAPPENS");
// 	            		}
// 	            	}
// 	            	$("#syll_count").html('<div style="width: 100%;">The syllables for each word are: ' + 
// 	            		sylls.slice(1, sylls.length - 1).toString() + '</div>');
// 	            	// alert(sylls.toString());
// 	            }
	            
// 	            // alert(sylls[k]);
// 	        },
// 	        error: function(req, err){  alert('error: ' + err.message + ', ' + err); }
// 	    });

// 	}
	
// 	// $("#syll_count").html('<div style="width: 100%;">The syllables for each word are: ' + syll_str + '</div>');
// 	// syll_str = "";

// 	// 	// $.each( str.split(/\s+/), function( value ) {
// 	// 	//   numSyll += new_count(value);
// 	// 	// });

// 	// 	// alert(numSyll);

		
// 	}, 1000);

// });




// var lastRequest;
// $(".lines").keyup(function() {
// 	if(lastRequest) {
//         lastRequest.abort();
//         lastRequest = null;
//     }
//     lastRequest = $.ajax({
//         type: 'POST',
//         url: "syllables.php",
//         data: {input1 : $("#poem-input-1").val(), input2 : $("#poem-input-2").val(), input3 : $("#poem-input-3").val()},
//         dataType: 'HTML',
//         success: function (data) {
//             $("#syll_count").html(data);
            
//         },
//         error: function(req, err){ console.log('my message' + err); }
//     });
    
// });



// $.ajax({
//     url: "/Users/barrychen/Desktop/something/dekaaz/syllables.php",
//     type: "POST",
//         data: {message : "hello"},
//     	dataType: "JSON",
//     	success: function(data) {
//         	alert(data.phone);
        	
//     	},
//     	error: function(xml, error) {
// 		    console.log(error);
// 		}
// });

// $( document ).ready(function() {
// // alert("HO");
// 	$.ajax({
//         url: "syllables.php",
//         type: "POST",
//         data: {message : "hello"},
//     	dataType: 'json',
//         success: function(syll_data) {
//         	alert(syll_data.name);
        	
//     	}
//     });
//   // Handler for .ready() called.
// });
