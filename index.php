
<!--     Session based url rewrite module for module based website
    Copyright 2013-2014 by Kerekes Zoltan
    Demo included 

    Released under the MIT license
    http://www.dyn-web.com/business/license.txt -->

 <html>
 <head>
      <meta charset="utf-8">
     <title>Session based url rewrite</title>
 </head>
 <body>
    <?php 
        session_start();
    $included = '';   //reset  module name
        $included = $_SESSION['url']['included']; //get  module name
        if (!$included) {
            $included = "welcome";  //if not get, set  module name to default
    } ?>

<a href="#" onClick="set_module('welcome', 'edit', '8')">Home</a>
<a href="#" onClick="set_module('news', 'delete', '11')">News</a>
<a href="#" onClick="set_module('about_us', '', '')">About us</a>

<br><br>

    <?php  include( "inc/main_".$included.".php");  ?>
    <?php 
        echo "<pre>";
         print_r($_SESSION['url']);
         echo "</pre>"; 
    ?>
 </body>
 </html>
 <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
 <script type="text/javascript">
   
   function set_module(included, action, id)
    {
         console.log( "it's working" );
        $.ajax({
            url: 'redir.php',
            type: 'POST',
            data: {'included': included, 'id': id, 'action': action },
            success: function(response) {
                window.location.href='index.php';
            },

        });
    }


 </script>