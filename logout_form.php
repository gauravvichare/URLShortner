<?php
	session_start();
	session_destroy(); //logout
	
	if(isset($_SERVER['HTTP_REFERER']))
	{
		$refer=$_SERVER['HTTP_REFERER'];
		header('Location:'.$refer); //redirect to page where logout button is clicked
	}
	else 
	{
		header('Location:index.php');
		
	}
?>
