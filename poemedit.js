var mDekaaz = Parse.Object.extend("Dekaaz");
var mQuery = new Parse.Query(mDekaaz);
mQuery.get(poemid, {
  success: function(object) {
    
    $('#poem-input-1').val(object.get("line1"));
    $('#poem-input-2').val(object.get("line2"));
    $('#poem-input-3').val(object.get("line3"));

  },

  error: function(object, error) {
    // error is an instance of Parse.Error.
  }
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
$('#poem-submit').on('click', function(e) {

var Dekaaz = Parse.Object.extend("Dekaaz");
var query = new Parse.Query(Dekaaz);
query.get(poemid, {
  success: function(object) {
    
  	object.set("line1", $('#poem-input-1').val());
  	object.set("line2", $('#poem-input-2').val());
  	object.set("line3", $('#poem-input-3').val());
  	// alert($('#poem-input-1').val());
  	var decomposed_array = decompose(sylls.slice(1, sylls.length - 1));
    if(decomposed_array == null) {
      return;
    }

    // alert(decomposed_array);

  	object.set("syllarray", decomposed_array);
    object.set("Sound", soundFile);
    // alert(object.get("line1"));
    object.save();
    alert("Thank you for submitting a Dekaaz!");
  },

  error: function(object, error) {
    // error is an instance of Parse.Error.
  }
});




});
