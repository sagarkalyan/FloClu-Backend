<?php


$link = mysqli_connect("localhost", "hf79csgsn2da","Sk@2991993", "oauth");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 $idToken = $_POST["idToken"];
 $code = $_POST["code"];
 $name = $_POST["name"];
 $email = $_POST["email"];
 require_once('settings.php');
 require_once('google-login-api.php');



// Google passes a parameter 'code' in the Redirect Url
 if(isset($_POST['code'])) {


 $code = $_POST["code"];
		$gapi = new GoogleLoginApi();
$code = $_POST["code"];		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $code);
		
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);
	 $access = $data['access_token'];
	//	$code = $_GET['code'];

	}


/*
$userinfo = 'https://www.googleapis.com/oauth2/v1/tokeninfo?id_token=' . $idToken;

$json = file_get_contents($userinfo);
$userInfoArray = json_decode($json,true);
$googleEmail = $userInfoArray['email'];
$tokenUserId = $userInfoArray['user_id'];
$tokenAudience = $userInfoArray['audience'];
$tokenIssuer = $userInfoArray['issuer'];

if ( strcasecmp( $tokenAudience, '641695863884-4qrd5s5sdom1719nppm03nn2r5q6mats.apps.googleusercontent.com' ) != 0) {
        error_log ( "ERROR:'" . $tokenAudience . "' did not match." );
} else {
//  echo $googleEmail;
//  echo $tokenAudience;
//  echo $access_token;

}
*/

  $sql = "UPDATE tokens2 SET idToken='$idToken', authCode='$code', name='$email', userid='$name' WHERE id=1";

if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
	 print_r($_POST['idToken']);
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>