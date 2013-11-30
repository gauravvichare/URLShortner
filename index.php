<?php
	require 'session_fun.php'
?>
<html>
	<head>
		<h2>Home Page</h2>
	</head>
	<body>
		<?php
			
		   	session_start();
			if(check())
			{
		   		$session_user = $_SESSION['username'];
		   		echo "Welcome " . $session_user . " !";
		 		?>
		   		<a href="logout_form.php" >Logout</a>
		   		<?php
			}
			else 
			{
				?>
				<a href="login_form.php" >Login</a>
				<a href="register.php" >Register</a>
				<?php
			}
		?>
	</body>
</html>
