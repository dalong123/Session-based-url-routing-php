<?php 
class test {
 
public function hello($variable){
	echo "	<div class='well'>	";
	echo "Hello Tester! You have got <lol class='text-info lead'> $variable  </lol>email message(s)! "; 
	echo "<br>";
	echo "The generated code for the the autoload : <code>".htmlentities('  <?php $_class = new test();>')."</code>";
	echo "<br>";
	echo "The generated code for the include : <code>".htmlentities('  <?php $_class->hello(8);>')."</code>";
	echo "	</div>";
 }
 	public function car($variable){
	echo "	<div class='well'>	";
	echo "Hello Tester! I have got an old <lol class='text-info lead'> $variable  </lol>! "; 
	echo "<br>";
	echo "The generated code for the the autoload : <code>".htmlentities('  <?php $_class = new test();>')."</code>";
	echo "<br>";
	echo "The generated code for the include : <code>".htmlentities('  <?php $_class->car(Chevy);>')."</code>";
	echo "	</div>";
 }
 public function pet($variable){
	echo "	<div class='well'>	";
	echo "Hello Tester! You have got a silly <lol class='text-info lead'> $variable  </lol>! "; 
	echo "<br>";
	echo "The generated code for the the autoload : <code>".htmlentities('  <?php $_class = new test();>')."</code>";
	echo "<br>";
	echo "The generated code for the include : <code>".htmlentities('  <?php $_class->pet(dog);>')."</code>";
	echo "	</div>";
 }

  public function reset($var){   // simulatimg newscomres to site
  	$_SESSION = array();
  	echo "	<div class='well'>	";
  	echo $var;
  	echo "	</div>	";

  }
 
}
