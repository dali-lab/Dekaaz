Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");

var soundFile;

 function croakCallbackFunction(croak_id,croakmp3source,callbackCode)
 {
    if(callbackCode==1){
           var str = '<audio src="' + croakmp3source + '" controls="controls"></audio>';
           soundFile = croakmp3source;
		   $('#audio_div').html(str);
    }
 }

//creates a popup when the edit button on the homepage is clicked,
//allowing the user to edit his Dekaaz
function doBtnEdit(Y) {

	$(".btnEdit").on("click", function() {
		alert("Called");
                      var poemid = $( this ).attr( "id" );
                     $.colorbox({width:"85%", height:"85%", iframe:true, href:"updatedekaaz.php?id=" + poemid, 
                        onClosed: function() {
                            
                            var Dekaaz = Parse.Object.extend("Dekaaz");
                            var query = new Parse.Query(Dekaaz);
                            query.get(poemid, {
                              success: function(object) {
                                


                                var content = Y.Lang.sub(Y.one('#update-template').getHTML(), {
                                  line1: object.get('line1'),
                                  line2: object.get('line2'),
                                  line3: object.get('line3'),
                                  createdAt: object.createdAt,
                                  id: object.id,
                                });

                                $("#" + poemid).empty();
                                $("#" + poemid ).html(content);

                              },

                              error: function(object, error) {
                                // error is an instance of Parse.Error.
                              }
                            });

                            //do other stuff
                        } 
                     });
                     
                  });   
}

function logoutFunc() {
	$("#logout-button").attr("disabled", "disabled");

	Parse.User.logOut();
	window.location.href = "signup.html";
}

function getRealUsername(user) {

	return user.getUsername();
}

//for each Dekaaz poem, there is an author link, which redirects to the author's profile page
function attachUserLinks() {
	$(".user").click(function() {
		var bool = Parse.User.current().id != $(this).attr('id');
		if(Parse.User.current() == null || Parse.User.current().id.valueOf() != $(this).attr('id').valueOf()) {
			window.location.href = "account.php?user_account=" + $(this).attr('id');
		} else {
			window.location.href = "myaccount.php";
		}

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
			DekaazRow.destroy({
				success:function(ob) { document.location.reload(); }, 
				error:function(ob, err) { alert("You may not delete this Dekaaz"); }
			});
			
		},
		error: function(object, error) {
			alert("You may not delete this Dekaaz");
		}
	});

	return false;
}