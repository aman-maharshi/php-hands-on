<?php 
	$un = "admin";
	$pw = "1234";
		
	if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
		if($_SERVER['PHP_AUTH_USER'] == $un && $_SERVER['PHP_AUTH_PW'] == $pw) {
			echo "Welcome back " . $un;
		}
		else {
			die ("Invalid username / password");
		}
	}
	else {
		header('WWW-Authenticate: Basic realm="Restricted Section"');
		header('HTTP/1.0 401 Unauthorized');
		die("Please enter your username and password");
	}

?>