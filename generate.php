<?php
 function next_url($s)
 {
    $s0=ord($s[0]);
	$s1=ord($s[1]);
	$s2=ord($s[2]);
	$s3=ord($s[3]);
	
if($s3==122)
{
  $s3=97;
   if($s2==122)
   {
	   $s2=97;
	   if($s1==122)
	   {
			$s1=97;
			if($s0==122)
			{
			}
			else
			{
			  $s0++;
			}
	   }
	   else
	   {
			$s1++;
	   }
    }
    else
    {
		$s2++;
    }
  
}
else
{
   $s3++;
}	
return chr($s0).chr($s1).chr($s2).chr($s3);
	
}

function increament_visits()
{
	$query="UPDATE url SET visits=visits+1 WHERE short_url='$short'";
    $result=mysql_query($query)or die('Query failed: ' . mysql_error());
}

function long_url()
{
    $current=$_SERVER['REQUEST_URI'];
	$pos=strrpos($current,"/");
	$short=substr($current,$pos+1);
	$query="SELECT long_url FROM url WHERE short_url = '$short' ";
	$result=mysql_query($query)or die('Query failed: ' . mysql_error());
    $row = mysql_fetch_array($result);
	return $row[0];
}

	?>
