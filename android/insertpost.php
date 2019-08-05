<?php

// $time = date("M d Y H:i:s", mktime(0, 0, 0, 1, 1, 1998));
	$title = $_POST['title'];
	$description = $_POST['description'];
	$idtoken = $_POST['idtoken'];


require_once('settings.php');
require_once('google-login-api.php');

//$code = "4/jwFljoCwxfhlnANojBbmEvJAcpttpuRrqlM2g-JMka9IIZwQsPNLeSlWMFDqtxKoeriYzgcx-QUpUoqeeMPGZ3k"
//$mToken = $POST['idToken'];

$userinfo = 'https://www.googleapis.com/oauth2/v1/tokeninfo?id_token=' . $idtoken;

$json = file_get_contents($userinfo);
$userInfoArray = json_decode($json,true);
$googleEmail = $userInfoArray['email'];
$tokenUserId = $userInfoArray['user_id'];
$tokenAudience = $userInfoArray['audience'];
$tokenIssuer = $userInfoArray['issuer'];


if ( strcasecmp( $tokenAudience, '641695863884-4qrd5s5sdom1719nppm03nn2r5q6mats.apps.googleusercontent.com' ) != 0) {
        error_log ( "ERROR:'" . $tokenAudience . "' did not match." );
        echo "UnAuthorized User";
} else {

// POST items should be checked for bad information before being added to the database.


// Create connection
	$mysqli=mysqli_connect("localhost","hf79csgsn2da","Sk@2991993","oauth"); // localhost, user name, user password, database name

// Check connection
	if (mysqli_connect_errno())
	{
	  echo "
Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query = "insert into `post` (title, description, idtoken) value ('".$title."','".$description."','".$idtoken."')";
	$result = mysqli_query($mysqli,$query);

//	echo $result; // sends 1 if insert worked
    echo "post created successfully!";	
}

?>
