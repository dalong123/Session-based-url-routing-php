
<!--     Session based url rewrite module for module based website
    Copyright 2013-2014 by Kerekes Zoltan
    Demo included 

    Released under the MIT license
    http://www.dyn-web.com/business/license.txt -->

 <html>
 <head>
      <meta charset="utf-8">
     <title>Session based url rewrite</title>

 
    <?php 
      session_start();

         function __autoload($className) {        //autoload dynamic classes
         if (file_exists('classes/'.$className . '_class.php')) {
            require_once 'classes/'.$className . '_class.php';

            echo $className." _class.php loaded <br>";
        }  else  {
          throw new Exception('Class "' . $className . '" could not be autoloaded');
        } 
    }
      //make it short
          $moduled =  $_SESSION['switcher']['moduled'];
          $classed =  $_SESSION['switcher']['classed'];
       
        $included = '';   //reset  module name to be sure
        if ( $moduled == true   ) {
            
        
                
                $included = $_SESSION['url']['included']; //get  module name

                if (!$included) {
                    $included = "welcome";  //if not get, set  module name to default
                    }  

            } elseif ( $classed == true   ) {
            
        
               
                $class_name = $_SESSION['class']['class']; //get  class name
                $func_name = $_SESSION['class']['function']; //get  function name
                $var_name = $_SESSION['class']['variable']; //get  variable name

                // getting loaded by __autoload
               $class_ = new ${!${''} = $class_name }();  // Very nifty. Creating a new instance from session variables
                                                          // thx to silkfire on stackoverflow
                              
            }
        
        ?>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>
 <body>
 <div class="row">
  <div class="col-md-2"></div>
 <div class="col-md-8"> 
 Module based links :  
<a href="#" onClick="set_module('welcome', 'edit', '8')" class="btn btn-info">Home</a>
<a href="#" onClick="set_module('news', 'delete', '11')" class="btn btn-info">News</a>
<a href="#" onClick="set_module('about_us', '', '')" class="btn btn-info">About us</a>
<br><br>
Class based link:   
<a href="#" onClick="set_class('test', 'hello', '8')" class="btn btn-success">Say hello</a>
<br><br>
    <?php  
                 if ( $moduled == true   ) {

                    
                            include( "inc/main_".$included.".php");  

                    }  elseif ( $classed == true   ) { 

                            $class_-> ${!${''} = $func_name }(${!${''} = $var_name });
                                //echo $class_name."_job->".$var_name."()";
                    } 
    ?>
    <br>  <br>  
    <p> Let's see what contains the <code> $_SESSION  </code> variable:</p>
    <?php 
        echo "<pre>";
         print_r($_SESSION);
         echo "</pre>"; 
    ?>
     </div>
     <div class="col-md-2"> </div>
     </div>
 </body>
 </html>
 <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
 <script type="text/javascript">
   
   function set_module(included, action, id)
    {
         console.log( "moduled is working" );
        $.ajax({
            url: 'redir.php',
            type: 'POST',
            data: {'included': included, 'id': id, 'action': action , 'moduled': true},
            success: function(response) {
                window.location.href='index.php';
            },

        });
    }


       function set_class(inc_class, inc_function, variable)
    {
         console.log( "classed is working" );
        $.ajax({
            url: 'redir.php',
            type: 'POST',
            data: {'inc_class': inc_class, 'inc_function': inc_function, 'variable': variable, 'classed': true},
            success: function(response) {
                window.location.href='index.php';
            },

        });
    }


 </script>