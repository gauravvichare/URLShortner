<?php

	$db_name = "url";
	$user_name = "root";
	$pass = "";
	$server = "localhost";
	$connection = mysql_connect($server, $user_name, $pass);
	$db_select = mysql_select_db($db_name);
	if(!$connection||!$db_name)
   		die(mysql_error());
?>
