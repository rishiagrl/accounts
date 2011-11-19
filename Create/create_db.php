<?php
function crt_db($dname){
	$con = mysql_connect("localhost","root","");
	if (!$con)
  	{
  	die('Could not connect: ' . mysql_error());
  	}

	if (mysql_query("CREATE DATABASE $dname",$con))
  	{
  	echo "Database created";
  	}else
	{
	 echo "Error creating database: " . mysql_error();
	}

	mysql_close($con);
}

crt_db("psycho_data") ;
?>

