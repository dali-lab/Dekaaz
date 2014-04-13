<?php include 'account/account_common_header.php'; ?>

<script>

YUI().use('node', function(Y) {
          $('.microposts').empty();
          var q = new Parse.Query("User");
          q.get(getCookie("user_account"), {
            success: function(curr_user) {
              var account_info = Y.one('#current_user_info');
              var left_side_content = Y.Lang.sub(Y.one('#user-info').getHTML(), {
                name: curr_user.getUsername()
              });

              account_info.prepend(left_side_content);
              var q_posts = curr_user.relation("Post").query();
              q_posts.find({
                success: function(results) {
                  console.log(results);
                  Y.Array.each(results, function(val, i, arr) {


                    var content = Y.Lang.sub(Y.one('#todo-items-template').getHTML(), {
                      line1: val.get('line1'),
                      line2: val.get('line2'),
                      line3: val.get('line3'),
                      createdAt: val.createdAt,
                      id: val.id,
                    });
                    $('.microposts').prepend(content);

                  });
                  
                    if(results.length == 0) {
                      $('.microposts').prepend('User has never made a Dekaaz');
                    }
                  // results is an array of Parse.Object.
                },

                error: function(error) {
                  // error is an instance of Parse.Error.
                }
              });
              // The object was retrieved successfully.
            },
            error: function(object, error) {
              // The object was not retrieved successfully.
              // error is a Parse.Error with an error code and description.
            }
          });
// });

  // YUI().use('node', function(Y) {
      var q = new Parse.Query("User");
      q.get(getCookie("user_account"), {
        success: function(curr_user) {
          if(Parse.User.current() == null) {
            window.location.href = "signup.html";
          } else {

          // var curr_username = Parse.User.current().getUsername();
          //   Parse.User.current().relation("Followed").add(curr_user);


          // Parse.User.current().save();
          // Parse.User.current().setUsername(curr_username);

            var q_following = Parse.User.current().relation("Followed").query();
            q_following.include('objectId');
            q_following.equalTo('objectId', curr_user.id);
            q_following.find({
              success: function(results) {
                if(results.length > 0) {
                  var content = Y.Lang.sub(Y.one('#unfollowing_button').getHTML());
                  // console.log(content);
                  $('#follow_form').prepend(content);
                  attachUnfollowButtonEvent();
                } else {
                  var content = Y.Lang.sub(Y.one('#following_button').getHTML());
                  // console.log(content);
                  $('#follow_form').prepend(content);
                  attachFollowButtonEvent();
                }
              }
            });
          }
        }
      });
  
<?php include 'account/account_common_footer.php'; ?>