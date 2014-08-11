<head>	
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Simple redidect by session data</title>
</head>
<html>	
<body>
		<?php 
		
		session_start();
		//echo $_SESSION['url']['included'];
		$_SESSION['url'] = array();
		if (isset($_POST['included'])) {
			$_SESSION['url']['included'] = $_POST['included'];
		}
		if (isset($_POST['id'])) {
			$_SESSION['url']['id'] = $_POST['id'];
		}
		if (isset($_POST['action'])) {
			$_SESSION['url']['action'] = $_POST['action'];
		}
		
	
		//echo "success";
		//echo "	<br>";
		//echo $_SESSION['url']['module'];
		//print_r($_POST);

  
 ?>
</body>
</html>
