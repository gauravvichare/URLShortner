<?php

	$db_name = "gaurav99_url";
	$user_name = "gaurav99_url";
	$pass = "gaurav12345";
	$server = "localhost";
	$connection = mysql_connect($server, $user_name, $pass)or die('Could not connect: ' . mysql_error());
	$db_select = mysql_select_db($db_name)or die('Could not select database');
?>
