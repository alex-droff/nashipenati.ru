<?php
error_reporting(0);
header('Access-Control-Allow-Origin: http://cmsch.ru/');
 header('Access-Control-Allow-Origin: http://www.cmsch.ru/');

define('INCLUDE_CHECK',true);
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
require_once 'connect.php';
include('functions.php');
// Those two files can be included only if INCLUDE_CHECK is defined

//if (isset($_REQUEST['PHPSESSID'])) { session_id($_REQUEST['PHPSESSID']); }  else { session_name(''); }
 
setlocale(LC_ALL, 'ru_RU.UTF-8');

date_default_timezone_set('europe/moscow');

// Starting the session

session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks

session_start();

if (array_key_exists("login", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
	if($_GET['client']=='off'){	$isstudent=0;}
	if($_GET['client']=='on'){	$isstudent=1;}
    if ($oauth_provider == 'twitter') {
        header("Location: /login-twitter.php");
    } else if ($oauth_provider == 'facebook') {
        header("Location: /login-facebook.php?cl=".$isstudent);
    }
	else if ($oauth_provider == 'vk') {
        header("Location: /login-vk.php?cl=".$isstudent);
    }
}

/*
if($_SESSION['id'] && !isset($_COOKIE['tzRemember']) && !$_SESSION['rememberMe'])
{
	// If you are logged in, but you don't have the tzRemember cookie (browser restart)
	// and you have not checked the rememberMe checkbox:

	$_SESSION = array();
	session_destroy();
	 $chcnv="DESTOR";
	echo $chcnv;
	// Destroy the session
}
*/
function layoutTypes()
{
    return array('classic', 'mobile', 'tablet');

}
function encode64($file){
    $extension = explode(".", $file);
    $extension = end($extension);

    $binary = fread(fopen($file, "r"), filesize($file));

    return 'data:image/'.$extension.';base64,'.base64_encode($binary);
}
function initLayoutType()
{
    // Safety check.
    if (!class_exists('Mobile_Detect')) { return 'classic'; }

    $detect = new Mobile_Detect;
    $isMobile = $detect->isMobile();
    $isTablet = $detect->isTablet();

    $layoutTypes = layoutTypes();

    // Set the layout type.
    if ( isset($_GET['layoutType']) ) {

        $layoutType = $_GET['layoutType'];

    } else {

        if (empty($_SESSION['layoutType'])) {

            $layoutType = ($isMobile ? ($isTablet ? 'tablet' : 'mobile') : 'classic');

        } else {

            $layoutType =  $_SESSION['layoutType'];

        }

    }

    // Fallback. If everything fails choose classic layout.
    if ( !in_array($layoutType, $layoutTypes) ) { $layoutType = 'classic'; }

    // Store the layout type for future use.
    $_SESSION['layoutType'] = $layoutType;

    return $layoutType;

}

/**
 *  End helper functions.
 */

// Let's roll. Call this function!
$layoutType = initLayoutType();
if(isset($_REQUEST['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location: http://www.cmsch.ru/index.php");
	exit;
}

if($_POST['submit']=='Войти')
{
	// Checking whether the Login form has been submitted
	
	$err = array();
	// Will hold our errors
	
	if(!$_POST['email'] || !$_POST['password'])
		$err[] = 'Заполните все поля для входа!';
	
	if(!count($err))
	{
		$_POST['email'] = $mysqli->real_escape_string($_POST['email']);
		$_POST['password'] = $mysqli->real_escape_string($_POST['password']);
		$_POST['rememberMe'] = (int)$_POST['rememberMe'];
		
		// Escaping all input data

		$row = mysqli_fetch_assoc($mysqli->query("SELECT id,username,email, names,	secondname, avatar, countlogin, statuser, statuser, is_student	 FROM users WHERE email='{$_POST['email']}' AND password='".md5($_POST['password'])."' and allowname=0"));
	
//echo "SELECT id,username,email, names,	secondname, avatar, countlogin, statuser, statuser	 FROM users WHERE email='{$_POST['email']}' AND password='".md5($_POST['password'])."' and allowname=0";
		if($row['email'])
		{
			// If everything is OK login
			
			$_SESSION['username']=$row['email'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['isstudent'] = $row['is_student'];
			$_SESSION['rememberMe'] = $_POST['rememberMe'];
			$_SESSION['names'] = $row['names'];
			$_SESSION['secondname'] = $row['secondname'];
			$_SESSION['avatar'] = $row['avatar'];
			$_SESSION['countlogin'] = $row['countlogin'];
			$_SESSION['actpet'] = $row['id_activpets'];
			// Store some data in the session
			$sql = "UPDATE `users` SET  `countlogin`= `countlogin` + 1 WHERE `id`=".$row['id'].";"; 
			//echo $sql;
			$result = $mysqli->query($sql); 
			setcookie('tzRemember',$_POST['rememberMe']); 
			header("Location: /users/profile/");
			//echo "Location: /users/profile/";
		}
		else { $err[]='Не правильный логин/пароль!'; 
		 $sql = "UPDATE `users` SET `errlogin`= `errlogin` + 1 WHERE `username`=".$_POST['email'].";"; 
			//echo $sql;
			$result = $mysqli->query($sql);  }
	}
	
	if($err) {
	$_SESSION['msg']['login-err'] = implode('<br />',$err);
	// Save the error messages in the session

	 $err[]='Не правильный логин/пароль!'; } 	else {	if ($row['statuser']=='2') { $_SESSION = array(); 	session_destroy();	 header("Location: http://".$_POST['username'].".cmsch.ru/delete/");  } else { if ($row['countlogin']==0)  { //header("Location: http://www.cmsch.ru/settings/");
	   } else { header("Location: /users/profile/"); 
	    } } }
	
}
else if($_POST['submit']=='Регистрация')
{
	// If the Register form has been submitted
	
	$err = array();
	
	/* if(strlen($_POST['username'])<3 || strlen($_POST['username'])>32)
	{
		$err[]='Логин должен быть от 3 до 32 знаков!'; 
	}
	
	if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['username']))
	{
		$err[]='Логин содержит запрещенные символы!';  
	}
	*/
	if(!checkEmail($_POST['email']))
	{
		$err[]='Email не правильный!';
	}
	 
	// print_r($err);
	//  print_r($_POST);
	
		// If there are no errors
		$emailreg = $_POST['email'];
$query = sprintf("SELECT * FROM users WHERE email='%s'", $mysqli->real_escape_string($emailreg));
//echo $query;
$result = $mysqli->query($query);

if(!$result) {
   $err[]="Что-то пошло не так...!"; 
} else {
    if($result->num_rows > 0) {
        $err[]="Этот email уже занят!"; 
    } else {
        // Good to go...
    }
}
/*
$emailreg = $_POST['username'];
$query = sprintf("SELECT * FROM users WHERE username='%s'", $mysqli->real_escape_string($emailreg));
//echo $query;
$result = $mysqli->query($query);
 if($result->num_rows > 0) {
      $err[]='Это имя уже занято!';
    }  
	*/

		if(!count($err))
	{ 
	//$pass = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
		$pass = $_POST['password'];
		// Generate a random password
		$activation = md5(uniqid(rand(), true));
		$email =$mysqli->real_escape_string($_POST['email']);
		$isstudent =$mysqli->real_escape_string($_POST['is_student']);
		$username = $mysqli->real_escape_string($_POST['username']);
		// Escape the input data
		
		$sql="INSERT INTO users(username,password,email,reg_ip,created,is_student, avtivation)
						VALUES(
						
							'".$username."',
							'".md5($pass)."',
							'".$email."',
							'".$_SERVER['REMOTE_ADDR']."',
							NOW(),'".$isstudent."',
							'".$activation."'
							
						)";
		
		$mysqli->query($sql);
		//echo $sql;
		$profidt = $mysqli->insert_id; //echo "++".$profidt."--33";
	if($mysqli->affected_rows==1)
		{
		
		}
			
	$body='	<div style="background-color:#f4f4f4;margin:0;padding:20px 0 20px 0">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Helvetica,Arial,Verdana,sans-serif;color:#55555;font-size:14px;line-height:21px" align="center">
  <tbody><tr>
    <td align="center" bgcolor="#f4f4f4" style="padding:20px 0 20px 0">
      <table width="740" border="0" cellspacing="0" cellpadding="50" bgcolor="#ffffff" style="border-radius:3px">
        <tbody><tr>
          <td>
            <table width="640" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td style="border-bottom:1px solid #eeeeee" align="left">
                <img src="'.encode64("/emails/logo.png").'" width="500" height="71" alt="cmsch" title="НОУ СОШ «Наши Пенаты» "></td>
              </tr>

              <tr>
                <td style="padding:20px 0 20px 0" align="left" valign="top">
                  <table width="640" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #eee;padding:0 0 20px 0;margin:0 0 20px 0">
  <tbody><tr>
    <td width="50" valign="top" align="left">
         <img src="http://cmsch.ru/emails/usericon.png" alt="cmsch"></td>
    <td width="430" valign="top" align="left" style="padding:5px 0 0 0">
      <p style="font-size:32px;color:#666;line-height:42px;letter-spacing:-2;margin:0;padding:0">Зарегистрирован новый пользователь</p>
      <p style="color:#888;margin:0;padding:0">
        
      </p>
    </td>
  </tr>
</tbody></table>

<p style="padding:0;margin:0; font-size:2em; line-height:21px;padding:10px;margin:0;border:1px solid #d9ecf4;background:#e3f7ff;border-radius:3px">
  <strong>Ваш логин</strong>: <strong>'.$email.'</strong>
</p>
<br>
<p>Для завершении регистрации пройдите по ссылке:</p>
<p style="color:#297899;font-size:14px;line-height:21px;padding:10px;margin:0;border:1px solid #d9ecf4;background:#e3f7ff;border-radius:3px">
  <strong>
    <a href="http://www.cmsch.ru/activate.php?email=' .$email .'&activation='.$activation.'" style="color:#3589ae;text-decoration:none" target="_blank">http://<span class="il">cmsch</span>.ru/activate.php?ivate&email=' .$email .'&activation='.$activation.'</a>
  </strong>
</p>
                </td>
              </tr>

              <tr>
                <td style="padding-top:20px;border-top:1px solid #eeeeee">
                  <table width="640" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                      <td width="588" align="left" valign="top">
                        <p style="color:#999999;font-size:12px;margin:0;padding:0">
                            Вы получили это письмо, потому что этот адрес электронной почту был указан при регистрации на сайте <span class="il">www.cmsch.ru</span>.<br>
                            
                      </p></td>
                      <td style="padding-top:10px" width="52" align="right" valign="middle">
                        <a href="http://twitter.com/cmsch" style="color:#3589a7;text-decoration:none" target="_blank">
                          <img src="http://www.cmsch.ru/graphics/emails/twitter-icon.gif" width="16" height="16" border="0" alt="cmsch on Twitter">
                        </a>
                        <a href="http://www.facebook.com/cmsch" style="color:#3589a7;text-decoration:none" target="_blank">
                          <img src="http://www.cmsch.ru/emails/facebook-icon.gif" width="16" height="16" border="0" alt="cmsch on Facebook">
                        </a>
                      </td>
                    </tr>
                  </tbody></table>
                </td>
              </tr>
            </tbody></table>
          </td>
        </tr>
      </tbody></table>
    </td>
  </tr>
</tbody></table><div class="yj6qo"></div><div class="adL">
</div></div>';
			
	// echo $body;	
			send_mail(	'cmsch informer <info@cmsch.ru>',
						$email,
						'Регистрация на сайте cmsch.ru.',$body
						);

			$_SESSION['msg']['reg-success']='Мы отправили вам письмо для завершения регистрации!';
			$prof=$prof+255;
			//header("Location: http://www.cmsch.ru/timeline/pet/d". $prof."/");
		}
		
	if(count($err))
	{
		$_SESSION['msg']['reg-err'] = implode('<br />',$err);
	}	
	if(count($err)) {	//header("Location: signup.php"); 
	 }	else   {  
	 $row = mysqli_fetch_assoc($mysqli->query("SELECT id,username,email, names,	secondname, avatar, countlogin, statuser, is_student	 FROM users WHERE id=".$profidt." and allowname=0"));
	// echo "SELECT id,username,email, names,	secondname, avatar, countlogin, statuser	 FROM users WHERE id=".$profidt." and allowname=0";
	 
	//echo "SELECT id,username,email, names,	secondname, avatar, countlogin, statuser, statuser, id_activpets	 FROM users WHERE id=".$profidt." and allowname=0";
//echo "SELECT id,username, names,	secondname, avatar, countlogin, statuser	 FROM users WHERE email='{$_POST['email']}' AND pass='".md5($_POST['password'])."' and allowname=0";
		
			// If everything is OK login
			
			$_SESSION['username']=$row['email'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['names'] = $row['names'];
			$_SESSION['secondname'] = $row['secondname'];
			$_SESSION['isstudent'] = $row['isstudent'];
			$_SESSION['avatar'] = $row['avatar'];
			$_SESSION['countlogin'] = $row['countlogin'];
			$_SESSION['actpet'] = $row['id_activpets'];
			// Store some data in the session
			$sql = "UPDATE `users` SET  `countlogin`= `countlogin` + 1 WHERE `id`=".$row['id'].";"; 
			//echo $sql;
			$result = $mysqli->query($sql); 
			setcookie('tzRemember',$_POST['rememberMe']);
	
	 header("Location: /users/profile/"); 	//echo "w"; 
	 }

//	exit;
}

$script = '';

//print_r($_SESSION);
//print_r($_REQUEST);

if (isset($_REQUEST['userurl'])) {
	
	$pageuserid=getidbyusername($_REQUEST['userurl']);
	 
$row = mysqli_fetch_assoc($mysqli->query("SELECT id,username FROM users WHERE username='{$_REQUEST['userurl']}';"));
//if($row['username']) {	$usernameurl=$row['username'];} else  {header( "Location: /404.php", true ); } 
}

function addhttp($url) {
  //  if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
   //     $url = "http://" . $url;
   // }
    return $url;
}

$vphotos = array();

$vuser = array();

$vpets = array();

function generatePassword ($length = 8)
{

  // start with a blank password
  $password = "";

  // define possible characters
   $possible = "0123456789abcdfghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ"; 
  // set up a counter
  //$i = 0; 
    
  // add random characters to $password until $length is reached
  while ($i < $length) { 

    // pick a random character from the possible ones
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
        
    // we don't want this character if it's already in the password
    if (!strstr($password, $char)) { 
      $password .= $char;
      $i++;
    }

  }

  // done!
  return $password;

}
//if ($_REQUEST[pr_id]){$profileid=$_REQUEST[pr_id];} else  {$profileid=$_SESSION['id'];} 
$mypage=false;
if(isset($_REQUEST['userurl'])) { 
$pageowener = mysqli_fetch_assoc($mysqli->query("SELECT id,username FROM users WHERE username='{$_REQUEST['userurl']}' AND allowname=0 AND statuser=0"));
//print_r($pageowener);
if (isset($_SESSION['id'])) { 

if (strlen($_REQUEST['userid'])>=1) { 
		//check for extra /
		
		$findme   = '/';
		$pos = strpos($_REQUEST['userid'], $findme);
		if ($pos === false) { 
		 $id =substr($_REQUEST['userid'],3,strlen($_REQUEST['userid'])-3); 
		 }  else {    $id =substr($_REQUEST['userid'],3,strlen($_REQUEST['userid'])-4);  } 
		 
}
 if ($_SESSION['id']==$id) {  $mypage=true;} else {$mypage=false; } }
}
$idspicies = array( 'не указано' );
$idcasspicies = array( 'не указано'  );
$gender = array(  array("","",""));
//print_r($_REQUEST); echo "<br /><br />";
//echo $_SERVER['PHP_SELF']."<br /><br />";
//print_r($_SESSION);
function getfollowlink ($whois, $whumto) { 
global $mysqli;
$query="SELECT id_lists  FROM an_friend WHERE id_whois='{$whois}' and id_whumto={$whumto}";
//echo $query;
if ($result = $mysqli->query($query)) {
$num_rowst =$result->num_rows;
	if ($num_rowst>=1) { 
	$row = mysqli_fetch_assoc($mysqli->query($query)); 
	$str='<a href="#" class="btn btn-mini btn-primary followbtn liked" data-user="'.$whumto.'"> отписаться </a>'; 
	} else {
	$str='<a href="#" class="btn btn-mini btn-primary followbtn" data-user="'.$whumto.'"> подписаться </a>';
	} 
	}
return $str;
} 

function  getnmebyid($id) { 
global $mysqli;
$sql="SELECT id,username FROM users WHERE id='{$id}';";
$result = $mysqli->query($sql); 
$row = $result->fetch_object();
$strname=$row->username;
return $strname;
}
function  getidbyusername($id) { 
global $mysqli;
$sql="SELECT id, username FROM users WHERE username='{$id}';";
$result = $mysqli->query($sql); 
$row = $result->fetch_object();
$strname=$row->id;
return $strname;
} ?>