<?php
session_start();
$con=mysqli_connect('localhost','root','','santosh');
if(isset($_POST['register']))
{
		$names=$_POST['username'];	
		$passt=$_POST['password'];

	$query=$con->query("INSERT INTO cry(username,password)VALUES('$names','$passt')");
	if($query)
	{
		echo"attach to the database";
	}
	else
	{
		echo"unsuccessful to attach at database";
	}	
		
}
else
{
	
	$_session['name']="12";
	$_session['password']="14";
	
}








?>