
<!--     Session based url rewrite module for module based website
    Copyright 2013-2014 by Kerekes Zoltan
    Demo included 

    Released under the MIT license
    http://www.dyn-web.com/business/license.txt -->

 <html>
 <head>
      <meta charset="utf-8">
     <title>Session based url router</title>

 
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
    <div class="container">
 <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Session based url router</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#" onClick="set_module('welcome', 'edit', '8')">Home</a></li>
              <li><a href="#" onClick="set_module('news', 'delete', '11')">News</a></li>
              <li><a href="#"  onClick="set_module('about_us', '', '')">About us</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Class based examples <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" onClick="set_message('success', 'U just said hello'), set_class('test', 'hello', '8')">Say hello with message</a></li>
                  <li><a href="#" onClick="set_class('test', 'reset', 'Session variables resetted. Press F5 to see if its working')">Reset session array</a></li>
                  
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Wohooo</a></li>
              <li><a href="#">Login</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>


 <div class="row">
  <div class="col-md-1"></div>
 <div class="col-md-10"> 
 Module based links :  
<a href="#" onClick="set_module('welcome', 'edit', '8')" >Home</a>
<a href="#" onClick="set_module('news', 'delete', '11')" >News</a>
<a href="#" onClick="set_module('about_us', '', '')" >About us</a>
<br><br>
PHP class based links:   
<a href="#" onClick="set_message('success', 'U just said hello'), set_class('test', 'hello', '8')" class="btn btn-success">Say hello with message</a>
<a href="#" onClick="set_class('test', 'car', 'Chevy')" class="btn btn-success">My car</a>
<a href="#" onClick="set_class('test', 'pet', 'dog')" class="btn btn-success">Silly pet</a>
<a href="#" onClick="set_class('test', 'reset', 'Session variables resetted. Press F5 to see if its working')" class="btn btn-success">Reset session array</a>
<br><br>
    <?php  
          if (  $_SESSION['message']['class']  ) {
           
           echo "<div class='alert alert-".$_SESSION['message']['class']."' alert-dismissible role='alert'>
              <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
              ".$_SESSION['message']['text']."
            </div>";
           $_SESSION['message'] = array();
          }


                 if ( $moduled == true   ){

                    
                            include( "inc/main_".$included.".php");  

                    }  elseif ( $classed == true   ) { 

                            $class_-> ${!${''} = $func_name }(${!${''} = $var_name });
                                //echo $class_name."_job->".$var_name."()";
                    } elseif (!$moduled  &&  !$classed) {   // if entered to to the site
                      include( "inc/main_welcome.php"); 

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
     <div class="col-md-1"> </div>
     </div></div>
 </body>
 </html>
<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script  src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/alert.js"></script>

<script type="text/javascript">
   function set_module(included, action, id)
    {
         console.log( "moduled is working" );
        $.ajax({
            url: 'redir.php',
            type: 'POST',
            data: {'included': included, 'id': id, 'action': action , 'moduled': true},
            success: function(response) {
                window.location.href = "index.php";
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
                window.location.href = "index.php";
            },

        });
    }

    function set_message(html_class, text)
    {
         console.log( "classed is working" );
        $.ajax({
            url: 'redir.php',
            type: 'POST',
            data: {'html_class': html_class, 'text': text},
            

        });
    }




 </script>