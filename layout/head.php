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