<?php
// date_default_timezone_set("America/Vancouver");
	$secret = "";
	$secret = $_POST["secretWord"];
	if ("44fdcv8jf3" != $secret) exit; // note the same secret as the app - could be let out if this check is not required. secretWord is not entered by the user and is used to prevent unauthorized access to the database

// $time = date("M d Y H:i:s", mktime(0, 0, 0, 1, 1, 1998));
	$title = $_POST['title'];
	$detail = $_POST['detail'];
	$userid = $_POST['userid'];
	$username = $_POST['username'];
//	$item4 = $_POST['item4'];
//	$item5 = $_POST['item5'];

// POST items should be checked for bad information before being added to the database.

// Create connection
	$mysqli=mysqli_connect("localhost","hf79csgsn2da","Sk@2991993","floclu"); // localhost, user name, user password, database name

// Check connection
	if (mysqli_connect_errno())
	{
	  echo "
Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query = "insert into `posts` (title, detail, userid, username) value ('".$title."','".$detail."','".$userid."','".$username."')";
	$result = mysqli_query($mysqli,$query);

	echo $result; // sends 1 if insert worked
?>
