<?php

if(isset($_POST['idToken']) && isset($_POST['code'])) {
require_once('settings.php');
require_once('google-login-api.php');


$idToken=$_POST['idToken'];
$code=$_POST['code'];


$userinfo = 'https://www.googleapis.com/oauth2/v1/tokeninfo?id_token=' . $idToken;

$json = file_get_contents($userinfo);
$userInfoArray = json_decode($json,true);
$googleEmail = $userInfoArray['email'];
$tokenUserId = $userInfoArray['user_id'];
$tokenAudience = $userInfoArray['audience'];
$tokenIssuer = $userInfoArray['issuer'];


$gapi = new GoogleLoginApi();
$code=$_POST['code'];
// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $code);
$access_token = $data['access_token'];

if ( strcasecmp( $tokenAudience, '641695863884-4qrd5s5sdom1719nppm03nn2r5q6mats.apps.googleusercontent.com' ) != 0) {
        error_log ( "ERROR:'" . $tokenAudience . "' did not match." );
} else {
//  echo $googleEmail;
//  echo $tokenAudience;
echo $access_token;
}
} else{
    echo "wrong way";
}

?>
