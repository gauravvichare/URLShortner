<?php 
	require ('connectivity.php'); 
?>
<?php
	if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == 'http://localhost/xampp/url_pro/register.php') //change after uploading on server
	{
		echo "You have successfully registered. Please Log in!";
	}
	if(isset($_POST['uname']))  //check whether text fields variable is set
	{
		$user = $_POST['uname'];
		$pass_hash = md5($_POST['pass']);
		$query = "SELECT * FROM `login` WHERE `username` = '$user' AND `password`='$pass_hash' ";
	    $result=mysql_query($query,$connection);
	    $num_rows=mysql_num_rows($result);
	    
	    if($num_rows==1)
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
    <body>
		<form action="login_form.php" method ="post" onSubmit="return validations()" name="input">
			<pre>
				Handle Name :- <input type="text" name="uname" placeholder="uname" id="uname"/>
				Password    :- <input type="text" name="pass" placeholder="pass" id="pass"/>
				<input type="submit" name="submit" />	
			</pre>
		</form>
		
		<script type="text/javascript">
	function validations()
	{
		if(pwdValidation() && usernameValidation())
	    {
	    	return true;
	    }
	    return false;
	}
	
	function usernameValidation()
	{
		var uname = document.getElementById('uname').value;
		var len = uname.length;
		if(len > 4)
		{
			return true;
		}
		alert("Enter correct User name. ");
		color("uname");
		return false;
	}
	
	function pwdValidation()
	{  	
		var p1 = document.getElementById('pass').value;  
        var len_p1 = p1.length;

        if(7 < len_p1)
   		{
   				return true;
		}
		else
		{
			alert("Enter correct password.");
			color("pass");
			return false;
		}	
	}
	
    function color(box)
	{
		document.getElementById(box).style.background="#FFB2B2"
	}
	
	</script>    		
	</body>
</html>
