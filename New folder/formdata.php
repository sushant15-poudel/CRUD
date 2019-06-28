<?php 
$con=mysqli_connect("localhost","root","","sushant") or die ('error');
if(isset($_POST['button1']))
{
	$t1=$_POST[ 'text1'];
	$t2=$_POST['text2'];

	$query=$con->query("INSERT INTO data (text1,text2) VALUES('$t1','$t2')");
	if($query)
	{
		echo "1";
	}
	else
	{
		echo "0";
	}
}























?>

