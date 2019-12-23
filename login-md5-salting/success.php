<?php
	session_start();
	
	if(isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$name = $_SESSION['name'];
	
		echo $name.", accessing variables using session"."<br>";
		echo "Your session ID is: " . session_id();
		echo "<br>"."Your session Name is: " . session_name();
		echo "<p><a href='login.php'>Logout</p>";
		
		destroy_session_and_data();
	}
	

	function destroy_session_and_data() {
		$_SESSION = array();
		if(session_id() != "" || isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time() - 2592000, '/');
		}
		session_destroy();
	}
?>