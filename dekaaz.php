<?php include_once("header.php"); ?>
<h1><img src="images/dekaaz.png" style="padding-top: 10px; height: auto; max-width: 400px;"/></h1>
  <div id="main" style="background-color: #F5F5F5; margin-bottom: 20px;">
       <!--<ul id="incomplete-items">
      <li id="no-incomplete-message"></li>
    </ul> -->

    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="closeModal">I want to compose!</button>
        <h1 class="modal-title" id="myModalLabel">Dekaaz Explorer</h1>
      </div>
      <div class="modal-body">
            <ul id="incomplete-items">
      <li id="no-incomplete-message"></li>
    </ul>
      </div>
    </div>
  </div>
</div>

    <script id="todo-items-template" type="x/handlebars">
        <li class="list-item" style="display: none;" >
         <!--change the font of Dekaaz here-->
        <div style="display: inline-block; width: 47%; font-weight: bold; font-family: Arial, Tahoma;font-size: 16px; font-style: italic; font-variant: small-caps;">
        {line1}<br/>
        {line2}<br/>
        {line3}<br/><br/>
        Author: <a id="{owner_id}" class="user">{owner}</a><br/><br/>

        <!--facebook likes-->
        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
        </div>
        {audio}
        <br/><a href="dekaazpage.php?dekaaz_id={id}">GO TO PAGE</a></div>

        

        <!--Dekaaz pics-->
        <div style="display: inline-block; width: 47%; ertical-align: top; float: right;">
        

        <canvas id="mysketch-{id}" data-processing-sources="form.pde" style="max-height: 1500px; max-width 500px; float: right; width: 600px; margin-right:-420px; margin-top:-20px " file="{file}"></canvas>
        

        </div>
        </li>
      </script>
      <script id="todo-items-template-no-account" type="x/handlebars">
        <li class="list-item" style="display: none;" >
        <div style="display: inline-block; width: 47%;" class="line-text">
        {line1}<br/>{line2}<br/>{line3}<br/>Author: {owner}<br/>
        {audio}
        
      <br/><a href="dekaazpage.php?dekaaz_id={id}">GO TO PAGE</a></div>

        
        </div>
        <div style="display: inline-block; width: 47%; vertical-align: top; float: right;">
        <canvas id="mysketch-{id}" data-processing-sources="form.pde" style="max-height: 100px; max-width 100px; float: right;" file="{file}"></canvas>

        </div>
        </li>
      </script>

      <script>
      $(document).ready(function() {
        $('.list-item').click(function() {
          alert("this.attr('id')");
        });

        $('#myModal').modal('show');

        $('#closeModal').click(function(){
          window.location.href="index.php";
        });
      });
    </script>

  </div>

    <script type="text/javascript" src="utils.js"></script>
    <script type="text/javascript" src="dekaaz.js"></script>
</body>
</html>

