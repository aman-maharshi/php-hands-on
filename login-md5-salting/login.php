<?php
	$db_hostname = '10.32.2.55';
	$db_username = 'k56';
	$db_password = '700mw';
	$db_database = 'Web_Kaiga56';
	
	$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	if(!$db_server) die("Unable to connect to MySQL: " . mysql_error());
	
	mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());
	
	if(isset($_POST['login'])) {
			$un = $_POST['username'];
			$pw = $_POST['password'];
			
			$query = "SELECT * FROM temp_users WHERE username = '$un'";
			$result = mysql_query($query);
			if(!result) die("Database access failed: " . sql_error());
			elseif(mysql_num_rows($result)) {
				$row = mysql_fetch_array($result);
				
				$salt1 = "per123";
				$salt2 = "123post";
				
				$token = md5("$salt1$pw$salt2");
				if ($token == $row['password']) {
					header('location: success.php');
				}
			}
			else {
				die("Invalid username / password");
			}
	}
?>

<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="login-box">
			<form action="login.php" method="post">
				<input id="username" name="username" type="text" placeholder="Enter Username">
				<input id="password" name="password" type="password" placeholder="Enter Password">
				<input id="login" name="login" type="submit" value="Login">
			</form>
		</div>
	</body>
</html>