<?php 
	session_start();
	require ('connectivity.php'); 
	
	if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == 'http://www.vphotoshop.com/register.php') 
	{
		echo "You have successfully registered. Please Log in!";
	}
	
	if(isset($_SESSION['username']))
	{
	     header('location:index.php');
	}
	
	if(isset($_POST['uname']))  //check whether text fields variable is set
	{
		$user = $_POST['uname'];
		$pass_hash = md5($_POST['pass']);
		$query = "SELECT * FROM user WHERE username = '$user' AND password='$pass_hash' ";
	    $result=mysql_query($query,$connection)or die('Query failed: ' . mysql_error());
	    $num_rows=mysql_num_rows($result);
	    
	    if($num_rows==1) //login successful
		{
			session_start();
			$_SESSION['username']=$user;
			header('location:index.php');
		}
		else 
		{
		    
			echo "Wrong username or password";
		}
	}
?>

<html>	
  <head> 
		  <script type="text/javascript" src="js/login_form.js"></script>
		  <title>Login</title>
		  <center>
			<h2 font-size="25px"><a href="index.php" >URL Shortner</a><h2>
		  </center>
  </head>
  <body>
		<form action="login_form.php" method ="post" onSubmit="return validations()" name="input">
			<center>
			<table>
			   <tr><td>Username    :- </td><td><input type="text" name="uname" placeholder="username" id="uname"/></td></tr>
			   <tr><td>Password    :- </td><td><input type="text" name="pass" placeholder="password" id="pass"/></td></tr>
            </table>
				
				
				<input type="submit" name="submit" value="Login" />	
			</center>
		</form>
    		
   </body>
</html>
