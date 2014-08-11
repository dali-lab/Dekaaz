var _ = require("underscore");
Parse.Cloud.beforeSave("Dekaaz", function(request, response) {
    var post = request.object;
 
    var toLowerCase = function(w) { return w.toLowerCase(); };
 
    var str = post.get("line1");
    str += " " + post.get("line2");
    str += " " + post.get("line3");

    var words = str.split(/\b/);
    words = _.map(words, toLowerCase);
    var stopWords = ["the", "in", "and"]
    words = _.filter(words, function(w) { return w.match(/^\w+$/) && ! _.contains(stopWords, w); });
 
    // var hashtags = post.get("text").match(/#.+?\b/g);
    // hashtags = _.map(hashtags, toLowerCase);
 
    post.set("words", words);
    // post.set("hashtags", hashtags);
    response.success();
});

Parse.Cloud.define("averageStars", function(request, response) {
    
    var toLowerCase = function(w) { return w.toLowerCase(); };
    
    var words = request.params.query.split(/\b/);
    words = _.map(words, toLowerCase);
    var stopWords = ["the", "in", "and"]
    words = _.filter(words, function(w) { return w.match(/^\w+$/) && ! _.contains(stopWords, w); });
 
    response.success(words);
});

Parse.Cloud.define("associate", function(request, response) {


    var Dekaaz = Parse.Object.extend("Dekaaz");
    var query = new Parse.Query(Dekaaz);
    query.find({
              success: function(results) {
                results.forEach(function(entry) {
                    var query2 = new Parse.Query(Parse.User);
                    query2 = query2.get("5eHlOZyZIv");
                    query2.relation("Post").add(entry);
                    query2.save();
                });
              },
              error: function(error) {
                alert("Error when retrieving: " + error.code + " " + error.message);
              }
            });
    response.success();

});

Parse.Cloud.define("syllabize", function(request, response) {

    var Dekaaz = Parse.Object.extend("Dekaaz");
    var query = new Parse.Query(Dekaaz);
    query.find({
        success: function(results) {
            results.forEach(function(entry) {
                var array = [1, 1];
                var array2 = [1, 2];
                var array3 = [1, 1, 1, 4];
                entry.set("line1syll", array);
                entry.set("line2syll", array2);
                entry.set("line3syll", array3);
                entry.save();
            });
        },
        error: function(error) {
            alert("Error when retrieving: " + error.code + " " + error.message);
        }
    });
    response.success();
});

