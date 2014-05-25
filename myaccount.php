<?php include 'header.php'; ?>
<script>
var user_acc = "<?php
  echo $_GET['user_account'];
?>";
// console.log("Name is " + name);
</script>

<div class="container">
  <div class="row">
    <aside class="span4">
      <section id="current_user_info">
        <?php include_once("user_info.html"); ?>
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
            
<script>
    function getCookie()
    {
      // var name = cname + "=";
      // var ca = document.cookie.split(';');
      // for(var i=0; i<ca.length; i++) 
      //   {
      //   var c = ca[i].trim();
      //   if (c.indexOf(name)==0) return c.substring(name.length,c.length);
      //   }
      // return "";
      return user_acc;
    }
    
  </script>

<script>

YUI().use('node', function(Y) {
          $('.microposts').empty();
          var q = new Parse.Query("User");
          var curr_user = Parse.User.current();
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

                  $(".btnEdit").on("click", function() {
                      var poemid = $( this ).attr( "id" );
                     $.colorbox({width:"85%", height:"85%", iframe:true, href:"updatedekaaz.php?id=" + poemid, 
                        onClosed: function() {
                            
                            var Dekaaz = Parse.Object.extend("Dekaaz");
                            var query = new Parse.Query(Dekaaz);
                            query.get(poemid, {
                              success: function(object) {
                                
                                $("#" + poemid + " .content").empty();
                                $("#" + poemid + " .content").html(
                                  object.get("line1") + "<br/>" +
                                  object.get("line2") + "<br/>" +
                                  object.get("line3") + "<br/>"
                                );

                              },

                              error: function(object, error) {
                                // error is an instance of Parse.Error.
                              }
                            });

                            //do other stuff
                        } 
                     });
                     
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
            
// });

  // YUI().use('node', function(Y) {
      var q = new Parse.Query("User");
      q.get(getCookie(), {
        success: function(curr_user) {
          if(Parse.User.current() == null) {
            window.location.href = "signup.html";
          } else {

          // var curr_username = Parse.User.current().getUsername();
          //   Parse.User.current().relation("Followed").add(curr_user);


          // Parse.User.current().save();
          // Parse.User.current().setUsername(curr_username);

          }
        }
      });
  // });

  // YUI().use('node', function(Y) {
  
<?php include 'account/account_common_footer.php'; ?>