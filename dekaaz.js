YUI().use('node', function(Y) {
	
	var Dekaaz, 
	query,
	accountInfo = Y.one('body'),

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
});