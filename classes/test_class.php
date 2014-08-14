<?php 
class test {
 
public function hello($variable){
	echo "Hello Tester! u have got $variable email message(s)! "; 
	echo "<br>";
	echo "The generated code for the the aoutoload : <code>".htmlentities('  <?php $_class = new test();>')."</code>";
	echo "<br>";
	echo "The generated code for the include : <code>".htmlentities('  <?php $_class->hello(8);>')."</code>";
 }

 
}
