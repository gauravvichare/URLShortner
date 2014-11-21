<?php
    ob_start();
	session_start();
	require ('connectivity.php');

	if(isset($_SESSION['username']))
	{
		header('location:index.php');
	}
	
	if(isset($_POST["uname"]))
	{
		$user1 = $_POST['uname'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email = $_POST['email'];
		
		$pass_hash = md5($_POST['pwd']);
		$query = "INSERT INTO user VALUES ('$user1','$fname','$lname','$email','$pass_hash')";//check duplication//remaining
		$result = mysql_query($query,$connection)or die('Query failed: ' . mysql_error());
	    echo "<br />";
		if(!$result)
		{
			echo "Username is already registered. Please enter different username.";
		}
		else 
		{
			header("location:login_form.php");
		}
	}
	
?>
<html>
	<head>
	    <script type="text/javascript" src="js/register.js"></script>
		<title>Register</title>
		<center>
			<h2><a href="index.php" >URL Shortner</a><h2>
		    <h2>Sign up</h2>
		</center>
	</head>
	<body>
		<form action="register.php" method="post" onSubmit="return validations()"  name="input">
		     <center>
			 <table>
				   <tr><td>User Name       :</td><td><input type="text" id="uname" name="uname" placeholder="user name"/></td></tr>
				   <tr><td>First Name      :</td><td><input type="text" id="fname" name="fname" placeholder="First name"/></td></tr>
				   <tr><td>Last Name       :</td><td><input type="text" id="lname" name="lname" placeholder="Last name"/></td></tr>
				   <tr><td>Email ID        :</td><td><input type="text" id="email" name="email" placeholder="email id"/></td></tr>
				   <tr><td>Password        :</td><td><input type="password" id="p1" name="pwd" placeholder="password"/></td></tr>
				   <tr><td>Retype Password :</td><td><input type="password" id="p2" name="repwd" placeholder="retype password"/></td></tr>
             </table>
			                  <input type="submit" name="submit" />	
			 </center>
		</form>		
	  
	
	</body>
</html>
