<?php
	$db_hostname = '10.32.2.55';
	$db_username = 'k56';
	$db_password = '700mw';
	$db_database = 'Web_Kaiga56';
	
	$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	if(!$db_server) die("Unable to connect to MySQL: " . mysql_error());
	
	mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());
	
	/*
	$query = "CREATE TABLE temp_users(
		name VARCHAR(32) NOT NULL,
		username VARCHAR(32) NOT NULL UNIQUE,
		password VARCHAR(32) NOT NULL
	)";
	
	$result = mysql_query($query);
	if(!$result) die("Database access failed: " . mysql_error());
	*/
	
	$salt1 = "per123";
	$salt2 = "123post";
	
	$name = 'Drow';
	$username = 'drow123';
	$password = 'ranger123';
	$token = md5("$salt1$password$salt2");
	add_user($name, $username, $token);
	
	function add_user($nm, $un, $pw) {
		$query = "INSERT INTO temp_users VALUES('$nm', '$un', '$pw')";
		$result = mysql_query($query);
		
		if(!$result) die("Database access failed: " . mysql_error());
	}
	
?>