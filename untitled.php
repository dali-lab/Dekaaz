    <ul id="incomplete-items">
      <li id="no-incomplete-message"></li>
    </ul>

            <script id="todo-items-template" type="x/handlebars">
        <li class="list-item" style="display: none;" >
        <div style="display: inline-block; width: 47%; ">
        {line1}<br/>
        {line2}<br/>
        {line3}<br/>
        Author: <a id="{owner_id}" class="user">{owner}</a><br/>

        <!--facebook likes-->
        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
        </div>
        {audio}
        <br/><a href="dekaazpage.php?dekaaz_id={id}">GO TO PAGE</a></div>

        

        <!--Dekaaz pics-->
        <div style="display: inline-block; width: 47%; vertical-align: top; float: right;">
        

        <canvas id="mysketch-{id}" data-processing-sources="form.pde" style="max-height: 100px; max-width 100px; float: right;" file="{file}"></canvas>
        

        </div>
        </li>
      </script>
      <script id="todo-items-template-no-account" type="x/handlebars">
        <li class="list-item" style="display: none;" >
        <div style="display: inline-block; width: 47%; ">
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
      });
    </script>