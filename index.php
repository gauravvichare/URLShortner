<?php
	session_start();
    require 'connectivity.php';
	require 'session_fun.php';
	require 'generate.php';
	$current=$_SERVER['REQUEST_URI'];
	$pos=strrpos($current,"/");
	$short=substr($current,$pos+1);
	$long_url=long_url($short);
    increament_visits($short);
	header("Location:$long_url");
?>
<html>
	
	<head>
	     <title>URL Shortner</title>
		 <script type="text/javascript" src="js/index.js"></script>
         <link rel="stylesheet" type="text/css" href="css/index.css">
         <h2>URL shortner</h2>
		
	</head>
	
	<body>
		<?php
			if(check())
			{?>
				
				<a href="history.php" >History</a>
		   		<a href="logout_form.php" >Logout</a>
	            <?php
			}
			else 
			{?>
			    <font size="4">
				<a href="login_form.php" >Login</a>
				<a href="register.php" >Register</a>
				</font>
				<?php
			}
		?>
		
		<form name="url" action="index.php" method="post" onsubmit=""  name="input">
		  
                <input name="url" type="text" id="url" placeholder="Paste link" size="70" />
                <input type="submit" name="Submit" value="Shorten" />
						     
		</form>
         		
		<?php
		if(isset($_POST['url']))
		{
			 $url=$_POST['url'];
		     if(!filter_var($url, FILTER_VALIDATE_URL))
			  {
			  ?>
				 <span style="color:red "><?php echo "Enter valid url"; ?></span>
                 <?php
			  }
			else
			  {
				  $query='SELECT short_url FROM url ORDER BY id DESC LIMIT 1';//select last record
				 $result=mysql_query($query)or die('Query failed: ' . mysql_error());
				 $row = mysql_fetch_array($result);
				 $new=next_url($row[0]);
				
				 echo "<br />";
				 echo "short url: ";
				 ?>
				 <span style="color:#0066FF"><?php echo "www.vphotoshop.com/".$new; ?></span>
                 <?php
				 
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
				 echo "<br />";
			  
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
