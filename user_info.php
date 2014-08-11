  <script type="text/javascript" src="parse.js"></script>

<?php if($user == "me") { ?>
<script type="text/javascript">

Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");


          var curr_user = Parse.User.current();
          var name = curr_user.getUsername();
          $("#name").append(name);


</script>
<?php } else { ?>
<script type="text/javascript">

var curr_user;
var name;

Parse.initialize("m5nklTTbXDmvXRxCiOMIt9SB6U0Iz2uKZ9AeGnXq", "8brbnvrjnVZiIsOk8jzS98f3yVLTtza17J2zqGBx");

YUI().use('node', function(Y) {
          
          var q = new Parse.Query("User");
          q.get(getCookie(), {
            success: function(dekaaz_user) {
              
              curr_user = dekaaz_user;
              name = dekaaz_user.getUsername();
$("#name").append(name);
            },
            error: function(object, error) {
            }
          });
});
</script>
<?php } ?>



<span>
<a href="/users/1"><img alt="Example User" class="gravatar" src="https://secure.gravatar.com/avatar/bebfcf57d6d8277d806a9ef3385c078d?s=52"></a>
<h1 id="name">
  
</h1>
</span>
<span>
# microposts
</span>
<br/>



<?php if($user == "me") { ?>

<input type="button" id="FacebookLink" />
<br/>
	<script>

		if(Parse.FacebookUtils.isLinked(Parse.User.current())) {
			$("#FacebookLink").attr("value", "Unlink from Facebook");
		} else {
			$("#FacebookLink").attr("value", "Link To Facebook Account");
		}
	</script>
<?php } ?>
	<!-- The feed that contains all the parse JS stuff, keys, etc-->
	<script type="text/javascript" src="account/account.js">
	</script>
