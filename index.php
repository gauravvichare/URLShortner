<?php
	session_start();
    require 'connectivity.php';
	require 'session_fun.php';
	require 'generate.php';
	$current=$_SERVER['REQUEST_URI'];
	$pos=strrpos($current,"/");
	$short=substr($current,$pos+1);
	$query="SELECT long_url FROM url WHERE short_url = '$short' ";
	$result=mysql_query($query)or die('Query failed: ' . mysql_error());
    $row = mysql_fetch_array($result);
	$query="UPDATE url SET visits=visits+1 WHERE short_url='$short'";
    $result=mysql_query($query)or die('Query failed: ' . mysql_error());

    header("Location:$row[0]");
?>
<html>
	<head>
	    <title>URL Shortner</title>
		<style type="text/css">

body {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 25px;
	text-align: center;
}
input {
	font-size: 20px;
	padding: 10px;
}

form {
	margin: 0px;
	padding: 0px;
}

</style>

		<h2>URL shortner</h2>
		
	</head>
	<body>
		<?php
			
		   
			if(check())
			{
		   		$session_user = $_SESSION['username'];
		   		echo "Welcome " . $session_user . " !";
		 		?>
				<a href="history.php" >History</a>
		   		<a href="logout_form.php" >Logout</a>
		   		<?php
			}
			else 
			{
				?>
			    <font size="4">
				<a href="login_form.php" >Login</a>
				<a href="register.php" >Register</a>
				</font>
				<?php
			}
		?>
		
		<form action="index.php" method="post" onSubmit=""  name="input">
		  
                           <input name="url" type="text" id="url" placeholder="Paste link" size="70" />
                            <input type="submit" name="Submit" value="Shorten" />
						
	     
		</form>
         		
		<?php
		if(isset($_POST['url']))
		{
		 $query='SELECT short_url FROM url ORDER BY id DESC LIMIT 1';//select last record
		 $result=mysql_query($query)or die('Query failed: ' . mysql_error());

		$row = mysql_fetch_array($result);
         $new=next_url($row[0]);
		 echo "short url: "."www.vphotoshop.com/".$new;
		 echo"<br>";
		 echo "long url:".$_POST['url'];
		 if(isset($_SESSION['username']))
		 {
		 $user=$_SESSION['username'];
		 }
		 else
		 {
		 $user=NULL;
		 }
		 $short=$new;
		 $long=$_POST['url'];
		 
		$query1 = "INSERT INTO url (short_url,long_url,username,visits)VALUES ('$short','$long','$user',0)";
		$result1 = mysql_query($query1)or die('Query failed: ' . mysql_error());
	   //echo($result);
	    echo "<br />";
		if(!$result1)
		{
			echo " error";
		}
		else 
		{
			echo"inserted";
		}
		 
		}
		
		$result = mysql_query( "select count(id) as num_rows from url" )or die('Query failed: ' . mysql_error());
        $row=mysql_fetch_object( $result );
        $total=$row->num_rows;
		echo "<br><br><br>Total links shortened<br>".$total;
		?>
		<br>
		<font size="3"><a href="https://github.com/gauravvichare/URLShortner" style="text-decoration:none">View code on github</a></font>
	</body>
</html>
