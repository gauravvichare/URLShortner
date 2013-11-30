<?php
	session_start();
	session_destroy();
	if(isset($_SERVER['HTTP_REFERER']))
	{
		$refer=$_SERVER['HTTP_REFERER'];
		header('Location:'.$refer);
	}
	else 
	{
		header('Location:index.php');
		
	}
?>
