<?
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');


/* Database config */

$db_host		= '';
$db_user		= '';
$db_pass		= '';
$db_database	= ''; 

/* End config */


	

$arr_status = array(2=>"Opened - Assigned",1=>"Opened - Not Assigned",4=>"Re-opened", 9=>"Tested" ,6=>"Processing",7=>"Reviewd with questions",8=>"Reviewd",3=>"Done",10=>"Done-not uploaded",11=>"Uploaded To QC",12=>"Uploaded To Live",5=>"Closed");

$arr_status_simple = array(6=>"Processing",7=>"Reviewd with questions",8=>"Reviewd",3=>"Done");

$arr_priority = array(0=>"Highest",1=>"High",2=>"Normal",3=>"Low",4=>"Lowest");
$arr_type = array(1=>"Task",2=>"Bug");

$arr_level = array(1=>"Administrator",2=>"Manager",3=>"Programmer");

$arr_sbydate = array(1=>"Bug Created",2=>"Status Changed",3=>"Work Finished");

define("st_fixed",3);
define("st_opasg",2);
define("st_opnasg",1);
define("st_process",6);
define("st_closed",5);
define("st_reopened",4);
define("st_rew",8);
define("st_rewques",7);

define("st_tested",9);
define("st_donenupl",10);
define("st_uplqc",11);
define("st_upllive",12);

$arr_admins = array(10,8);
//$arr_admins = array();


define("pr_highest",0);
define("pr_high",1);
define("pr_normal",2);
define("pr_low",3);
define("pr_lowest",4);



function replace_tags($st)
{
	$st = str_replace("<","&lt;",$st);
	$st = str_replace(">","&gt;",$st);
	return $st;
}





function sendEmail($email,$subject,$body){
	$fromname = "Проект F";
	$fromemail = "info@test.ru";
	$header = "MIME-Version: 1.0\nContent-type: text/html; charset=windows-1251";
	$msgText = "<html><head><title>$subject</title></head><body>$body</body></html>";

	$filetype = "application/x-unknown-content-type";
	$ctencoding = "8bit";
	$disposition = "inline";
	$boundary= "----=" . md5( uniqid ( rand()));
	
	$header = "MIME-Version: 1.0\nContent-type: multipart/mixed;\n boundary=\"$boundary\"";
	$msgText = "DMR\n--$boundary\nContent-type: text/html;\n charset=windows-1251;\nContent-Transfer-Encoding:$ctencoding\n\n $msgText \n\n";
   	mail($email, $subject, $msgText,     "From: $fromname <$fromemail>\n".$header);
}

function send_string_to_me($where,$subject)
{
	$body = "пользователь  - ".get_var("cookie_fname")." ".get_var("cookie_lname")."<br>
			строка запроса - \"".$where."\"";
		//echo "ok";
	sendEmail("test@test.ru", $subject, $body);
}

function getidbyname($id)
{ 	
global 	$mysqli;
	$row = mysqli_query($mysqli, "SELECT id,username FROM users WHERE username='$id';");
	$myrow = mysqli_fetch_object($row);
	return $myrow->id;
}

function isbyname($urlname,$idimg)
{ 	
global 	$mysqli;
	$row = mysqli_query($mysqli, "SELECT id,username FROM users WHERE username='$id';");
	$myrow = mysqli_fetch_object($row);
	return $myrow->id;
}

if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

function checkEmail($str)
{
	return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
}


function send_mail($from,$to,$subject,$body)
{
	$headers = '';
	$headers .= "From: $from\n";
	$headers .= "Reply-to: $from\n";
	$headers .= "Return-Path: $from\n";
	$headers .= "Message-ID: <" . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . ">\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Date: " . date('r', time()) . "\n";
	$headers .= "Content-Type: text/html;charset=utf-8 \r\n";
	mail($to,$subject,$body,$headers);
}

function  echousername($names, $secondname, $username) { 
$strname=$username;
if ($names!='') { $strname=$names; }
if ($secondname!='') { if ($names!='') { $strname.=" ".$secondname;  } else { $strname=$secondname; } }

return $strname;
}


## Clean the input from script, html, style, and almost all potenially harmful tags.
function clean_input($input) {
	$search = array(
		'@<script[^>]*?>.*?</script>@si',   /* strip out javascript */
		'@<[\/\!]*?[^<>]*?>@si',            /* strip out HTML tags */
		'@<style[^>]*?>.*?</style>@siU',    /* strip style tags properly */
		'@<![\s\S]*?--[ \t\n\r]*>@'         /* strip multi-line comments */
	);

	$output = preg_replace($search, '', $input);
	return $output;
}

/*
	@@ Generating a cryptographically strong pseudorandom value for preventing CSRF and XSRF attacks.
*/
function crypto_rand_secure($min, $max) {
	$range = $max - $min;
		if($range < 0) return $min; ## Not so random
	$log = log($range, 2);
	$bytes = (int) ($log / 8) + 1; ## Length in bytes
	$bits = (int) $log + 1; ## Length in bits
	$filter = (int) (1 << $bits) - 1; ## Set all lower bits to 1
		do {
			$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
			$rnd = $rnd & $filter; ## Discard irrelevant bits
		} while ($rnd >= $range);

	return $min + $rnd;
}

function get_token($length) {
	$token = '';
	$codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
	$codeAlphabet .= '0123456789';
		for($i=0; $i<$length; $i++) {
			$token .= $codeAlphabet[crypto_rand_secure(0, strlen($codeAlphabet))];
		}

	return $token;
}

?>