Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");



YUI().use('node', function(Y) {
	
	function populate(val, owner_param, owner_id_param) {

		if(owner_id_param == null) {
			var content = Y.Lang.sub(Y.one('#todo-items-template-no-account').getHTML(), {
				line1: val.get('line1'),
				line2: val.get('line2'),
				line3: val.get('line3'),
				owner: owner_param,
				createdAt: val.get('createdAt'),
				audio: val.get('Sound'),
				id: val.id,
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
				audio: val.get('Sound'),
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

	function attachUserLinks() {
		$(".user").click(function() {
			setCookie("user_account", $(this).attr('id'), 1);
			window.location.href = "account.php";
		});
	}

	
	var Dekaaz, 
	query,
	accountInfo = Y.one('body'),
	noTasksMessage = Y.one('#no-incomplete-message'),
	incompleteItemList = Y.one('#incomplete-items'),
	accountInfo = Y.one('body');

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
								// paginateDekaazs(results.length);
							}
						  }
						});
					} else {
						populate(val, "Unknown", null);
						attachUserLinks();
						if(i == results.length - 1) {
							// paginateDekaazs(results.length);
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

