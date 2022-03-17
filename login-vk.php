<?php
require 'config/functions.php';


date_default_timezone_set('europe/moscow');
/*
require 'facebook/facebook.php';



$facebook = new Facebook(array(
            'appId' => APP_ID,
            'secret' => APP_SECRET,
            ));

$user = $facebook->getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
*/
if(!isset($_SESSION['id'])) {

require_once 'vk/VkPhpSdk.php';
require_once  'vk/Oauth2Proxy.php';
if(isset($_REQUEST['cl'])) { $isstudent=$_REQUEST['cl'];} else  { $isstudent=1;}
// Init OAuth 2.0 proxy
$oauth2Proxy = new Oauth2Proxy(
    '4874586', // client id
    'k0fGpw2GRqZxtbuJrF6b', // client secret
    'https://oauth.vk.com/access_token', // access token url
    'https://oauth.vk.com/authorize', // dialog uri
    'code', // response type
    'http://cmsch.ru/login-vk.php?cl='.$d, // redirect url
	'' // scope
);


if($oauth2Proxy->authorize() === true)
{

}
	// Init vk.com SDK
	$vkPhpSdk = new VkPhpSdk();
	$vkPhpSdk->setAccessToken($oauth2Proxy->getAccessToken());
	$vkPhpSdk->setUserId($oauth2Proxy->getUserId());
//	if(isset($_REQUEST['cl'])) {$isstudent=$_REQUEST['cl'];} else {$isstudent=-1; }
	//print_r($_REQUEST);
	// API call - get profile
	$result = $vkPhpSdk->api('getProfiles', array(
		'uids' => $vkPhpSdk->getUserId(),
		'fields' => 'uid, first_name, last_name, nickname, screen_name, photo_big',
	));

        # User info ok? Let's print it (Here we will be adding the login and registering routines)
  
        $username = $result['response']['0']['first_name'];
			 $uid = $result['response']['0']['uid'];
		 $email ="";
		// print_r($result['response']['0']['uid']);
		 //echo $email;
        $user = new User();
        $userdata = $user->checkUser($uid, 'vk', $username,$email,$twitter_otoken,$twitter_otoken_secret,$isstudent);
		//echo "ûûûû";
		//print_r($userdata);
        if(!empty($userdata)){
            session_start();
            $_SESSION['id'] = $userdata['id'];
 			$_SESSION['oauth_id'] = $uid;
			$_SESSION['isstudent'] = $userdata['is_student'];
            $_SESSION['username'] = $userdata['username'];
			$_SESSION['email'] = $email;
            $_SESSION['oauth_provider'] = $userdata['oauth_provider'];
			$_SESSION['actpet'] = $userdata['id_activpets'];
			if ($userdata['is_student']==1) { header("Location: /student/"); } else { header("Location: /users/profile/");} 
            
        }
    } else {
        # For testing purposes, if there was an error, let's kill the script
        die("There was an error.");
    }












?>
