
	<?php


	  $con=mysqli_connect('localhost','root','','santosh');
	  if(isset($_GET['register']))
	  {
	  	$full=$_GET['fullname'];
	  	$name=$_GET['username'];
	  	$pass=$_GET['password'];

	  	$sql=$con->query("INSERT INTO royback(fullname,username,password)VALUES('$full','$name','$pass')");
	  	if($sql)
	  	{
	  		echo "connection";
	  	}
	  	else
	  	{
	  		echo"disconnection";
	  	}
	  }

	?>
	<a href="login.php">login</a>
	