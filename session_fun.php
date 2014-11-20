<?php
	function check()
	{
		if(isset($_SESSION['username']))
		{
			return TRUE;
		}
		else 
		{
			return FALSE;
		}
	}
?>
