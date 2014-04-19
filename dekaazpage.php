<?php include_once("header.php"); ?>

<ul id="single-item">
	<li id="no-item-message"></li>
</ul>

<script id="todo-items-template" type="x/handlebars">
<li class="list-item" id="{id}">


<div style="display: inline-block; width: 47%; ">
{line1}<br/>{line2}<br/>{line3}<br/>Author: <a id="{owner_id}" class="user">{owner}</a><br/>
<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
<audio controls><source src="{audio}" type="audio/mpeg">Your browser does not support this audio format.</audio>
<br/></div>
<div style="display: inline-block; width: 47%; vertical-align: top; float: right;">
<img src="images/form.png" style="max-height: 100px; max-width: 100px; float: right;"/>

</div>

</li>
</script>
<script id="todo-items-template-no-account" type="x/handlebars">
<li class="list-item" id="{id}">

<div style="display: inline-block; width: 47%; ">
{id} {line1}<br/>{line2}<br/>{line3}<br/>Author: {owner}<br/><audio controls><source src="{audio}" type="audio/mpeg">Your browser does not support this audio format.</audio>
</div>
<div style="display: inline-block; width: 47%; vertical-align: top; float: right;">
<img src="images/form.png" style="max-height: 100px; max-width: 100px; float: right;"/>

</div>

</li>
</script>

<div class="fb-like" data-href="http://localhost:8888/dekaaz/dekaazpage.php?dekaaz_id=<?php
	echo $_GET['dekaaz_id'];
?>" data-width="450" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>


<script>

	YUI().use('node', function(Y) {
	
	var Dekaaz, 
	query,
	noTasksMessage = Y.one('#no-item-message'),
	submitBtn = Y.one("#poem-submit"),
	incompleteItemList = Y.one('#single-item'),
	accountInfo = Y.one('body');

	function populate(val, owner_param, owner_id_param) {
		incompleteItemList.empty();
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
		$('#single-item:first>li img').attr('src', 'images/Logo.png');
	}

<?php 
	if (isset($_GET['dekaaz_id'])) {
        echo 'var dekaaz_id="' . $_GET['dekaaz_id'] . '";';
    }
?>
mDekaaz = Parse.Object.extend("Dekaaz");
var mQuery = new Parse.Query(mDekaaz);
mQuery.get(dekaaz_id, {
  success: function(object) {
    // console.log(object.get('line1'));

	var author = object.get('parent');
	// console.log(author.getUsername() + " ; " + author.id);
	if(author != null) {
		author.fetch({
		  success: function(author) {
		    var author_name = author.getUsername();
		  	populate(object, author.getUsername(), author.id);
		  	
		  }
		});
	} else {
		populate(object, "Unknown", null);
	}

  },

  error: function(object, error) {
    // error is an instance of Parse.Error.
  }
});

});
</script>
<?php include_once("footer.php"); ?>