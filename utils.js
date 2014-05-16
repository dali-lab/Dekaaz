Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");

var soundFile;

 function croakCallbackFunction(croak_id,croakmp3source,callbackCode)
 {
    if(callbackCode==1){
           var str = '<audio src="' + croakmp3source + '" controls="controls"></audio>';
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

// delete poem
function deletePoem(id) {
	console.log("id is " + id);
	var Dekaaz = Parse.Object.extend("Dekaaz");
	var query = new Parse.Query(Dekaaz);
	query.get(id, {
		success: function(DekaazRow) {
			// The object was retrieved successfully.
			DekaazRow.destroy({});
			document.location.reload();
		},
		error: function(object, error) {

		}
	});

	return false;
	// var object = query.find(id);
}