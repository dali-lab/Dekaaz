<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'/>
        <title>Example : a popup contact form using jQuery and ColorBox plugin </title>

        <link rel="stylesheet" href="http://www.formmail-maker.com/var/demo/jquery-popup-form/colorbox.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://www.formmail-maker.com/var/demo/jquery-popup-form/jquery.colorbox-min.js"></script>

        
                
    </head>
    
    <body>
    <a  class='iframe' href="http://www.formmail-maker.com/var/demo/jquery-popup-form/form.php">Contact Us</a>
<script>
            $(document).ready(function(){
                $(".iframe").colorbox({iframe:true, fastIframe:false, width:"450px", height:"480px", transition:"fade", scrolling   : false});
            });
        </script>

    </body>
</html>