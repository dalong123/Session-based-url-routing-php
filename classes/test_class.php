<?php 
class test {
 
public function hello($variable){
	echo "	<div class='well'>	";
	echo "Hello Tester! You have got <ins class='text-info lead'> $variable  </ins>email message(s)! "; 
	echo "<br>";
	echo "The generated code for the the autoload : <code>".htmlentities('  <?php $_class = new test();>')."</code>";
	echo "<br>";
	echo "The generated code for the include : <code>".htmlentities('  <?php $_class->hello(8);>')."</code>";
	echo "	</div>";
 }

 
}
