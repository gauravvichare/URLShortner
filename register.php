<?php
	require ('connectivity.php');
	session_start();
	if(isset($_SESSION['username']))
	{
		header('location:index.php');
	}
	
	if(isset($_POST["uname"]))
	{
		$user = $_POST['uname'];
		$email = $_POST['email'];
		$pass_hash = md5($_POST['pwd']);
		//3.query to insert
		$query = "INSERT INTO login VALUES ('$user','$email','$pass_hash')";
		$result = mysql_query($query,$connection);
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
		<title>Register</title>
		<h2>Sign up</h2>
	</head>
	<body>
		<form action="register.php" method="post" onSubmit="return validations()"  name="input">
		    <pre>
				User Name       : <input type="text" id="uname" name="uname" placeholder="user name"/><br />
				Email ID        : <input type="text" id="email" name="email" placeholder="email id"/><br />
				Password        : <input type="password" id="p1" name="pwd" placeholder="password"/><br />
				Retype Password : <input type="password" id="p2" name="repwd" placeholder="retype password"/><br /> 
		    			<input type="submit" name="submit" />	
	     	</pre>
		</form>		
	  
	<script type="text/javascript">
	function validations()
	{
		if(pwdValidation())
	    {
	    	if(emailValidation())
	    	{
	    		if(usernameValidation())
	    		{
	    			return true;
	    		}
	    		return false;
	    	}
	    	return false;
	    }
	    return false;
	}
		
	function color()
	{
		document.getElementById('p1').style.background="#FFB2B2"
		document.getElementById('p2').style.background="#FFB2B2"
	}
		
	function pwdValidation()
	{  	
		var p1 = document.getElementById('p1').value;  
        var p2 = document.getElementById('p2').value;  
        var len_p1 = p1.length;
        
        if(7 < len_p1)
   		{
   			if(p1 !== p2)
		    {
		   		alert("Password doesn't match. Enter correct password.");
		   		color();
		   		return false;
		    }  	
			return true;
		}
		else
		{
			alert("Password length must be min 8 char");
			color();
			return false;
		}	
	}
	
	function emailValidation()
	{
		var em = document.getElementById('email').value;
		var len = em.length;
    	var firstat = em.indexOf("@");
		var lastat = em.lastIndexOf("@");
		var dotpos = em.lastIndexOf(".");
		
		if((firstat===lastat)&&((firstat+1)<dotpos)&&firstat!=-1&&dotpos!=-1&&(em.charAt(dotpos+2)))
		{
			return true;				
		}
		else
		{
			alert("Enter valid email address");
			document.getElementById('email').style.background="#FFB2B2"
		    return false
		}
	}
		
	function usernameValidation()
	{
		var uname = document.getElementById('uname').value;
		var len = uname.length;
		if(len > 4)
		{
			return true;
		}
		alert("Enter Username having atleast 5 chars");
		document.getElementById('uname').style.background="#FFB2B2"
		return false;
	}

    </script>	
	</body>
</html>
