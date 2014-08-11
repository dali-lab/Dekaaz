<?php include 'header.php'; ?>

<script type="text/javascript" src="utils.js"></script>

<script>
var user_acc = "<?php
  echo $_GET['user_account'];
?>";
</script>

<div class="container">
  <div class="row">
    <aside class="span4">
      <section id="current_user_info">
        <?php $user = "me"; ?>
        <?php include_once("user_info.php"); ?>
      </section>
      
    </aside>
    <div class="span8">

        <script id="unfollowing_button" type="x/handlebars">
        <form accept-charset="UTF-8" class="edit_relationship">
          <input class="btn btn-large" name="commit" id="unfollow" type="submit" value="Unfollow">
        </form>
        </script>
        <script id="following_button" type="x/handlebars">
        <form accept-charset="UTF-8" class="edit_relationship">
          <input class="btn btn-large" name="commit" id="follow" type="submit" value="Follow">
        </form>
        </script>

      <div id="follow_form">


            <script>
              function attachUnfollowButtonEvent() {
                
                $("#unfollow").click(function() {
                  var q = new Parse.Query("User");
                  q.get(getCookie(), {
                    success: function(curr_user) {

                      var curr_username = Parse.User.current().getUsername();
            
                      Parse.User.current().relation("Followed").remove(curr_user);

                      Parse.User.current().save();

                      Parse.User.current().setUsername(curr_username);
YUI().use('node', function(Y) {
                      var follow_html = Y.Lang.sub(Y.one('#following_button').getHTML());

                      $('#follow_form').html(follow_html);
                      attachFollowButtonEvent();
                    });

                    }
                  });


                  return false;
                });

              }

              function attachFollowButtonEvent() {
                
                $("#follow").click(function() {
                  var q = new Parse.Query("User");
                  q.get(getCookie(), {
                    success: function(curr_user) {
                      var curr_username = Parse.User.current().getUsername();
            
                      Parse.User.current().relation("Followed").add(curr_user);

                      Parse.User.current().save();

                      Parse.User.current().setUsername(curr_username);
YUI().use('node', function(Y) {
                      var unfollow_html = Y.Lang.sub(Y.one('#unfollowing_button').getHTML());

                      $('#follow_form').html(unfollow_html);
                      attachUnfollowButtonEvent();
                    });
                    }
                  });


                  return false;
                });

              }
            </script>

      </div>
      <h3>My Dekaaz</h3>
        <ol class="microposts" style="padding: 0px !important;">

        </ol>
    </div>
  </div>
  </div>

            <script id="todo-items-template" type="x/handlebars">
              <li id="{id}">
                  <span class="content">{line1}<br/>{line2}<br/>{line3}<br/></span>
                  <span class="timestamp">
                    Posted at: {createdAt}
                  </span>
                  <br/>
                  <input style="text-align: left !important; height: 40px; " class="btnEdit" type="button" id="{id}" value="Edit" >
                
              </li>
            </script>

            <script id="update-template" type="x/handlebars">
                  <span class="content">{line1}<br/>{line2}<br/>{line3}<br/></span>
                  <span class="timestamp">
                    Posted at: {createdAt}
                  </span>
                  <br/>
                  <input style="text-align: left !important; height: 40px; " class="btnEdit" type="button" id="{id}" value="Edit" >
            </script>
            

<script>
//retrieve all the Dekaaz's composed by the currently logged-in user.
YUI().use('node', function(Y) {

    //if there is no currently logged-in user, redirect to signup.html
      var q = new Parse.Query("User");
      q.get(getCookie(), {
        success: function(curr_user) {
          if(Parse.User.current() == null) {
            window.location.href = "signup.html";
          } 
        }
      });


          $('.microposts').empty();
          //retrieve all Dekaaz's composed by the current user from the database
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

//create an edit button for each Dekaaz
                  doBtnEdit(Y);  

                  if(results.length == 0) {
                      $('.microposts').prepend('User has never made a Dekaaz');
                    }
                },

                error: function(error) {
                }
              });
      

<?php include 'account/account_common_footer.php'; ?>